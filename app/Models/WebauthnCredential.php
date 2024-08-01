<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WebauthnCredential extends Model
{
    use HasFactory;

    protected $fillable = ['public_key', 'user_id', 'credential_id', 'sign_count'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
