<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
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

            $table->enum('role', ['admin', 'subadmin', 'user', 'business'])->default('business');

            $table->char('parent_id', 36)->nullable();

            $table->string('fullname')->nullable();
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('password');
            $table->string('password_hint')->nullable();
            $table->string('image')->nullable();

            $table->boolean('two_factor_auth')->default(0);
            $table->text('google2fa_secret')->nullable();
            $table->string('face_id_image')->nullable();
            $table->string('two_factor_email')->nullable();
            $table->string('two_factor_phone')->nullable();
            $table->string('mfa_email')->nullable();
            $table->string('mfa_phone')->nullable();

            $table->boolean('is_key_manager_otp')->default(0);
            $table->string('key_manager_otp')->nullable();
            $table->dateTime('key_manager_expiry')->nullable();

            $table->string('verification_token')->nullable();
            $table->boolean('verified')->default(0);

            $table->string('theme_color')->nullable();
            $table->string('font_color')->nullable();
            $table->string('business_logo')->nullable();

            $table->text('stripe_session_id')->nullable();

            $table->boolean('subscribed')->default(0);
            $table->boolean('active')->default(0);
            $table->boolean('auto_upload')->default(0);
            $table->boolean('member')->default(0);

            $table->string('company_name')->nullable();
            $table->integer('key_count')->default(0);
            $table->timestamp('last_login')->nullable();
            $table->string('browser')->default('Google Chrome');
            $table->timestamp('last_logout')->nullable();

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
        Schema::dropIfExists('users');
    }
}
