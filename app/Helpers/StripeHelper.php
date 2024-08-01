<?php

namespace App\Helpers;

use App\Models\UserCard;
use Stripe\StripeClient;
use Stripe\AccountLink;
use App\Models\User;
use Stripe\Account;
use Stripe\Stripe;

class StripeHelper
{
    /**
     * This method is used for Generate Token.
     *
     */
    public static function configureStripe()
    {
        $configData = config('constant.STRIPE_PAYMENT');

        Stripe::setApiKey($configData['secret_key']);

        return $stripe = new \Stripe\StripeClient(
            $configData['secret_key']
        );
    }

    /**
     * This method is used for check Customer Created or not.
     *
     * @param int $userId
     *
     */
    public static function checkCustomerCreatedById($userId)
    {
        $user = User::where('id', $userId)->whereNull('stripeId')->first();

        if ($user) {
            return false;
        }
        return true;
    }

    /**
     * This method is used for create customer.
     *
     * @param array $userData
     *
     */
    public static function createCustomer($userData)
    {
        $stripe = self::configureStripe();

        $customer = $stripe->customers->create([
            'name'  => $userData['fullName'],
            'email' => $userData['email'],
            //'address' => $userData['address'],
        ]);

        User::where('id', $userData['id'])->update(['stripeId' => $customer['id']]);

        return $customer;
    }

    /**
     * This method is used for add card at payment gateway in particular user.
     *
     * @param array $user
     * @param array $request
     */
    public static function addCard($user, $request)
    {
        $expDate = explode('/', $request['expiryDate']);

        $stripe = self::configureStripe();

        $tokenResponse = $stripe->tokens->create([
            'card' => [
                'object'      => 'card',
                'number'      => (int) str_replace(' ', '', $request['cardNumber']),
                'exp_month'   => $expDate[0],
                'exp_year'    => $expDate[1],
                'cvc'         => $request['cvv'],
                'name'        => $request['cardholderName'] ?? ''
            ],
        ]);

        $cardResponse =  $stripe->customers->createSource(
            $user['stripeId'],
            ['source' => $tokenResponse['id']]
        );

        return $cardResponse;
    }

    /**
     * This method is used for get all added cards.
     *
     * @param array $user
     */
    public static function getAllCards($user)
    {
        $stripe = self::configureStripe();
        $cardList = [];

        $responseAllCards = $stripe->customers->allSources(
            $user['stripeId'],
            ['object' => 'card', 'limit' => 10]
        );

        foreach ($responseAllCards['data'] as $key => $userCard) {
            $cardList[$key] = self::getCards($userCard, $user);
        }
        return $cardList;
    }

    /**
     * This method is used for get all cards of particular user.
     *
     * @param array $userCard
     *
     * @return object $creditCardDetail
     */
    public static function getCards($userCard, $user)
    {
        $cardCount = UserCard::where(['userId' => $user->id])->count();

        $stripe = self::configureStripe();


        $getCard = $stripe->customers->retrieveSource(
            $userCard['customer'],
            $userCard['id']  //  id is card token
        );

        if ($getCard->name != null) {
            $creditCardDetail['cardHolderName'] = $getCard->name;
        } else {
            $creditCardDetail['cardHolderName'] = null;
        }


        $creditCardDetail['last4'] = $getCard->last4;
        $creditCardDetail['maskedNumber'] = 'xxxxxxxxxxxx' . $getCard->last4;
        $creditCardDetail['cardType'] = str_replace(' ', '', $getCard->brand);
        $creditCardDetail['expiryDate'] = $getCard->exp_month . '/' . $getCard->exp_year;
        $creditCardDetail['cardNumber'] = $getCard->cardNumber;
        $creditCardDetail['cvv'] = $getCard->cvv;
        $creditCardDetail['cardToken'] = $getCard->id;
        $creditCardDetail['cardDefault'] = $cardCount == 0 ? 1 : 0;
        $creditCardDetail['cardImage'] = Self::getcardImage(str_replace(' ', '', strtolower($getCard->brand)));

        return $creditCardDetail;
    }

