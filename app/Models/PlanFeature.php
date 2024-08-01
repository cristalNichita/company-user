<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanFeature extends CustomModel
{
    use HasFactory, Uuids;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'plans_features';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['planId', 'title', 'features', 'value'];

}
