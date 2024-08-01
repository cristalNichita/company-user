<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrowserExtensionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('browser_extensions', function (Blueprint $table) {
            $table->char('id', 36)->primary();

            $table->char('user_id', 36)->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->string('system_name')->nullable();
            $table->string('system_type')->nullable();
            $table->string('ip_address')->nullable();
            $table->string('brand_name')->nullable();
            $table->string('model_number')->nullable();
            $table->string('browser')->nullable();

            $table->boolean('installed')->default(false);
            $table->boolean('active')->default(false);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('browser_extensions');
    }
}
