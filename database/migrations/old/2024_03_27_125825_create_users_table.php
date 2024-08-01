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
        Schema::create('users', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->enum('role', ['admin', 'subadmin', 'user', 'business'])->nullable()->comment('\'admin\',\'subadmin\',\'user\',\'business\'');
            $table->char('parentId', 36)->nullable();
            $table->char('primaryHsmId', 36)->nullable();
            $table->string('planId')->nullable()->comment('"software plan id"');
            $table->string('hardwarePlanId')->nullable();

            $table->string('employeeId')->nullable();
            $table->string('userName')->nullable()->comment('Consider in whole project');
            $table->string('firstName', 50)->nullable();
            $table->string('lastName', 50)->nullable();
            $table->text('google2fa_secret')->nullable();
            $table->string('faceIdImage')->nullable();
            $table->string('email', 50);
            $table->string('mobileNumber')->nullable();
            $table->string('twoFactorEmail')->nullable();
            $table->string('twoFactorMobileNumber', 50)->nullable();
            $table->boolean('twoFactorAuth')->default(false)->comment('0:NO, 1:YES');
            $table->string('mfaEmail')->nullable();
            $table->string('mfaMobileNumber')->nullable();
            $table->string('keyManagerOTP', 50)->nullable();
            $table->dateTime('keyManagerExpiry')->nullable();
            $table->boolean('isKeyManagerOTP')->default(false);
            $table->string('password')->nullable();
            $table->string('profilePicture', 100)->nullable()->default('profile_1689834829.png');
            $table->string('verificationToken')->nullable();

            $table->boolean('isVerified')->default(true)->comment('1 = verified,0 => not verified');
            $table->string('themeColor')->nullable();
            $table->string('fontColor')->nullable();
            $table->string('businessLogo')->nullable();
            $table->text('stripeSessionId')->nullable();
            $table->tinyInteger('isSubscribe')->default(0);
            $table->boolean('isActive')->default(false)->comment('1 = active,0 => inactive, 2 => invited');
            $table->boolean('automaticallyUpload')->default(false)->comment('0 = Off, 1 = On');
            $table->bigInteger('hardwareAccessNo')->default(0);
            $table->tinyInteger('isMember')->default(0);
            $table->string('allocatedStorage')->default('0')->comment('Bytes');
            $table->string('remainingStorage')->default('0')->comment('Bytes');
            $table->string('usedStorage')->default('0')->comment('Bytes');
            $table->boolean('isBOT')->default(false)->comment('0 = NOTBOT, 1 = BOT');
            $table->string('productId')->nullable();
            $table->string('scheduleId')->nullable();

            $table->string('companyName')->nullable();
            $table->string('hsmToolsId')->nullable();
            $table->boolean('isLicenceVerified')->default(false);
            $table->integer('employeeStrength')->default(0);
            $table->timestamp('startDateTime')->nullable();
            $table->timestamp('endDateTime')->nullable();
            $table->enum('recurringStatus', ['automatic', 'canceled'])->default('automatic');
            $table->integer('keyCount')->default(0);
            $table->timestamp('lastLogin')->nullable();
            $table->string('browser')->default('Google Chrome');
            $table->timestamp('lastLogout')->nullable();
            $table->timestamp('createdAt')->nullable();
            $table->timestamp('updatedAt')->nullable();
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
        Schema::dropIfExists('users');
    }
};
