<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('testhtml', function() {
    return view('testhtml.index');
});
// Web Authn Controller
Route::get('webauthn', 'User\WebAuthnController@index')->name('webauthn');
Route::post('webregister', 'User\WebAuthnController@webregister')->name('webregister');
Route::post('webauthnvalid', 'User\WebAuthnController@webauthnvalid')->name('webauthnvalid')->middleware('cors');

//Check Unique
Route::post('check/unique/{tableName}/{columnName}/{id?}', 'Controller@checkUnique')->name('UniqueCheck');
Route::post('check/unique-account/{tableName}/{columnName}/{platform?}', 'Controller@checkUniqueAccountUserId')->name('UniqueCheckAccountUserId');
Route::post('check/unique-employee-id/{tableName}/{columnName}/{id?}', 'Controller@checkUniqueEmployeeId')->name('checkUniqueEmployeeId');
Route::post('check/unique-admin-employee-id/{tableName}/{columnName}/{id?}', 'Controller@checkUniqueAdminEmployeeId')->name('checkUniqueAdminEmployeeId');
Route::post('check/own-employee-id/{tableName}/{columnName}/{platform?}', 'Controller@checkOwnEmployeeId')->name('checkOwnEmployeeId');

//User Plan Controller
Route::get('createPlanPayment/{planId}', 'UserPlanController@createPlanPayment')->name('createPlanPayment');
Route::get('success', 'UserPlanController@success')->name('success');
Route::get('cancel', 'UserPlanController@cancel')->name('cancel');

// Browser Extension MFA page
Route::get('mfa', function (Request $request) {
    Auth::loginUsingId($request->userId);
    return view('user.passkey.mfa');
})->name('mfa');

// Welcome Page
Route::get('/', function () {
    return redirect()->route('dashboardPage');
})->name('home');

//Organizer & User Login Page
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

//RegisterRequest Page
Route::get('/register', function () {
    return view('auth.register');
})->name('register');

//Coming-Soon Controller
Route::get('coming-soon', 'ComingSoonController@index')->name('comingSoon');
Route::post('store-coming-soon', 'ComingSoonController@comingSoonStore')->name('comingSoonStore');

//Front Auth Controller
Route::post('selectedUserTwoFactorOtp', 'AuthController@selectedUserTwoFactorOtp')->name('selectedUserTwoFactorOtp');
Route::post('selectedUserMfaOtp', 'AuthController@selectedUserMfaOtp')->name('selectedUserMfaOtp');
Route::post('addRegistrationMemberDetail/{type}', 'AuthController@addRegistrationMemberDetail')->name('addRegistrationMemberDetail');
Route::post('/register', 'AuthController@register')->name('postRegister');

Route::post('/schedule-demo', 'ScheduleController@createSchedule')->name('postScheduleDemo');   //JP

Route::post('/contact-us-request-save', 'ContactUsController@contactUsRequestSave')->name('contactUsRequestSave');    //JP
Route::post('/news-update-post', 'ContactUsController@newsletterPost')->name('newsUpdatePost');    //JP

Route::get('/resend-verification-form', function () {
    return view('auth.resend-verification-mail');
})->name('resendVerificationForm');

Route::post('/resend-verification-link', 'AuthController@resendVerificationLink')->name('resendVerificationLink');

//Front Auth Controller
Route::post('/login', 'AuthController@login')->name('postLogin');
Route::post('/check-otp', 'AuthController@checkUserOtp')->name('checkUserOtp');
Route::get('verify/email/{url}', 'AuthController@verifyEmail')->name('verifyEmail');
Route::get('/otp/{opt}/{email}/{number}', 'AuthController@userOtpPage')->name('userOtpPage');


Route::prefix('forgot-password')->group(function () {
    Route::get('/', function () {
        return view('auth.forgot-password');
    })->name('forgotPassword');
    Route::post('/', 'AuthController@forgotPassword')->name('postForgotPassword');
    Route::get('reset-form/{url}', 'AuthController@resetPasswordForm')->name('resetPasswordForm');
    Route::post('reset-form', 'AuthController@resetPassword')->name('resetPassword');
});

