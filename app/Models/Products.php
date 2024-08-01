<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\Uuids;
use App\Models\Plan;

class Products extends CustomModel
{
    use HasFactory, Uuids;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'products';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'scheduleId', 'productName', 'productPrice', 'productDescription', 'productImage', 'planId', 'hardwarePlanId', 'employeeStrength', 'noOfDevices', 'noOfApplications', 'noOfExtensions', 'usageConsumptionBytes', 'stripeProductId', 'stripeProductPriceId', 'stripeProductpaymentLinkId', 'paymentLinkIsActive', 'paymentLinkUrl', 'stripeSessionId', 'stripeSessionUrl', 'paymentIntentId', 'productTransactionId', 'isPaid', 'paymentType', 'recuringDurationMonths', 'isPlanCancelled'
    ];

    /**
     * Belongs To Relation
     *
     */
    public function planDetail()
    {
        return $this->belongsTo(Plan::class, 'planId', 'id');
    }

    /**
     * Has Many Relation
     *
     */
    public function userProductPlans()
    {
        return $this->hasMany(Plan::class, 'id', 'hardwarePlanId');
    }

    /**
     * Has Many Relation
     *
     */
    public function userProductHsms()
    {
        return $this->hasMany(UserHsm::class, 'productId', 'id')->leftJoin('hsms_tools', 'hsms_tools.id', 'user_hsm.hsmId')->orderBy('user_hsm.createdAt', 'desc'); //->whereNotNull('user_hsm.productId')
    }
}
