<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Models\ProductTransactions;
use Illuminate\Support\Facades\DB;
use App\Mail\SubscriptionInvoice;
use App\Helpers\StripeHelper;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\User;
use App\Models\Plan;

class ProductPaymentController extends Controller
{
    /*
    * Success Product Payment
    */
    public function successProductPayment(Request $request)
    {
        $product = Products::where('id', $request->get('productId'))->first();
        $userDetail = User::where('id', $product->scheduleId)->with(['hardwarePlan', 'softwarePlan', 'productDetails'])->first();
        if ($product) {
            $planDetails = Plan::where('id', $product->planId)->first();
            $stripeSessionData =  StripeHelper::retrieveSession($product->stripeSessionId);
            if (isset($stripeSessionData['data']['id'])) {

                $stripeInvoiceData =  StripeHelper::retrieveInvoice($stripeSessionData['data']['invoice']);
                if (isset($stripeInvoiceData['data']['id'])) {

                    $stripeChargeData =  StripeHelper::retrieveCharge($stripeInvoiceData['data']['charge']);
                    if (isset($stripeChargeData['data']['id'])) {
                        DB::beginTransaction();

                        $transactionInsertData = [
                            'scheduleId' => $product->scheduleId,
                            'productId' => $product->id,
                            'chargeId' =>  $stripeInvoiceData['data']['charge'],
                            'paymentIntentId' => $stripeInvoiceData['data']['payment_intent'],
                            'invoiceId' => $stripeSessionData['data']['invoice'],
                            'customerId' => $stripeInvoiceData['data']['customer'],
                            'subscriptionId' => $stripeInvoiceData['data']['subscription'],
                            'paymentMethodId' => $stripeChargeData['data']['payment_method'],
                            'paymentType' => $stripeChargeData['data']['payment_method_details']['type'],
                            'cardBrand' => $stripeChargeData['data']['payment_method_details']['card']['brand'],
                            'lastForDigit' => $stripeChargeData['data']['payment_method_details']['card']['last4'],
                            'expiryMonth' => $stripeChargeData['data']['payment_method_details']['card']['exp_month'],
                            'expiryYear' => $stripeChargeData['data']['payment_method_details']['card']['exp_year'],
                            'hostedInvoiceUrl' => $stripeInvoiceData['data']['hosted_invoice_url'],
                            'invoicePdf' => $stripeInvoiceData['data']['invoice_pdf'],
                            'invoiceData' => !empty($stripeInvoiceData) ? json_encode($stripeInvoiceData) : null,
                            'chargeData' => !empty($stripeChargeData) ? json_encode($stripeChargeData) : null,
                            'status' => $stripeSessionData['data']['status'],
                            'sessionData' => !empty($stripeSessionData) ? json_encode($stripeSessionData) : null
                        ];

                        $createTranx = ProductTransactions::create($transactionInsertData);

                        $product->productTransactionId = $createTranx->id;
                        $product->isPaid = 1;
                        $product->update();
                        $product->refresh();

                        $userDetail->isActive = 1;
                        $userDetail->update();
                        $userDetail->refresh();

                        DB::commit();

                        $planDetails = $userDetail;
                        Mail::to($userDetail->email)->send(new SubscriptionInvoice($userDetail->userName, $userDetail['productDetails'], $planDetails, $stripeInvoiceData['data']['invoice_pdf']));
                        return redirect(route('home'))->with('success', trans('messages.product_transaction.success'));
                    }
                }
            }
        }
        return redirect(route('home'))->with('error', trans('messages.product_transaction.noData'));
    }


    /*
    * Cancel Product Payment
    */
    public function cancelProductPayment(Request $request)
    {
        return redirect(route('home'))->with('error', trans('messages.product_transaction.cancel'));
    }
}
