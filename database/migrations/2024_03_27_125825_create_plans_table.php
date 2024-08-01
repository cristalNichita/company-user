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
        Schema::create('plans', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->char('paypalId', 36)->nullable();
            $table->string('planName')->nullable();
            $table->double('price', 10, 2)->default(0);
            $table->enum('type', ['Software', 'Hardware'])->nullable()->default('Software');
            $table->longText('stripeProductId')->nullable();
            $table->longText('stripePriceKey')->nullable();
            $table->longText('description')->nullable();
            $table->integer('storage')->default(0);
            $table->enum('storageType', ['mb', 'gb', 'tb'])->nullable();
            $table->integer('members')->default(0);
            $table->integer('noOfDevices')->default(0);
            $table->integer('noOfApplications')->default(0);
            $table->integer('noOfExtensions')->default(0);
            $table->tinyInteger('isActive')->default(1);
            $table->integer('duration')->default(12)->comment('Duration in Month');
            $table->string('country')->default('Germany');
            $table->string('language')->default('English, German ');
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
        Schema::dropIfExists('plans');
    }
};
