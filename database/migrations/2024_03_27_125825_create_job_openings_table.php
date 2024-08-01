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
        Schema::create('job_openings', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->string('title')->nullable();
            $table->string('role')->nullable();
            $table->string('experience')->nullable();
            $table->string('address')->nullable();
            $table->string('education')->nullable();
            $table->enum('type', ['Full-Time', 'Part-Time'])->nullable()->comment('Full-Time, Part-Time');
            $table->longText('description')->nullable();
            $table->longText('extraDescription')->nullable();
            $table->boolean('status')->default(false)->comment('0 = InActive or 1 = Active');
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
        Schema::dropIfExists('job_openings');
    }
};
