<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Log;
use App\Models\UserHsmSignatures;
use App\Models\HsmsTools;
use App\Models\UserHsm;
use App\Models\User;
use Exception;

class HsmCloudHelper
{

    /*
    |--------------------------------------------------------------------------
    |  HSM Helper
    |--------------------------------------------------------------------------
    |
    | This helper is used for hsm cloud methods written in controllers.
    | This helper contain hsm cloud methods that used at various controllers.
    |
    */


    /**
     * Guzzle Api Call
     *
     * @return Array
     **/
    public static function guzzleApiCall($requestMethod, $url, $bodyData, $header)
    {
        try {
            $client = new \GuzzleHttp\Client();
            Log::info(json_encode($bodyData));

            $response = $client->request($requestMethod, $url, [
                'body' => json_encode($bodyData),
                'headers' => $header,
            ]);
            $result = json_decode($response->getBody(), true);
            Log::info($result);
            return $result;
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return ['status' => false];
        }
    }

    /**
     * Generate API Token
     *
     * @param  mixed $macId
     * @return void
     */
    public static function generateToken($macId)
    {
        $iv = bin2hex(openssl_random_pseudo_bytes(8));
        $encryptionKey = env('HARDWARE_TOKEN');
        $encrypt = openssl_encrypt($macId, 'aes-256-cbc', $encryptionKey, OPENSSL_RAW_DATA, $iv);

        return [
            'Content-Type' => 'application/json',
            'token' =>  bin2hex($encrypt),
            'publickey' => $iv
        ];
    }

    /**
     * Create User API Call
     * Cloud sends the userId and organizationId to the Device with its url
     * @return Array
     **/
    public static function createUser($userId)
    {
        $user = User::where('id', $userId)->first();
        $organizerId = $user->parentId ?? $userId;
        //ALREADY SIGNATURE GENERATED
        $alreadySignatureCreated = UserHsmSignatures::where(['userId' => $userId])->pluck('hsmId');
        $userHSMs = UserHsm::where('organizerId', $organizerId)->whereNotIn('hsmId', $alreadySignatureCreated)->get();
        foreach ($userHSMs as $userHSM) {
            $hsmDetails = HsmsTools::where('id', $userHSM->hsmId)->where('hsmStatus', 'Active')->first();
            if ($hsmDetails) {
                $url = $hsmDetails->tunnelUrl . '/user';
                //     $url = 'https://domain_testing.phpdevelopmentinindia.com/dc:a6:32:d1:a6:e3/user';
                $header = self::generateToken($hsmDetails->macId); //self::generateToken($userHSM->macId);
                $body = ["userId" => $userId, "organizerId" => $organizerId];
                $result = self::guzzleApiCall("POST", $url, $body, $header);

                if ($result['status']) {
                    UserHsmSignatures::create(['userId' => $userId, 'hsmId' => $userHSM->hsmId, 'signature' => $result['signature']]);
                }
            } else {
                return ['status' => false, 'message' => 'HSM Not connected'];
            }
        }
        return ['status' => true, 'message' => 'Store successfull'];
    }

    /**
     * This function use for create PASSWORD on Hsm
     *
     * @param  mixed $userId
     * @param  mixed $hsmId
     * @param  mixed $password
     * @return void
     */
    public static function createPassword($userId, $hsmId, $password)
    {

        $user = User::where('id', $userId)->first();
        $organizerId = $user->parentId ?? $userId;

        $getUserSignature = UserHsmSignatures::where(['userId' => $userId, 'hsmId' => $hsmId])->first();
        if ($getUserSignature) {
            $ciphertext = self::encryptPasswordCiphertext($password, $getUserSignature->signature);
            $hsmDetails = HsmsTools::where('id', $hsmId)->where('hsmStatus', 'Active')->first();
            if ($hsmDetails) {
                // $url = $hsmDetails->tunnelUrl.'/'.$hsmDetails->macId.'/password';
                $url = $hsmDetails->tunnelUrl . '/password'; //'https://flashx_demo_subdomain.phpdevelopmentinindia.com/password';
                $header = self::generateToken($hsmDetails->macId); //self::generateToken('dc:a6:32:d1:a6:e3');
                $body = ["userId" => $userId, "organizerId" => $organizerId, 'payload' => $ciphertext];
                $result = self::guzzleApiCall("POST", $url, $body, $header);
                return $result;
            }
        }
        return ['status' => false, 'message' => "HSM NOT CONNECTED"];
    }

