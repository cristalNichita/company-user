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
        Schema::create('hsms_tools', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->string('name')->nullable();
            $table->string('macId')->nullable();
            $table->text('licenceNumber')->nullable();
            $table->string('ipAddress')->nullable();
            $table->string('location')->default('Berlin, Germany');
            $table->string('storage')->nullable();
            $table->string('availableStorage')->nullable();
            $table->string('temperature')->nullable();
            $table->dateTime('lastUseDateTime')->nullable();
            $table->boolean('isActive')->default(true);
            $table->enum('hsmStatus', ['Active', 'Online', 'Offline', 'Deactive', 'Reboot'])->nullable();
            $table->enum('status', ['Created', 'Alloted', 'Assign', 'Registered', 'Available'])->default('Registered');
            $table->string('allocatedUserId')->nullable();
            $table->text('tunnelId')->nullable();
            $table->text('tunnelUrl')->nullable();
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
        Schema::dropIfExists('hsms_tools');
    }
};
