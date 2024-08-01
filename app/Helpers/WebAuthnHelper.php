<?php

namespace App\Helpers;

use Illuminate\Support\Facades\File;
use lbuchs\WebAuthn\WebAuthn;

class WebAuthnHelper
{

    /*
    |--------------------------------------------------------------------------
    |  WebAuthn Helper
    |--------------------------------------------------------------------------
    |
    | This helper is used for WebAuthn methods written in controllers.
    | This helper contain WebAuthn methods that used at various controllers.
    |
    */

    /**
     * Initialize Web Auth
     *
     * @param $userData
     * @return array
     **/
    public static function init($userData = NULL)
    {
        // (A) RELYING PARTY - CHANGE TO YOUR OWN!
        $rp = [
            "name" => env('APP_NAME'),
            "id" => parse_url(env('APP_URL'), PHP_URL_HOST)
        ];

        $uuidWithHyphens =  $userData->id;
        $uuidWithoutHyphens = str_replace('-', '', $uuidWithHyphens);

        // (B) DUMMY USER
        $user = [
            "id" => $uuidWithoutHyphens,
            "name" => $userData->email,
            "display" => $userData->userName
        ];

        $directoryPath = storage_path('app/public/passkey/' . $user['id']); // Replace with the directory path you want to check

        if (is_dir($directoryPath)) {
            // Get a list of all files in the directory using scandir
            $files = scandir($directoryPath);

            // Filter out the "." and ".." entries
            $files = array_filter($files, function ($file) {
                return $file !== '.' && $file !== '..';
            });

            if (!empty($files)) {
                // Find the last file in the list
                $lastFile = end($files);
                $fileNameWithoutExtension = pathinfo($lastFile, PATHINFO_FILENAME);
                $filePath = $directoryPath . '/' . $lastFile;
                if (file_exists($filePath)) {
                    $fileName = ($fileNameWithoutExtension + 1);
                } else {
                    $fileName = 1;
                }
            } else {
                $fileName = 1;
            }
        } else {
            // Create the dynamic directory if it doesn't exist
            if (!is_dir(dirname($directoryPath))) {
                mkdir(dirname($directoryPath), 0777, true);
            }
            $fileName = 1;
        }

        //Save file path & name
        $saveto = storage_path('app/public/passkey/' . $user['id'] . '/' . $fileName . '.txt'); // Specify the path to the storage folder

        // (C) START SESSION & LOAD WEBAUTHN LIBRARY
        session_start();

        $WebAuthn = new WebAuthn($rp["name"], $rp["id"]);

        return [
            "WebAuthn"  => $WebAuthn,
            "user"      => $user,
            "saveto"    => $saveto
        ];
    }

    /**
     * Check User Passkey
     *
     * @param $userId
     **/
    public static function deleteUserPasskey($userId)
    {
        $uuidWithoutHyphens = str_replace('-', '', $userId);
        $directoryPath = storage_path('app/public/passkey/' . $uuidWithoutHyphens); // Replace with the directory path you want to check

        if (is_dir($directoryPath)) {

            File::deleteDirectory($directoryPath);

            return true;
        }
        return false;
    }

    /**
     * Check User Passkey
     *
     * @param $userId
     **/
    public static function checkUserPasskeyExist($userId)
    {
        $uuidWithoutHyphens = str_replace('-', '', $userId);
        $directoryPath = storage_path('app/public/passkey/' . $uuidWithoutHyphens); // Replace with the directory path you want to check

        if (is_dir($directoryPath)) {

            File::deleteDirectory($directoryPath);

            return true;
        }
        return false;
    }
}
