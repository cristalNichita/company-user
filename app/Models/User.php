<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\HasApiTokens;
use App\Traits\Uuids;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Uuids, SoftDeletes;

    protected $fillable = [
        'role', 'parent_id', 'fullname', 'email',
        'phone', 'password', 'image', 'two_factor_auth', 'google2fa_secret',
        'face_id_image', 'two_factor_email', 'two_factor_phone',
        'mfa_email', 'mfa_phone', 'is_key_manager_otp',
        'key_manager_otp', 'key_manager_expiry', 'verification_token',
        'verified', 'theme_color', 'font_color', 'business_logo',
        'stripe_session_id', 'subscribed', 'active', 'auto_upload',
        'member', 'company_name', 'key_count', 'last_login',
        'browser', 'last_logout', 'password_hint'
    ];

    public function setPasswordAttribute($value): void
    {
        $this->attributes['password'] = Hash::make($value);
    }

    protected $hidden = [
        'password'
    ];

    public function cloudFiles(): HasMany
    {
        return $this->hasMany(CloudFile::class);
    }

    public function userRole(): HasMany
    {
        return $this->hasMany(UserRole::class, 'userId', 'id');
    }

    public function userProducts(): HasOne
    {
        return $this->hasOne(Products::class, 'id', 'productId');
    }

    public function userSchedules(): HasOne
    {
        return $this->hasOne(Schedule::class, 'id', 'scheduleId');
    }

    public function userTransactions(): HasMany
    {
        return $this->hasMany(ProductTransactions::class, 'scheduleId')
            ->selectRaw('product_transactions.*, DATE_FORMAT(product_transactions.createdAt, "%d/%m/%Y") as date,DATE_FORMAT(product_transactions.createdAt, "%d.%m.%Y") as dateForInvoice, products.productPrice, products.paymentType as hardware, plans.planName')
            ->leftJoin('products', 'products.id', 'product_transactions.productId')
            ->leftJoin('plans', 'plans.id', 'products.hardwarePlanId')
            ->orderBy('product_transactions.createdAt', 'desc');
    }

    public function userPlans(): HasMany
    {
        return $this->hasMany(Plan::class, 'id', 'hardwarePlanId')->orderBy('createdAt', 'desc');
    }

    public function userProduct(): HasMany
    {
        return $this->hasMany(Products::class, 'scheduleId', 'id')->whereHas('userProductHsms')->where('products.isPaid', 1)->orderBy('createdAt', 'desc');
    }

    public function scopeSearch($query, $search): Builder
    {
        return  $query->where(function ($q) use ($search) {
            $q->orWhere('users.companyName', 'like', '%' . $search . '%')
                ->orWhere('users.email', 'like', '%' . $search . '%')
                ->orWhere('users.mobileNumber', 'like', '%' . $search . '%')
                ->orWhere('hsms_tools.name', 'like', '%' . $search . '%')
                ->orWhere('plans.planName', 'like', '%' . $search . '%')
                ->orWhereRaw("DATE_FORMAT(users.createdAt,'%d %b, %Y') like '%{$search}%' ");
        });
    }

    public static function getUserOrParentUserId(): array
    {
        $user = Auth::user();
        if ($user->role == 'business') {
            $usersIds = User::where('parent_id', $user->id)->pluck('id')->toArray();
            $usersIds = array_merge($usersIds, [$user->id]);
        } else {
            $usersIds = [$user->id];
        }

        return $usersIds;
    }

    public static function getParentUser(): Collection
    {
        $user = Auth::user();
        if ($user->role == 'user') {
            $parentUser = User::where('id', $user->parent_id)->first();
        } else {
            $parentUser = User::where('id', $user->id)->first();
        }

        return $parentUser;
    }

    public static function getAdminParentUser(): Collection
    {
        $user = Auth::user();
        if ($user->role == 'subadmin') {
            $parentUser = User::where('id', $user->parent_id)->first();
        } else {
            $parentUser = User::where('id', $user->id)->first();
        }
        return $parentUser;
    }

    public static function saveRestoreData($restoreFile): void
    {
        $restoreFile->deletedAt = NULL;
        $restoreFile->save();
    }
}
