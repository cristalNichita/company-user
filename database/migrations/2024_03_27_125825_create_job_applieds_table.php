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
        Schema::create('job_applieds', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->string('jobId')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phoneNumber')->nullable();
            $table->string('document')->nullable();
            $table->longText('message')->nullable();
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
        Schema::dropIfExists('job_applieds');
    }
};
