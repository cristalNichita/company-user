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
        Schema::create('scenario', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->char('policyId', 36)->nullable();
            $table->string('scenarioName')->nullable();
            $table->enum('network', ['Inside this network', 'Outside these network'])->nullable()->comment('\'Inside this network\',\'Outside these network\'');
            $table->longText('networkIp')->nullable();
            $table->longText('operatingSystem')->nullable();
            $table->longText('userLocation')->nullable()->comment('countries');
            $table->enum('access', ['Granted', 'Denied'])->nullable()->comment('\'Granted\',\'Denied\'');
            $table->enum('passwordAuthFactor', ['Not selected', 'Once per session', 'Every access attempt'])->default('Not selected');
            $table->tinyInteger('status')->nullable()->default(1)->comment('0 - No, 1- Yes');
            $table->timestamp('createdAt')->useCurrent();
            $table->timestamp('updatedAt')->useCurrentOnUpdate()->nullable();
            $table->timestamp('deletedAt')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scenario');
    }
};