    /**
     * Get Card Image
     *
    **/
    public static function getcardImage($brand)
    {
        if ($brand == 'mastercard') {
            return 'mastercard.png';
        } else if ($brand == 'visa') {
            return 'visa.png';
        } else if ($brand == 'americanexpress') {
            return 'americanexpress.png';
        } else if ($brand == 'discover') {
            return 'discover.png';
        } else if ($brand == 'dinersclub') {
            return 'dinersclub.png';
        } else if ($brand == 'jcb') {
            return 'jcb.png';
        } else if ($brand == 'unionpay') {
            return 'unionpay.png';
        } else if ($brand == 'mestro') {
            return 'mestro.png';
        } else {
            return 'mastercard.png';
        }
    }

    /**
     * This method is used for delete card.
     *
     * @param array $user
     */
    public static function deleteCard($cardId, $stripeUserId)
    {
        $stripe = self::configureStripe();

        $responceDeleteCard = $stripe->customers->deleteSource(
            $stripeUserId,
            $cardId
        );
        return $responceDeleteCard;
    }

    /**
     * This method is used for create payment.
     *
     * @param array $user
     */
    public static function createPayment($request)
    {
        // dd($request);
        $stripe = self::configureStripe();

        try {
            $paymentData = [
                'amount' => number_format($request['amount'], 2, '.', '') * 100,
                'currency' => config('constant.STRIPE_CURRENCY'),
                'card' => $request['cardToken'],
                'description' => $request['description'],
                'customer' => $request['stripeId']
            ];

            $payment['data'] = $stripe->charges->create($paymentData);
            $payment['status'] = 1;
            $payment['message'] = '';
        } catch (\Exception $e) {
            $payment['status'] = 0;
            $payment['data'] = null;
            $payment['message'] = $e->getMessage();
        }
        return $payment;
    }

    public static function retrieveCharge($chargeId)
    {
        $stripe = self::configureStripe();

        try {
            $charge['data'] = $stripe->charges->retrieve($chargeId);
            $charge['status'] = 1;
            $charge['message'] = '';
        } catch (\Exception $e) {
            $charge['status'] = 0;
            $charge['data'] = null;
            $charge['message'] = $e->getMessage();
        }
        return $charge;
    }


    /**
     * This method is used for create payment.
     *
     * @param array $user
     */
    public static function refundPayment($request)
    {
        $stripe = self::configureStripe();

        try {
            $paymentData = [
                'amount' => number_format($request['amount'], 2, '.', '') * 100,
                'charge' => $request['charge']
            ];
            $payment['data'] = $stripe->refunds->create($paymentData);
            $payment['status'] = 1;
            $payment['message'] = '';
        } catch (\Exception $e) {
            $payment['status'] = 0;
            $payment['data'] = null;
            $payment['message'] = $e->getMessage();
        }

        return $payment;
    }

    /**
     * Create strip account
     *
     * @param  mixed $params
     * @param  mixed $config
     * @return void
     */
    public static function createAccount($params = [], $config = [])
    {
        self::configureStripe();
        $params = array_merge([
            "type" => $config['account_type'] ?? 'standard'
        ], $params);
        $params['capabilities'] = [
            'card_payments' => [
                'requested' => true,
            ],
            'transfers' => [
                'requested' => true,
            ],
        ];

        return Account::create($params);
    }

    /**
     * Create strip account link for connect
     *
     * @param  mixed $vendorId
     * @return void
     */
    public static function createAccountLink($vendorId)
    {
        self::configureStripe();

        $account_links = AccountLink::create([
            'account' => $vendorId,
            'refresh_url' => route('StripeAccountFailed', ['id' => $vendorId]), //env('FRONTEND_URL')."/sign-up/business/fail",
            'return_url' => route('StripeAccountSuccess', ['id' => $vendorId]), //env('FRONTEND_URL')."/sign-up/business/success",
            'type' => 'account_onboarding',
        ]);
        return  $account_links;
    }

