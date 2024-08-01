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
        Schema::create('policy', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->char('createdBy', 36)->nullable();
            $table->string('policyName')->nullable();
            $table->text('policyDescription')->nullable();
            $table->enum('users', ['All users', 'Selected groups'])->nullable()->comment('\'All users\',\'Selected groups\'');
            $table->enum('applications', ['All applications', 'Selected applications'])->nullable()->comment('\'All applications\',\'Selected applications\'');
            $table->enum('access', ['Granted', 'Denied'])->comment('\'Granted\',\'Denied\'');
            $table->enum('passwordAuthFactor', ['Not selected', 'Once per session', 'Every access attempt'])->default('Not selected')->comment('\'Not selected\',\'Once per session\',\'Every access attempt\'');
            $table->tinyInteger('status')->default(1)->comment('0 - No, 1- Yes');
            $table->timestamp('createdAt')->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate()->nullable();
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
        Schema::dropIfExists('policy');
    }
};
