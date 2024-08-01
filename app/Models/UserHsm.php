<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserHsm extends CustomModel
{
    use HasFactory, SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_hsm';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['hsmId', 'organizerId', 'productId', 'allocatedStorage', 'usedSpace', 'availableSpace', 'totalPasswords', 'totalPlatforms'];

    /**
     * HSMS Tools Ajax Table Search
     * @return $query
     */
    public function scopeSearch($query, $search)
    {
        return  $query->where(function ($q) use ($search) {
            $q->orWhere('users.userName', 'like', '%' . $search . '%')
                ->orWhere('users.email', 'like', '%' . $search . '%')
                ->orWhere('plans.planName', 'like', '%' . $search . '%');
        });
    }

    /**
     * Query for hsm used space in admin dashboard side
     */
    public static function hsmUsedSpace()
    {
        return self::leftJoin('users', 'users.id', 'user_hsm.organizerId')
            ->where('users.role', 'business')
            ->whereNull('user_hsm.deletedAt')
            ->sum('user_hsm.allocatedStorage');
    }
}
