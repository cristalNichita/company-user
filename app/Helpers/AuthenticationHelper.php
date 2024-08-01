<?php

namespace App\Helpers;

use App\Models\User;
use Aws\Rekognition\RekognitionClient;
use Exception;
use PragmaRX\Google2FALaravel\Google2FA;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AuthenticationHelper
{
    public static function authenticationProcess($user): array
    {
        $google2fa = app(Google2FA::class);

        $registration_data = $user;
        $registration_data["google2fa_secret"] = !empty($user->google2fa_secret) ? $user->google2fa_secret : $google2fa->generateSecretKey(16);

        session()->put('registration_data', $registration_data);

        $QR_Image = $google2fa->getQRCodeInline(
            env('APP_NAME'),
            $registration_data['email'],
            $registration_data['google2fa_secret']
        );

        $secret = $registration_data['google2fa_secret'];

        $returnArray = [
            'QR_Image' => $QR_Image,
            'secret' => $secret
        ];

        return $returnArray;
    }

    public static function verifyAuthentication($request): bool
    {
        $user = Auth::user();

        $google2fa = app(Google2FA::class);
        //$google2fa = app('pragmarx.google2fa');
        $secretKey = session('registration_data')->google2fa_secret;
        if ($google2fa->verifyGoogle2FA($secretKey, $request->one_time_password)) {
            $user->update([
                'google2fa_secret' => $secretKey,
            ]);
            // OTP is valid, you can proceed with the desired action
            return true;
        } else {
            // Invalid OTP, redirect back with an error message
            return false;
        }
    }

    public static function validateAuthentication($otp, $userId = null): bool
    {
        $user = Auth::user();

        if (empty($user)) {
            $user = User::where('id',$userId)->first();
        }

        $google2fa = app(Google2FA::class);
        //$google2fa = app('pragmarx.google2fa');
        $secretKey = $user->google2fa_secret;
        if ($google2fa->verifyGoogle2FA($secretKey, $otp)) {
            // OTP is valid, you can proceed with the desired action
            return true;
        } else {
            // Invalid OTP, redirect back with an error message
            return false;
        }
    }

    public static function faceVerify($request): array
    {
        try {
            $user = Auth::user();

            if (empty($user->face_id_image) || $user->face_id_image == null) {
                return ['status' => false, 'message' => 'Please register your face first!'];
            }
            $imageData = $request->input('image');
            $imageData = str_replace('data:image/jpeg;base64,', '', $imageData);
            $imageName = time() . '.jpeg';
            Storage::disk('s3')->put('validate/' . $imageName, base64_decode($imageData));

            $rekognition = new RekognitionClient([
                'version' => 'latest',
                'region'  => env('AWS_DEFAULT_REGION'),
                'credentials' => [
                    'key'    => env('AWS_ACCESS_KEY_ID'),
                    'secret' => env('AWS_SECRET_ACCESS_KEY'),
                ],
            ]);

            $result = $rekognition->compareFaces([
                'SourceImage' => [
                    'S3Object' => [
                        'Bucket' => 'flashx',
                        'Name'   => "profiles/$user->face_id_image",
                    ],
                ],
                'TargetImage' => [
                    'S3Object' => [
                        'Bucket' => 'flashx',
                        'Name'   => "validate/$imageName",
                    ],
                ],
                'ImageAttributes' => 'ALL'
            ]);
            $faceMatches = $result['FaceMatches'];

            if (!empty($faceMatches)) {
                foreach ($faceMatches as $faceMatch) {
                    $similarity = $faceMatch['Similarity'];
                    if ($similarity >= 80) {
                        return ['status' => true , 'message' => 'Face has been validate successfully.'];
                        // return $this->toJson([], "Face has been validate successfully.", 1);
                    }
                }
            }
            return ['status' => false , 'message' => 'No matching faces found.'];
            // return $this->toJson([], "No matching faces found.", 0);
        } catch (Exception $e) {
            return ['status' => false , 'message' => 'No matching faces found.'];
            // return $this->toJson([], "No matching faces found.", 0);
        }
    }

}
