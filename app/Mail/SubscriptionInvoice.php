<?php

namespace App\Mail;

use Illuminate\Queue\SerializesModels;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;


class SubscriptionInvoice extends Mailable
{
    use Queueable, SerializesModels;

    protected $invoiceLink;
    protected $planDetails;
    protected $userName;
    protected $product;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($userName, $product, $planDetails, $invoiceLink)
    {
        $this->invoiceLink = $invoiceLink;
        $this->planDetails = $planDetails;
        $this->userName = $userName;
        $this->product = $product;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $invoiceLink = $this->invoiceLink;
        $planDetails = $this->planDetails;
        $fullName = $this->userName;
        $product  = $this->product;

        return $this->subject('Flashx Invoice', env('APP_NAME'))
            ->with(['fullName' => $fullName, 'invoiceLink' => $invoiceLink, 'product' => $product, 'planDetails' => $planDetails, 'hardwarePlan' => $planDetails['hardwarePlan'], 'softwarePlan' => $planDetails['softwarePlan']])
            ->view('mail.admin.subscription_invoice');
    }
}
