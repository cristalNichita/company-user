<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrganizationCustomRoles extends CustomModel
{
    use HasFactory, SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'organization_custom_roles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['organizerId', 'roleName', 'roleDescription', 'hsmStorage', 'numberPassword', 'numberApplication', 'authentication', 'device', 'browser', 'application'];

    /**
     * The cast convert to array.
     *
     * @var array
     **/
    protected $casts = [
        'hsmStorage' => 'array',
        'authentication' => 'array',
        'device' => 'array',
        'browser' => 'array',
    ];
}
