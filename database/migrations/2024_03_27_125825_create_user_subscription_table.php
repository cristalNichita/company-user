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
        Schema::create('user_subscription', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->char('user_id', 36)->nullable();
            $table->char('transaction_id', 36)->nullable();
            $table->text('subscriptionId')->nullable();
            $table->string('subscriptionPlanName')->nullable();
            $table->tinyInteger('isSubscribe')->default(0);
            $table->enum('status', ['Pending', 'Complete', 'Failed'])->default('Pending');
            $table->longText('data')->nullable();
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
        Schema::dropIfExists('user_subscription');
    }
};
