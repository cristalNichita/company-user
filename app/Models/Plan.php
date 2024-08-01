<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\Uuids;

class Plan extends CustomModel
{
    use HasFactory, Uuids;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'plans';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['paypalId', 'planName', 'price', 'type', 'description', 'members', 'storage', 'storageType', 'isActive', 'stripePriceKey', 'stripeProductId', 'noOfDevices', 'noOfApplications', 'noOfExtensions', 'duration', 'country', 'language'];


    /**
     * Get Plan Feature Details
     *
     */
    public function getPlanFeatureDetails()
    {
        return $this->hasMany('App\Models\PlanFeature', 'planId')->selectRaw('*');
    }


    /**
     * Scope search
     *
     */
    public function scopeSearch($query, $search)
    {
        return  $query->where(function ($q) use ($search) {
            $q->orWhere('planName', 'like', '%' . $search . '%')
                ->orWhere('type', 'like', '%' . $search . '%')
                ->orWhere('price', 'like', '%' . $search . '%')
                ->orWhere('createdAt', 'like', '%' . $search . '%');
        });
    }
}
