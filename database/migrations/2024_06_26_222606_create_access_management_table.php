<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccessManagementTable extends Migration
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

            $table->char('user_id', 36);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->string('ip_address');
            $table->enum('operation_system', ['Windows', 'Mac', 'Linux', 'Ios', 'Android'])->default('Windows');

            $table->tinyInteger('password_visibility')->default(0)->comment('0 - Once per session, 2 - Every access attempt');

            $table->timestamps();
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
}
