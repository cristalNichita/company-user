<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\Uuids;
use App\Models\User;

class ProductTransactions extends CustomModel
{
    use HasFactory, Uuids;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'product_transactions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'scheduleId', 'productId', 'userId', 'chargeId', 'paymentIntentId', 'invoiceId', 'customerId', 'subscriptionId', 'paymentMethodId', 'paymentType', 'cardBrand', 'lastForDigit', 'expiryMonth', 'expiryYear', 'hostedInvoiceUrl', 'invoicePdf', 'status', 'sessionData', 'invoiceData', 'chargeData', 'isPlanCancelled'
    ];


    /**
     * Get the Schedule associated with the ProductTransactions
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function productTransactionSchedule()
    {
        return $this->hasOne(Schedule::class, 'id', 'scheduleId');
    }

    /**
     * Get the Product associated with the ProductTransactions
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function productTransactionProduct()
    {
        return $this->hasOne(Products::class, 'id', 'productId');
    }

    /**
     * Get the Product associated with the productTransactionUser
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function productTransactionUser()
    {
        return $this->hasOne(User::class, 'id', 'scheduleId');
    }

    /**
     * Product Transaction Ajax Table Search
     * @return $query
     */
    public function scopeSearch($query, $search)
    {
        return  $query->where(function ($q) use ($search) {
            $q->orWhere('schedules.yourName', 'like', '%' . $search . '%')
                ->orWhere('schedules.companyName', 'like', '%' . $search . '%')
                ->orWhere('product_transactions.createdAt', 'like', '%' . $search . '%');
        });
    }
}
