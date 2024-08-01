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
        Schema::create('schedules', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->char('userId', 36)->nullable();
            $table->string('ticketId')->nullable();
            $table->string('yourName')->nullable();
            $table->string('companyName')->nullable();
            $table->string('companyUrl')->nullable();
            $table->string('email')->nullable();
            $table->integer('employeeStrength')->nullable();
            $table->integer('usageConsumption')->nullable();
            $table->string('usageConsumptionFormat')->nullable();
            $table->string('countryCode')->nullable();
            $table->string('contactNumber', 20)->nullable();
            $table->string('subject')->nullable();
            $table->text('description')->nullable();
            $table->enum('status', ['Pending', 'InProgress', 'Completed', 'Paid'])->default('Pending');
            $table->enum('type', ['Schedule', 'Contact'])->default('Schedule');
            $table->boolean('isCreatedUser')->default(false);
            $table->string('productId')->nullable();
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
        Schema::dropIfExists('schedules');
    }
};
