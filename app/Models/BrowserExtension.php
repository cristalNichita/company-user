<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BrowserExtension extends Model
{
    use HasFactory;

    protected $fillable = ['userId', 'systemName', 'modelNumber', 'systemType', 'ipAddress', 'brandName', 'browserType', 'isInstalled', 'isActive'];
}
