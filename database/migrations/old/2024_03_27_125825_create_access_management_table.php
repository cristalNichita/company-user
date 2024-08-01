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
        Schema::create('access_management', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->char('userId', 36)->nullable();
            $table->string('ipAddress')->nullable();
            $table->integer('operatingSystem')->nullable()->comment('1 - Windows, 2 - macOS, 3 - iOS, 4 - Android');
            $table->string('location')->nullable();
            $table->integer('password')->nullable()->comment('1 - Once per session, 2 - Every access attempt');
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
        Schema::dropIfExists('access_management');
    }
};
