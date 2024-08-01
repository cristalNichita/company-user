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
        Schema::create('product_transactions', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->string('scheduleId')->nullable();
            $table->string('productId')->nullable();
            $table->string('userId')->nullable();
            $table->string('chargeId')->nullable();
            $table->string('paymentIntentId')->nullable();
            $table->string('invoiceId')->nullable();
            $table->string('customerId')->nullable();
            $table->string('subscriptionId')->nullable();
            $table->string('paymentMethodId')->nullable();
            $table->string('paymentType')->nullable();
            $table->string('cardBrand')->nullable();
            $table->string('lastForDigit')->nullable();
            $table->string('expiryMonth')->nullable();
            $table->string('expiryYear')->nullable();
            $table->text('hostedInvoiceUrl')->nullable();
            $table->text('invoicePdf')->nullable();
            $table->enum('status', ['Pending', 'Complete', 'Failed'])->default('Pending');
            $table->longText('sessionData')->nullable();
            $table->longText('invoiceData')->nullable();
            $table->longText('chargeData')->nullable();
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
        Schema::dropIfExists('product_transactions');
    }
};
