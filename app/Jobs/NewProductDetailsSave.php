<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewProductPayment;
use App\Helpers\StripeHelper;
use Illuminate\Bus\Queueable;
use App\Models\Products;
use App\Models\User;

class NewProductDetailsSave implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $userId;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($userId)
    {
        $this->userId = $userId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $userdetail = User::where('id', $this->userId)->with(['hardwarePlan', 'softwarePlan', 'productDetails'])->first();
        $productDetails = Products::where('scheduleId',$this->userId)->orderBy('createdAt','DESC')->where('isPaid',0)->first();

        if($userdetail && $userdetail['hardwarePlan']) {
            $img = url('front-new/images/logo.webp');
            $productImages = [ $img ];
            $createProduct = StripeHelper::createProduct($productDetails->productName,'Custom Plan',$productImages);

            if(isset($createProduct['data']['id'])){
                $createPrice = StripeHelper::createProductPrice($productDetails->productPrice,$createProduct['data']['id'],$productDetails->paymentType,$productDetails->recuringDurationMonths);
                if(isset($createPrice['data']['id'])){
                    $subscriptionType = ($productDetails->paymentType == 'Recurring') ? 1 : 1;
                    $createSession = StripeHelper::createSessionProductPaymentLink($productDetails->id,$createPrice['data']['id'],$subscriptionType);


                    if(isset($createSession['data']['id'])){
                        //DEMO
                        $product = Products::where('id',$productDetails->id)->first();
                        $product->stripeProductId = $createProduct['data']['id'];
                        $product->stripeProductPriceId = $createPrice['data']['id'];
                        $product->stripeSessionId = $createSession['data']['id'];
                        $product->stripeSessionUrl = $createSession['data']['url'];
                        $product->update();
                        $product->refresh();

                        $userdetail->refresh();

                        Mail::to($userdetail->email)->send(new NewProductPayment($userdetail,$product));

                    }
                }

            }
        }
    }
}
