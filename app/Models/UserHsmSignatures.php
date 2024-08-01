<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserHsmSignatures extends CustomModel
{
    use HasFactory, SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     **/
    protected $table = 'user_hsm_signatures';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     **/
    protected $fillable = ['userId', 'hsmId', 'signature'];
}
