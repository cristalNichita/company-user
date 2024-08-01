<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('v1')->group(function () {
    Route::namespace('API')->group(function () {
        //PasskeyController--------------------------
        Route::prefix('passkey')->group(function () {
            Route::post('passkey-login', 'PasskeyController@loginPasskey');
            Route::post('get-logo', 'PasskeyController@getLogo');
            Route::middleware('auth:api')->group(function () {
                Route::post('store-passkey', 'PasskeyController@storePasskey');
                Route::post('update-passkey', 'PasskeyController@updatePasskey');
                Route::post('list-passkey', 'PasskeyController@listPasskey');
                Route::post('get-otp', 'PasskeyController@getOtp');
                Route::post('verify-otp', 'PasskeyController@verifyOtp');
                Route::post('auth-app-otp', 'PasskeyController@authenticationAppOtp');
                Route::post('face-varification', 'PasskeyController@verifyFace');
                Route::post('browser-extension', 'PasskeyController@browserExtension');
                Route::post('user-auth-array', 'PasskeyController@userAuthArray');
                Route::post('update-automatically-upload', 'PasskeyController@updateAutomaticallyUpload');
                Route::post('get-auto-upload-status', 'PasskeyController@getAutomaticallyUploadStatus');
                Route::post('check-browser-extension', 'PasskeyController@browserExtensionCheck');
                Route::post('get-password', 'PasskeyController@getPassword');
            });
        });
    });
    Route::post('passkey-validation', 'User\WebAuthnController@passkeyValidate')->name('passkeyValidate');
});
