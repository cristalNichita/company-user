<?php

namespace App\Mail;

use Illuminate\Queue\SerializesModels;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;

class ProductPayment extends Mailable
{
    use Queueable, SerializesModels;

    protected $contactSchedule;
    protected $planDetails;
    protected $product;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($contactSchedule, $product, $planDetails)
    {
        $this->contactSchedule = $contactSchedule;
        $this->planDetails = $planDetails;
        $this->product = $product;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $fullName = $this->contactSchedule->yourName;
        $user = $this->contactSchedule;
        $product = $this->product;
        $planDetails = $this->planDetails;

        return $this->subject('Product Payment', env('APP_NAME'))
            ->with(['fullName' => $fullName, 'product' => $product, 'user' => $user, 'planDetails' => $planDetails])
            ->view('mail.admin.product_payment');
    }
}
