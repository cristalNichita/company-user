<?php

namespace App\Mail;

use Illuminate\Queue\SerializesModels;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;

class NewProductPayment extends Mailable
{
    use Queueable, SerializesModels;

    protected $userdetail;
    protected $productDetails;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($userdetail, $productDetails)
    {
        $this->userdetail = $userdetail;
        $this->productDetails = $productDetails;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $userdetail = $this->userdetail;
        $productDetails = $this->productDetails;

        return $this->subject('Flashx HSM Plan', env('APP_NAME'))
            ->with(['fullName' => $userdetail->userName, 'product' => $productDetails, 'user' => $userdetail,  'hardwarePlan' => $userdetail['hardwarePlan'], 'softwarePlan' => $userdetail['softwarePlan']])
            ->view('mail.admin.new_product_payment');
    }
}
