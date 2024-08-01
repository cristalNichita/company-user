<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Uuids;

class Policy extends CustomModel
{
    use HasFactory, Uuids, SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'policy';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['createdBy', 'policyName', 'policyDescription', 'users', 'applications', 'access', 'passwordAuthFactor', 'status'];


    /**
     * Get all Scenario Details using hasMany Relation.
     **/
    public function getScenarioDetails()
    {
        return $this->hasMany('App\Models\Scenario', 'policyId')->selectRaw('*');
    }


    /**
     * Get Group Data
     *
     * @return json
     */
    public static function getPolicies($createdBy)
    {
        return self::where('createdBy', $createdBy)->with('getScenarioDetails')->get();
    }
}
