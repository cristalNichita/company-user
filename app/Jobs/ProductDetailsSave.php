<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Illuminate\Bus\Queueable;
use App\Helpers\StripeHelper;
use App\Mail\ProductPayment;
use App\Models\Schedule;
use App\Models\Products;
use App\Models\Plan;

class ProductDetailsSave implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $productId;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($productId)
    {
        $this->productId = $productId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $product = Products::where('id', $this->productId)->first();
        if ($product) {
            $planDetails = Plan::where('id', $product->planId)->first();
            $img = url('front-new/images/logo.webp');
            $productImages = [$img];
            $createProduct = StripeHelper::createProduct($product->productName, $product->productDescription, $productImages);
            if (isset($createProduct['data']['id'])) {
                $createPrice = StripeHelper::createProductPrice($product->productPrice, $createProduct['data']['id'], $product->paymentType, $product->recuringDurationMonths);
                if (isset($createPrice['data']['id'])) {
                    $subscriptionType = ($product->paymentType == 'Recurring') ? 1 : 1;
                    $createSession = StripeHelper::createSessionProductPaymentLink($this->productId, $createPrice['data']['id'], $subscriptionType);
                    if (isset($createSession['data']['id'])) {
                        $product->stripeProductId = $createProduct['data']['id'];
                        $product->stripeProductPriceId = $createPrice['data']['id'];
                        $product->stripeSessionId = $createSession['data']['id'];
                        $product->stripeSessionUrl = $createSession['data']['url'];
                        $product->update();
                        $product->refresh();

                        $contactSchedule = Schedule::where('id', $product->scheduleId)->first();

                        Mail::to($contactSchedule->email)->send(new ProductPayment($contactSchedule, $product, $planDetails));
                    }
                }
            }
        }
    }
}
