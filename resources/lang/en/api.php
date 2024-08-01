<?php

/*
 |--------------------------------------------------------------------------
 | Message Language Lines
 |--------------------------------------------------------------------------
 |
 | The following language lines contain the Custom error messages used by
 | the . Some of these rules have multiple versions such
 | as the size rules. Feel free to tweak each of these messages here.
 |
 */

return [

    /*
    |--------------------------------------------------------------------------
    | Flash Messages Language Lines
    |  Common Messages
    |--------------------------------------------------------------------------
    */

    'temperature' => [
        'success' => 'temperature added successfully',
        'error' => 'There are some problem to add temperature',
        'not_found' => ':module not found'
    ],
    'jerk' => [
        'success' => 'jerk added successfully',
        'error' => 'There are some problem to add jerk',
    ],
    'access_key' => [
        'get' => 'All new access keys get successfully',
        'save' => 'HSM status change successfully',
        'error' => 'There are some problem to perform your request'
    ],
    'block_chain' => [
        'hash_key_success' => "Hash Key saved successfully",
        'error' => "There are some problem to perform your request"
    ],
    'auth' => [
        'duplicate_request' => 'User request is duplicate',
        'requested_time_old' => 'User request is too old',
        'md5_token_mismatch' => 'User MD5 token mismatch',
    ],

    'passkey_login' => [
        'success' => "You're now logged in.",
        'error' => 'Invalid login credential.',
        'is_verify' => 'This user email is not verify, please verify first!',
        'is_active' => 'You are deactivated by the admin, Please contact admin!',
        'page_expire' => 'Your opt page access request is expire.',
        'send_otp' => 'Security code is send on your email address.',
        'otp' => [
            'error' => 'Please enter correct security code.'
        ]
    ],

    'passkey' => [
        'store_or_update' => 'Credentials have been :module successfully.',
        'store_or_update_error' => 'There are some problem. Please try again!',
        'update_error' => 'No record found!',
        'get_list' => 'Credentials have been fetched successfully.',
        'get_list_error' => 'No record found!',
        'hsm_error' => 'Hsm Not allocated to you, Please contect you organizer'
    ]
];