    /**
     * This function use for generate password cipertext based on user signature
     *
     * @param  mixed $password
     * @param  mixed $getUserSignature
     * @return void
     */
    public static function encryptPasswordCiphertext($password, $getUserSignature)
    {
        $iv = env('PASSWORD_IV');
        $encrypt = openssl_encrypt($password, 'aes-256-cbc', $getUserSignature, OPENSSL_RAW_DATA, $iv);
        return bin2hex($encrypt);
    }


    /**
     * This function use for get password
     *
     * @param  mixed $userId
     * @param  mixed $hsmId
     * @param  mixed $passwordSignature
     * @return void
     */
    public static function getPassword($userId, $hsmId, $passwordSignature)
    {

        $user = User::where('id', $userId)->first();
        $organizerId = $user->parentId ?? $userId;

        $getUserSignature = UserHsmSignatures::where(['userId' => $userId, 'hsmId' => $hsmId])->first();
        if ($getUserSignature) {

            $hsmDetails = HsmsTools::where('id', $hsmId)->where('hsmStatus', 'Active')->first();
            if ($hsmDetails) {
                // $url = $hsmDetails->tunnelUrl.'/'.$hsmDetails->macId.'/get-password';
                $url = $hsmDetails->tunnelUrl . '/get-password'; //'https://flashx_demo_subdomain.phpdevelopmentinindia.com/get-password'; //$hsmDetails->tunnelUrl . '/dc:a6:32:d1:a6:e3/user';
                $header = self::generateToken($hsmDetails->macId); // self::generateToken('dc:a6:32:d1:a6:e3');
                $body = ["userId" => $userId, "organizerId" => $organizerId, 'passwordsignature' => $passwordSignature];
                $result = self::guzzleApiCall("GET", $url, $body, $header);
                if ($result['status']) {
                    $password = self::decryptPasswordCiphertext($result['payload'], $getUserSignature->signature);
                    return ['password' => $password, 'status' => true];
                }
            }
        }
        return ['password' => '', 'status' => false];
    }

    /**
     * This function use for generate password cipertext based on user signature
     *
     * @param  mixed $password
     * @param  mixed $getUserSignature
     * @return void
     */
    public static function decryptPasswordCiphertext($password, $getUserSignature)
    {
        $iv = env('PASSWORD_IV');
        return openssl_decrypt(hex2bin($password), 'aes-256-cbc', $getUserSignature, OPENSSL_RAW_DATA, $iv);
    }



    /**
     * This function use for Update PASSWORD on Hsm
     *
     * @param  mixed $userId
     * @param  mixed $hsmId
     * @param  mixed $password
     * @return void
     */
    public static function updatePassword($userId, $hsmId, $password, $passwordSignature)
    {

        $user = User::where('id', $userId)->first();
        $organizerId = $user->parentId ?? $userId;

        $getUserSignature = UserHsmSignatures::where(['userId' => $userId, 'hsmId' => $hsmId])->first();
        if ($getUserSignature) {
            $ciphertext = self::encryptPasswordCiphertext($password, $getUserSignature->signature);
            $hsmDetails = HsmsTools::where('id', $hsmId)->where('hsmStatus', 'Active')->first();
            if ($hsmDetails) {
                // $url = $hsmDetails->tunnelUrl.'/'.$hsmDetails->macId.'/update-password';
                $url = $hsmDetails->tunnelUrl . '/update-password'; //'https://flashx_demo_subdomain.phpdevelopmentinindia.com/update-password';
                $header = self::generateToken($hsmDetails->macId); //self::generateToken('dc:a6:32:d1:a6:e3');
                $body = ["userId" => $userId, "organizerId" => $organizerId, 'payload' => $ciphertext, 'passwordsignature' => $passwordSignature];
                $result = self::guzzleApiCall("POST", $url, $body, $header);
                return $result;
            }
        }
        return ['message' => 'HSM NOT CONNECTED', 'status' => false];
    }
}