    /**
     * Delete strip account
     *
     * @param  mixed $account_id
     * @return void
     */
    public static function deleteAccount(String $account_id)
    {
        try {
            $configData = config('constant.STRIPE_PAYMENT');

            $stripe = new StripeClient($configData['secret_key']);
            $stripe->accounts->delete($account_id, []);
            return true;
        } catch (\Throwable $th) {
            throw $th;
            return false;
        }
    }

    /**
     * Create Login Link
     *
     * @param  mixed $accountId
     * @return void
     */
    public static function createLoginLink($accountId)
    {
        $configData = config('constant.STRIPE_PAYMENT');

        $stripe = new StripeClient($configData['secret_key']);
        return $stripe->accounts->createLoginLink($accountId);
    }

    /**
     * Get stripe account balance
     *
     * @param  mixed $account_id
     * @return void
     */
    public static function getBalance($accountId)
    {

        self::configureStripe();

        $balance = \Stripe\Balance::retrieve(
            ['stripe_account' => $accountId]
        );
        return $balance;
    }


    /**
     * Create Payment Session
     * @return void
     */
    public static function createSessionStripePaymentLink($userId, $priceKey, $planId)
    {
        $stripe =  self::configureStripe();

        try {
            $payment['data'] = $stripe->checkout->sessions->create([
                'success_url' => route('success', ['id' => $userId, 'planId' => $planId]),
                'cancel_url'  => route('cancel'),
                'line_items' => [
                    [
                        'price'     => $priceKey,
                        'quantity'  => 1,
                    ],
                ],
                'mode' => 'payment',
            ]);


            $payment['status'] = 1;
            $payment['message'] = '';
        } catch (\Exception $e) {
            $payment['status']  = 0;
            $payment['data']    = null;
            $payment['message'] = $e->getMessage();
        }
        return $payment;
    }


    /**
     * Retrieve Payment Session
     * @return void
     */
    public static function retrieveSession($createSessionId)
    {
        $stripe = self::configureStripe();
        try {
            $payment['data']    =  $stripe->checkout->sessions->retrieve($createSessionId, []);
            $payment['status']  = 1;
            $payment['message'] = '';
        } catch (\Exception $e) {
            $payment['status']  = 0;
            $payment['data']    = null;
            $payment['message'] = $e->getMessage();
        }
        return $payment;
    }

    /**
     * Create Product
     *
     **/
    public static function createProduct($productName, $description, $imagesUrl)
    {
        $stripe = self::configureStripe();
        try {

            $productData = [
                'name' => $productName,
                'description' => $description ?? "",
                'images' => $imagesUrl,
            ];

            $product['data']    =  $stripe->products->create($productData);
            $product['status']  = 1;
            $product['message'] = '';
        } catch (\Exception $e) {
            $product['status']  = 0;
            $product['data']    = null;
            $product['message'] = $e->getMessage();
        }

        return $product;
    }

    /**
     * Update Product
     *
     **/
    public static function updateProduct($productId, $productArr)
    {
        $stripe = new StripeClient(config('constant.STRIPE_PAYMENT.secret_key'));
        return $stripe->products->update($productId, $productArr);
    }

    /**
     * Create Product Price
     *
     * @param  mixed $amount
     * @param  mixed $productId
     * @return void
     */
    public static function createProductPrice($amount, $productId, $paymentType, $intervalCount)
    {
        $stripe = self::configureStripe();

        try {

            if ($paymentType == 'Recurring') {
            }

            $priceData = [
                'unit_amount' => $amount * 100,
                'currency' => config('constant.STRIPE_PAYMENT.STRIPE_CURRENCY'),
                'product' => $productId,
                'recurring' => [
                    'interval' => 'month',
                    'interval_count' => $intervalCount,
                ]
            ];

            $price['data']    =  $stripe->prices->create($priceData);
            $price['status']  = 1;
            $price['message'] = '';
        } catch (\Exception $e) {
            $price['status']  = 0;
            $price['data']    = null;
            $price['message'] = $e->getMessage();
        }

        return $price;
    }

