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
        Schema::create('cloud_files', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->string('user_id', 100);
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->text('securityKey')->nullable();
            $table->text('hashKey')->nullable();
            $table->boolean('HSMStatus')->default(false);
            $table->boolean('blockChainStatus')->default(false)->comment('0 => NOT UPLOADED,1 UPLOAD ON BLOCK CHAIN');
            $table->string('fileName', 100)->nullable();
            $table->string('fileSize', 100)->nullable();
            $table->string('ipAddress', 100)->nullable();
            $table->string('fileSizeFormat')->nullable();
            $table->string('contentType')->nullable();
            $table->text('privacyKey')->nullable();
            $table->boolean('privacyStatus')->default(false)->comment('1 => Private 0 => Public');
            $table->boolean('wasabiFileStatus')->default(false);
            $table->timestamp('deletedAt')->nullable();
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
        Schema::dropIfExists('cloud_files');
    }
};
