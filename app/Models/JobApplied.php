<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobApplied extends CustomModel
{
    use HasFactory, SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'job_applieds';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['jobId', 'name', 'email', 'phoneNumber', 'document', 'message'];
}
