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
        Schema::create('organization_custom_roles', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->char('organizerId', 36)->nullable();
            $table->string('roleName')->nullable();
            $table->string('roleDescription')->nullable();
            $table->longText('hsmStorage')->nullable();
            $table->string('numberPassword')->nullable();
            $table->string('numberApplication')->nullable();
            $table->longText('authentication')->nullable();
            $table->longText('device')->nullable();
            $table->longText('browser')->nullable();
            $table->longText('application')->nullable();
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
        Schema::dropIfExists('organization_custom_roles');
    }
};
