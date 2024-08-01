<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->string('scheduleId')->nullable()->comment('userId');
            $table->string('productName')->nullable()->comment('Company Name');
            $table->double('productPrice', 11, 2)->default(0)->comment('Final price depends on software & hardware');
            $table->string('productDescription')->nullable();
            $table->string('productImage')->nullable();
            $table->string('planId')->nullable()->comment('SoftwarePlanId');
            $table->string('hardwarePlanId')->nullable();
            $table->integer('employeeStrength')->default(0)->comment('Members (No of user accounts)');
            $table->integer('noOfDevices')->default(0);
            $table->integer('noOfApplications')->default(0);
            $table->integer('noOfExtensions')->default(0);
            $table->string('usageConsumptionBytes')->nullable();
            $table->string('productTransactionsId')->nullable();
            $table->string('stripeProductId')->nullable();
            $table->string('stripeProductPriceId')->nullable();
            $table->string('stripeProductpaymentLinkId')->nullable();
            $table->string('paymentLinkIsActive')->nullable();
            $table->text('paymentLinkUrl')->nullable();
            $table->string('stripeSessionId')->nullable();
            $table->text('stripeSessionUrl')->nullable();
            $table->string('paymentIntentId')->nullable();
            $table->string('productTransactionId')->nullable();
            $table->boolean('isPaid')->default(false)->comment('0 = Not paid or 1 = paid');
            $table->enum('paymentType', ['Recurring', 'Onetime'])->default('Recurring');
            $table->integer('recuringDurationMonths')->nullable()->default(0);
            $table->tinyInteger('isPlanCancelled')->default(0);
            $table->timestamp('createdAt')->nullable();
            $table->timestamp('updatedAt')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
