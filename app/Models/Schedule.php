<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\Uuids;

class Schedule extends CustomModel
{
    use HasFactory, Uuids;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'schedules';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'userId', 'ticketId', 'yourName', 'companyName', 'companyUrl', 'email', 'employeeStrength', 'usageConsumption', 'usageConsumptionFormat', 'countryCode', 'contactNumber', 'subject', 'description', 'status', 'type', 'isCreatedUser', 'productId'
    ];


    /**
     * Contact Us and Scedule Ajax Table Search
     * @return $query
     */
    public function scopeSearch($query, $search)
    {
        return  $query->where(function ($q) use ($search) {
            $q->orWhere('yourName', 'like', '%' . $search . '%')
                ->orWhere('email', 'like', '%' . $search . '%')
                ->orWhere('contactNumber', 'like', '%' . $search . '%')
                ->orWhere('status', 'like', '%' . $search . '%')
                ->orWhere('companyName', 'like', '%' . $search . '%')
                ->orWhere('ticketId', 'like', '%' . $search . '%')
                ->orWhereRaw("DATE_FORMAT(createdAt,'%d %b, %Y') like '%{$search}%' ");
        });
    }
}
