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
        Schema::create('audit_logs', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->char('parentId', 36)->nullable();
            $table->char('userId', 36)->nullable();
            $table->string('hsmId')->nullable();
            $table->string('ipAddress')->nullable();
            $table->string('action')->nullable();
            $table->text('description')->nullable();
            $table->string('url')->nullable();
            $table->string('accessMode')->nullable();
            $table->string('strength')->nullable();
            $table->string('browser')->nullable();
            $table->timestamp('createdAt')->useCurrent();
            $table->timestamp('updatedAt')->useCurrentOnUpdate()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('audit_logs');
    }
};