// checkRolePermission
Route::middleware(['auth', 'checkUser'])->group(function () {
    //Front User Payment Controller
    Route::get('/user-payment-detail', 'UserPaymentController@getUserPaymentDetail')->name('userPaymentDetail');
    Route::post('/cancel-recurring-request', 'UserPaymentController@cancelRecurringRequest')->name('cancelRecurringRequest');

    //Front Setting Controller
    Route::prefix('setting')->group(function () {
        Route::get('logout', 'AuthController@logout')->name('logout');
        Route::get('/', 'SettingController@index')->name('settingForm');
        Route::post('update-profile', 'SettingController@updateProfile')->name('updateProfile');
        Route::post('change-password', 'SettingController@changePassword')->name('changePassword');
        Route::post('change-two-factor-status', 'SettingController@changeTwoFactorStatus')->name('change-two-factor-status');
        Route::post('checkTwoFactorUserOpt', 'SettingController@checkTwoFactorUserOpt')->name('checkTwoFactorUserOpt');
        Route::post('checkTwoFactorUserOptJson', 'SettingController@checkTwoFactorUserOptJson')->name('checkTwoFactorUserOptJson');
        Route::post('sendTwoFactorOtpUser', 'SettingController@sendTwoFactorOtpUser')->name('sendTwoFactorOtpUser');
        Route::post('checkMfaUserOpt', 'SettingController@checkMfaUserOpt')->name('checkMfaUserOpt');
        Route::post('checkMfaUserOptJson', 'SettingController@checkMfaUserOptJson')->name('checkMfaUserOptJson');
        Route::post('sendMfaOtpUser', 'SettingController@sendMfaOtpUser')->name('sendMfaOtpUser');
        Route::post('cancelSubscriptionPlan', 'SettingController@cancelSubscriptionPlan')->name('cancelSubscriptionPlan');
        Route::post('deleteUserTwoFactorAuth', 'SettingController@deleteUserTwoFactorAuth')->name('deleteUserTwoFactorAuth');
        Route::post('check-user-password', 'SettingController@checkUserPassword')->name('checkUserPassword');
        Route::post('update-fullname', 'SettingController@updateFullname')->name('updateFullname');
        Route::post('update-email', 'SettingController@updateEmailAddress')->name('updateEmailAddress');
        Route::post('deleteAccount', 'SettingController@deleteAccount')->name('deleteAccount');
        Route::post('verify-otp-app', 'SettingController@verify2FAAuthentication')->name('verifyOtpApp');
        Route::post('purge-vault', 'SettingController@purgeVault')->name('purgeVault');
    });

    // Front Dashboard Controller
    Route::prefix('dashboard')->group(function () {
        Route::get('/', 'DashboardController@index')->name('dashboardPage');
        Route::get('new', 'DashboardController@newDashboard')->name('newDashboard');
        Route::post('updateAutomaticallyUpload', 'DashboardController@updateAutomaticallyUpload')->name('updateAutomaticallyUpload');
        Route::get('/getPasswordChart', 'DashboardController@getPasswordChart')->name('getPasswordChart');
    });

    //Front Business Controller
    Route::prefix('members')->group(function () {
        Route::get('/', 'BusinessController@index')->name('memberPage');
        Route::resource('business', 'BusinessController');
        Route::post('business/search', 'BusinessController@search')->name('business.search');
        Route::post('business/searchActivityLog', 'BusinessController@searchActivityLog')->name('business.searchActivityLog');
        Route::post('business/status/{business}', 'BusinessController@changeMemberStatus')->name('business.status');
        Route::get('userRoleEdit/{business}', 'BusinessController@userRoleEdit')->name('business.userRoleEdit');
        Route::post('addUpdateRole', 'BusinessController@addUpdateRole')->name('business.addUpdateRole');
        Route::post('add-member', 'BusinessController@addMember')->name('addMember');
        Route::post('user-delete', 'BusinessController@deleteUser')->name('userDelete');
        Route::post('user-update', 'BusinessController@updateMember')->name('updateMember');
        Route::get('view-detail/{id}', 'BusinessController@memberViewDetailPage')->name('memberViewDetailPage');
    });

    // Custom Role Controller
    Route::resource('custom-roles', 'CustomRoleController');
    Route::post('custom-roles/search', 'CustomRoleController@search')->name('custom-roles.search');
    Route::post('custom-role/role-delete', 'CustomRoleController@roleDelete')->name('roleDelete');

    // Audit Log Controller
    Route::resource('audit-logs', 'AuditLogController');
    Route::post('audit-logs/search', 'AuditLogController@search')->name('audit-logs.search');

    Route::get('userPlanPage', 'UserPlanController@userPlanList')->name('userPlanPage');

    // User Contact Us Controller
    Route::prefix('user-contact-us')->group(function () {
        Route::get('/', 'UserContactUsController@index')->name('userContactUs');
        Route::post('createScheduleUser', 'UserContactUsController@createScheduleUser')->name('createScheduleUser');
    });

    //Passwords Controller
    Route::resource('passwords', 'User\PasswordController');
    Route::post('pass-key-delete', 'User\PasswordController@deletePassKey')->name('deletePassKey');
    Route::post('/ajaxActivityRequest', 'User\PasswordController@ajaxActivityRequest')->name('ajaxActivityRequest');
    Route::post('/updatePrimaryHsmId', 'User\PasswordController@updatePrimaryHsmId')->name('updatePrimaryHsmId');
    Route::post('/checkPasswordStrength', 'User\PasswordController@checkPasswordStrength')->name('checkPasswordStrength');
    Route::get('/getPasswordCloudAjax/{id}', 'User\PasswordController@getPasswordCloudAjax')->name('getPasswordCloudAjax');
    Route::post('get-one-password', 'User\PasswordController@getOnePassword')->name('getOnePassword');
    Route::post('search-passwords', 'User\PasswordController@searchPasswords')->name('searchPasswords');

    //Front Passkey Controller
    Route::get('index', 'User\PasskeyController@index')->name('passkey.index');

    Route::middleware(['2fa'])->group(function () {
        Route::post('2fa', 'User\PasskeyController@authSave')->name('2fa');
    });

    Route::resource('passkey', 'User\PasskeyController');
    Route::get('installed-passkey', 'User\PasskeyController@installPasskey')->name('installPasskey');
    Route::post('deleteOtp', 'User\PasskeyController@deleteOtp')->name('deleteOtp');
    Route::post('deletePasskey', 'User\PasskeyController@deletePasskey')->name('deletePasskey');
    Route::post('deleteAuthentication', 'User\PasskeyController@deleteAuthentication')->name('deleteAuthentication');
    Route::post('authVerify', 'User\PasskeyController@authVerify')->name('authVerify');
    Route::post('/register-face-id', 'User\PasskeyController@store')->name('register.register-face-id');
    Route::post('deleteFaceId', 'User\PasskeyController@deleteFaceId')->name('deleteFaceId');
    Route::post('/validate-face', 'User\PasskeyController@validateFace')->name('validate.face');


    //Browser Extensions
    Route::resource('browser-extensions', 'User\BrowserExtensionController');
    Route::get('/download-extension/{id}', 'User\BrowserExtensionController@downloadExtension')->name('download-extension');

    //Support Tickets
    Route::resource('support-tickets', 'User\SupportTicketController');
    Route::post('support-tickets/search', 'User\SupportTicketController@search')->name('support-tickets.search');

    Route::get('activity', function() {
        $user = Auth::user();
        return view('user.activity.index', compact('user'));
    })->name('activity');

    Route::get('user-management', function() {
        $user = Auth::user();

        return view('user.user-management.index', compact('user'));
    })->name('userManagement');

    Route::get('password-generator', function() {
        $user = Auth::user();
        return view('user.password-generator.index', compact('user'));
    })->name('passwordGenerator');
});
