<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Uuids;

class PlatformAccount extends CustomModel
{
    use HasFactory, Uuids, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'userId', 'hsmId', 'platform', 'title', 'accountId', 'accountUrl', 'faviconUrl', 'password', 'passwordSize', 'passwordSignature', 'ipAddress'
    ];


    /**
     * Set Attribute
     *
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = base64_encode($value);
    }

    /**
     * Get Attribute
     *
     */
    public function getPasswordAttribute($value)
    {
        return base64_decode($value);
    }
}
