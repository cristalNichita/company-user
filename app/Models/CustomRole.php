<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomRole extends CustomModel
{
    use HasFactory, SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'custom_roles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['parentId', 'roleName', 'description', 'permission', 'isActive'];

    /**
     * Set attribute with json encode for permission role
     * @param $value
     */
    public function setPermissionAttribute($value)
    {
        $this->attributes['permission'] = json_encode($value, true) ?? [];
    }

    /**
     * Get attribute with json decode for permission role
     */
    public function getPermissionAttribute()
    {
        return isset($this->attributes['permission']) ? json_decode($this->attributes['permission'], true) : [];
    }

}
