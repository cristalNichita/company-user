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
        Schema::create('modules', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->enum('roleType', ['User', 'SubAdmin'])->comment('\'User\',\'SubAdmin\'');
            $table->string('slug')->nullable();
            $table->string('title')->nullable();
            $table->tinyInteger('isActive')->default(1);
            $table->text('methods')->nullable();
            $table->integer('orderBy')->default(0);
            $table->timestamp('createdAt')->nullable();
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
        Schema::dropIfExists('modules');
    }
};
