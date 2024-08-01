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
        Schema::create('platform_accounts', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->char('userId', 36)->nullable();
            $table->char('hsmId', 36)->nullable();
            $table->string('platform')->nullable();
            $table->string('title')->nullable();
            $table->string('accountId')->nullable();
            $table->text('accountUrl')->nullable();
            $table->text('faviconUrl')->nullable();
            $table->string('password')->nullable();
            $table->string('passwordSize')->default('0');
            $table->string('passwordSignature')->nullable();
            $table->string('ipAddress')->nullable();
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
        Schema::dropIfExists('platform_accounts');
    }
};
