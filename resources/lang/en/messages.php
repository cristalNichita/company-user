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

    'msg' => [
        'get' => [
            'success' => 'Get :module has been successfully.',
            'error' => 'Get :module has been not found.',
        ],
        'created' => [
            'success' => 'This :module has been created successfully.',
            'error' => 'This :module has been not created, try again!',
        ],
        'updated' => [
            'success' => 'This :module has been updated successfully.',
            'error' => 'Get :module has been not updated, try again!',
        ],
        'deleted' => [
            'success' => 'This :module has been deleted successfully.',
            'error' => 'Get :module has been not deleted, try again!',
        ],
        'status' => [
            'success' => 'This :module has been :type successfully.',
            'error' => 'Get :module has been not :type, try again!',
        ],
        'wrong' => [
            'success' => 'Your :module has been updated successfully.',
            'error' => 'Your :module seems to be invalid, please try again!',
        ],
        'wrong1' => [
            'success' => 'Your :module has been updated successfully.',
            'error' => 'Your :module is wrong, please try again!',
        ],
        'assign_already' => [
            'success' => 'This :module has been assigned, First remove it this then you can remove it this :module.',
            'error' => 'Get :module has been not :type, try again.',
        ],
        'not_found' => 'This :module has been not found.',
        'reports' => [
            'error' => 'Records not found as per your criteria.',
        ],
        'two_factor' => [
            'success' => 'Two-factor authentication has been :type successfully.',
            'error' => 'Two-factor authentication has been not :type, try again.',
            'add_two_factor' => 'Please add email & mobile number to enabled two-factor authentication.'
        ],
        'assign_plan' => [
            'success' => 'The plan has been assigned to user successfully.',
            'error' => 'There are some problem to assign plan.',
        ]
    ],

    'browser_extensions' => [
        'success' => 'Device Added successfully! Install Extension into the System to activate the device.',
        'error' => 'There is some problem to add browser extension.',
    ],

    'conatct-us' => [
        'created' => [
            'success' => 'Thank You for contacting us. We will get back to you shortly.',
            'error' => 'There is some problem we will be contact you soon.',
        ],
        'change_status' => [
            'success' => 'Contact status has been changed successfully.',
            'error' => 'There are some problem to change status.',
        ],
        'not_found' => 'This contact-us not found.',
    ],
    'schedule' => [
        'created' => [
            'success' => 'Thank You for contacting us. We will get back to you shortly.',
            'error' => 'There is some problem we will be contact you soon.',
        ],
        'change_status' => [
            'success' => 'Contact status has been changed successfully.',
            'error' => 'There are some problem to change status. Please try again!',
        ],

        'not_found' => 'This contact-us not found.',
    ],
    'edit_email' => [
        'success' => 'Email has been changed successfully.',
        'error' => 'There are some problem to change email. Please try again later!',
    ],

    'register' => [
        'success' => 'Your account has been created successfully. Please verify email!',
        'error'   => 'There is some problem to register. Please try again!',
        'token' => [
            'success' => 'Email has been verified successfully.',
            'error' => 'Token is not correct.',
            'already' => 'This link is already used.'
        ]
    ],
    'login' => [
        'success' => "You're now logged in.",
        'error' => 'Login credential is wrong.',
        'is_verify' => 'This user email is not verify, please verify first!',
        'is_active' => 'You are deactivated by the admin, Please contact admin!',
        'page_expire' => 'Your opt page access request is expire.',
        'send_otp' => 'Security code is send on your email address.',
        'send_otp_mobile' => 'Security code is send on your mobile number.',
        'otp_error' => 'We are currently experiencing an issue with sending OTP. Please try again later. We apologize for any inconvenience.',
        'otp_msg' => 'Your OTP for Admin Login with Flashx is :otp',

        'otp_verify' => 'OTP has been verified successfully.',
        'otp_verify_email' => 'Email OTP has been verified successfully.',
        'otp_verify_mobile' => 'Mobile OTP has been verified successfully.',


        'invalid_otp' => 'Invalid OTP',
        'hsm_not_assign' => 'HSM not assigned yet. Please contact to administrater!',
        'switch_admin' => 'Switch to admin successfully.',
        'switch_organizer' => 'Switch to organizer successfully.',
        'otp' => [
            'error' => 'Please enter correct security code.'
        ]
    ],
    'resend_link' => [
        'success' => 'Verification link send successfully, Please check your email!',
        'error' => 'We are currently experiencing an issue with sending verification link. Please try again later. We apologize for any inconvenience.'
    ],
    'logout' => [
        'success' => 'Logout successfully.'
    ],
    'profile' => [
        'update' => [
            'success' => 'Profile has been updated successfully.',
            'error'   => 'There is some problem to updating profile!'
        ],
        'admin' => [
            'permission_denied' => 'Permission denied.',
        ]
    ],
    'profileImage' => [
        'update' => [
            'success' => 'Profile image updated successfully.',
            'error'   => 'There is some problem to update profile image!'
        ],
        'delete' => [
            'success' => 'Profile image deleted successfully.',
            'error'   => 'There is some problem to delete profile image!'
        ]
    ],
    'change_password' => [
        'success' => 'Password have been changed successfully.',
        'old_password_error' => 'Your old password is not match!',
        'error' => 'There are some problem to changing password!'
    ],
    'forgot_password' => [
        'email_send' => 'Please check your email.',
        'email_error' => 'We are currently experiencing an issue with sending emails. Please try again later. We apologize for any inconvenience.',
        'used_link' => 'This link is already used.',
        'token_error' => 'Reset password token is wrong.',
        'success' => 'The password has been reset successfully.'
    ],
    'cloud_file' => [
        'upload' => [
            'success' => 'File uploaded successfully.',
            'error'   => 'There is some problem to upload file.',
            'size_error' => 'File size is too big, please upload other file.',
            'size_limit' => 'You can\'t upload file because your storage limit is over.',
        ],
        'change_status' => [
            'success' => 'Cloud file status is :status.',
            'error' => 'There are some problem to change status.',
            'privacy_key_error' => 'Entered private encryption key is wrong.'
        ],
        'delete' => [
            'success' => 'Cloud file deleted successfully.',
            'error' => 'There are some problem to delete file.',
        ],
        'trash' => [
            'all_delete' => 'All trash file is deleted successfully.',
            'delete' => 'Cloud file permanent deleted.',
            'restore' => 'File restored successfully.',
            'restore_error' => 'There are some problem to restore file.'
        ]
    ],
    'key-manager' => [
        'otp' => [
            'error' => 'Please enter correct security code.'
        ],
        'verifyKey' => [
            'success' => 'Licence Key verified successfully.',
            'error' => 'Please enter valid licence key.',
        ]
    ],
    'user' => [
        'change_status' => [
            'success' => 'User is :status now.',
            'error' => 'There are some problem to change status.'
        ],
        'created' => [
            'success' => 'Thank You for contacting us. We will get back to you shortly.',
            'error' => 'There is some problem we will be contact you soon',
        ],
    ],
    'member' => [
        'change_status' => [
            'success' => 'Member is :status now.',
            'error' => 'There are some problem to change status.'
        ],
        'invitation_sent' => 'Invitation Sent successfully on Email and Phone. Ask Invitee to open the received link to Access.',
        'success' => 'Member have been :module successfully.',
        'error' => 'The user role field is required.',
        'limit' => 'You can\'t add member. Because your member limit is over!',
        'password_limit' => 'You can\'t add password. Because your password limit is over!',
        'application_limit' => 'You can\'t add password. Because your application limit is over!',
        'os_limit' => 'You can\'t add password. Access denied for this operating system!',
        'browser_limit' => 'You can\'t add password. Access denied for this browser!',
        'browser_denied' => 'Access denied for this browser!',
        'plan' => 'You can\'t add member. Because you have no plan!'
    ],
    'plan' => [
        'success' => 'Plan successfully created.',
        'error' => 'There are some problem to create plan.'
    ],

    'group' => [
        'change_status' => [
            'success' => 'Group is :status now.',
            'error' => 'There are some problem to change status.'
        ],
        'success' => 'Group :module successfully.',
        'error' => 'There are some problem. Please try again later!',

        'delete' => 'Group has been deleted successfully.',
        'delete_error' => 'There are some problem to delete group.',
    ],

    'policy' => [
        'change_status' => [
            'success' => 'Policy is :status now.',
            'error' => 'There are some problem to change status.'
        ],
        'success' => 'Policy :module successfully.',
        'error' => 'There are some problem. Please try again later!',

        'delete' => 'Policy has been deleted successfully.',
        'delete_error' => 'There are some problem to delete policy.',
    ],

    'scenario' => [
        'change_status' => [
            'success' => 'Scenario is :status now.',
            'error' => 'There are some problem to change status.'
        ],
        'success' => 'Scenario :module successfully.',
        'error' => 'There are some problem. Please try again later!',

        'delete' => 'Scenario has been deleted successfully.',
        'delete_error' => 'There are some problem to delete scenario.',
    ],

    'application' => [
        'change_status' => [
            'success' => 'Application is :status now.',
            'error' => 'There are some problem to change status.'
        ],
        'success' => 'Application :module successfully.',
        'error' => 'There are some problem to change status.',

        'delete' => 'Application has been deleted successfully.',
        'delete_error' => 'There are some problem to delete application.',
    ],

    'theme' => [
        'businessLogo' => [
            'success' => 'Business logo uploaded successfully.',
            'error'   => 'There is some problem to upload business logo.'
        ],
        'themeColor' => [
            'success' => 'Theme color has been added successfully.',
            'error'   => 'There is some problem to add theme color.'
        ]
    ],
    'transaction' => [
        'success'   => 'Payment has been done successfully.',
        'cancel'    => 'Payment Cancelled.',
        'error'     => 'There is some problem in subscription, please try again!',
        'noData'    => 'Your cart is empty.',
        'link'      => 'Payment url generated successfully.',
    ],
    'product_transaction' => [
        'success'   => 'Product payment has been done successfully.',
        'cancel'    => 'Product payment Cancelled.',
        'error'     => 'There is some problem in subscription, please try again!',
        'noData'    => 'Product not found.',
        'link'      => 'Payment url generated successfully.',
    ],
    'adminSubscription' => [
        'update' => 'plan updated successfully.'
    ],
    'schedule' => [
        'success'   => 'Schedule has been done successfully.',
        'error'   => 'There is some problem to schedule, please try again!',
    ],
    'applied_job' => [
        'success'   => 'Job applied successfully.',
        'error'   => 'There is some problem to applying jobs, please try again!',
    ],
    'hsm_tool' => [
        'success'   => 'HSM Tool has been created successfully.',
        'error'   => 'There is some problem to create HSM Tool, please try again!',
        'exists_macid' => 'Entered MAC id already exists.',
        'exists_licenceNumber' => 'Entered Licence Number already exists.',
        'status_success'   => 'HSM device has been activated successfully.',
        'status_error'   => 'There is some problem to active HSM device, please try again!',
        'storage_space'   => 'Not enough sapce for allocation!',
        'noOfApplications'   => 'Selected no of applications is more than assigned value.',
        'noOfExtensions'   => 'Selected no of extensions is more than assigned value.',
        'noOfDevices'   => 'Selected no of devices is more than assigned value.',
    ],
    'roles' => [
        'change_status' => [
            'success' => 'Role is :status now.',
            'error' => 'There are some problem to change status.'
        ],
        'delete' => [
            'success' => 'Role deleted successfully.',
            'error' => 'There are some problem to delete role.',
        ],
        'create' => [
            'success' => 'New Role has been created successfully. You can check it under the the list of Roles.',
            'error' => 'There are some problem to creating role.',
        ],
        'update' => [
            'success' => 'Role has been updated successfully.',
            'error' => 'There are some problem to updating role.',
        ],

        'already_used' => 'This role will not be deleted. It is already defined in the users.',

        'exists_macid' => 'Entered MAC id already exists.',
        'exists_licenceNumber' => 'Entered Licence Number already exists.',
    ],

    'user_contact_us' => [
        'success'   => 'Contact us details have been sent successfully.',
        'error'   => 'There is some problem sending contact us details, please try again!',
    ],

    'passkey' => [
        'store' => 'Upload password successfully.',
        // 'store' => 'Credentials have been added successfully on Passkey. Authorize to access password in the passkey.',
        'store_or_update' => 'Credentials have been :module successfully.',
        'store_or_update_error' => 'There are some problem. Please try again!',
        'update_error' => 'No record found!',
        'get_list' => 'Credentials have been fetched successfully.',
        'get_list_error' => 'No record found!'
    ],

    'browser' => [
        'store' => 'Browser extension added successfully.',
        'error' => 'There are some problem. Please try again later!',
    ],

    'authArray' => [
        'get' => 'Authentication fetch successfully.',
        'error' => 'There are some problem. Please try again later!',
    ]
];