    /**
     * Create Product Payment Link
     *
     **/
    public static function createProductPaymentLink($priceId)
    {
        $stripe = self::configureStripe();

        try {

            $paymentLinkData = [
                'line_items' => [
                    [
                        'price' => $priceId,
                        'quantity' => 1,
                    ],
                ],
            ];

            $price['data']    =  $stripe->paymentLinks->create($paymentLinkData);
            $price['status']  = 1;
            $price['message'] = '';
        } catch (\Exception $e) {
            $price['status']  = 0;
            $price['data']    = null;
            $price['message'] = $e->getMessage();
        }

        return $price;
    }


    /**
     * Get Product Payment Link
     *
     **/
    public static function getProductPaymentLink($paymentLinkId)
    {
        $stripe = self::configureStripe();

        try {

            $price['data']    =  $stripe->paymentLinks->retrieve($paymentLinkId);
            $price['status']  = 1;
            $price['message'] = '';
        } catch (\Exception $e) {
            $price['status']  = 0;
            $price['data']    = null;
            $price['message'] = $e->getMessage();
        }

        return $price;
    }


    /**
     * Create Session Product Payment Link
     *
     **/
    public static function createSessionProductPaymentLink($productId, $priceKey, $subscriptionType)
    {
        $stripe =  self::configureStripe();


        try {
            if ($subscriptionType == 1) {
                $mode = 'subscription';
            } else {
                $mode = 'payment';
            }

            $payment['data'] = $stripe->checkout->sessions->create([
                'success_url' => route('success-product-payment', ['productId' => $productId]),
                'cancel_url'  => route('cancel-product-payment'),
                'line_items' => [
                    [
                        'price'     => $priceKey,
                        'quantity'  => 1,
                    ],
                ],
                'mode' => $mode,
            ]);


            $payment['status'] = 1;
            $payment['message'] = '';
        } catch (\Exception $e) {
            $payment['status']  = 0;
            $payment['data']    = null;
            $payment['message'] = $e->getMessage();
        }
        return $payment;
    }


    /**
     * Retrive Product Intent
     *
     **/
    public static function retrievePaymentIntent($paymentIntentId)
    {
        $stripe =  self::configureStripe();

        try {
            $paymentIntent['data'] = $stripe->paymentIntents->retrieve($paymentIntentId);
            $paymentIntent['status'] = 1;
            $paymentIntent['message'] = '';
        } catch (\Exception $e) {
            $paymentIntent['status']  = 0;
            $paymentIntent['data']    = null;
            $paymentIntent['message'] = $e->getMessage();
        }
        return $paymentIntent;
    }


    /**
     * Retrive Invoice
     *
     **/
    public static function retrieveInvoice($invoiceId)
    {
        $stripe =  self::configureStripe();

        try {
            $invoice['data'] = $stripe->invoices->retrieve($invoiceId);
            $invoice['status'] = 1;
            $invoice['message'] = '';
        } catch (\Exception $e) {
            $invoice['status']  = 0;
            $invoice['data']    = null;
            $invoice['message'] = $e->getMessage();
        }
        return $invoice;
    }


    /**
     * Cancel Subscription
     *
     **/
    public static function cancelSubscription($subscriptionId)
    {
        $stripe =  self::configureStripe();

        try {
            $subscription['data'] = $stripe->subscriptions->cancel($subscriptionId);
            $subscription['status'] = 1;
            $subscription['message'] = '';
        } catch (\Exception $e) {
            $subscription['status']  = 0;
            $subscription['data']    = null;
            $subscription['message'] = $e->getMessage();
        }
        return $subscription;
    }
}
