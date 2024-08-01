<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Password extends Model
{
    use HasFactory, Uuids;

    protected $fillable = [
        'name', 'user_id', 'account_name', 'password', 'url', 'favicon_url', 'mfa_required', 'master_password_required'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
