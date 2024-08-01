<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class ContactUs extends CustomModel
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstName',
        'lastName',
        'companyName',
        'designation',
        'email',
        'subject',
        'phoneNo',
        'content'
    ];
}
