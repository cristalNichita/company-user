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
        Schema::create('browser_extension', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->char('userId', 36)->nullable();
            $table->string('systemName')->nullable();
            $table->string('systemType')->nullable();
            $table->string('ipAddress')->nullable();
            $table->string('brandName')->nullable();
            $table->string('modelNumber')->nullable();
            $table->string('browserType')->nullable();
            $table->tinyInteger('isInstalled')->default(0);
            $table->tinyInteger('isActive')->default(0)->comment('0 - Inactive, 1- Active');
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
        Schema::dropIfExists('browser_extension');
    }
};
