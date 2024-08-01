<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Helpers\WebAuthnHelper;
use Illuminate\Http\Request;
use App\Models\User;
use Exception;

class WebAuthnController extends Controller
{
    /**
     *   Index Web Authn
     **/
    public function index()
    {
        return view('web-authn');
    }

    /**
     *  RegisterRequest Web Authn
     **/
    public function webregister()
    {
        $userData = Auth::user();
        $initData =  WebAuthnHelper::init($userData);

        $trimmedDirectoryPath = dirname($initData['saveto']);

        if (is_dir($trimmedDirectoryPath)) {
            // Get a list of all files in the directory using scandir
            $files = scandir($trimmedDirectoryPath);

            foreach ($files as $file) {
                if ($file != '.' && $file != '..') {
                    $filePath = $trimmedDirectoryPath . '/' . $file;

                    if (file_exists($filePath)) {
                        exit("User already registered");
                    }
                }
            }
        }

        switch ($_POST["phase"]) {
                // (B) REGISTRATION PART 1 - GET ARGUMENTS
            case "a":
                $args = $initData['WebAuthn']->getCreateArgs(
                    \hex2bin($initData['user']["id"]),
                    $initData['user']["name"],
                    $initData['user']["display"],
                    30,
                    false,
                    true,
                    true
                );
                $_SESSION["challenge"] = ($initData['WebAuthn']->getChallenge())->getBinaryString();
                echo json_encode($args);
                break;

                // (C) REGISTRATION PART 2 - SAVE USER CREDENTIAL
                // should be saved in database, but we save into a file instead
            case "b":
                // (C1) VALIDATE & PROCESS
                try {
                    $data = $initData['WebAuthn']->processCreate(
                        base64_decode($_POST["client"]),
                        base64_decode($_POST["attest"]),
                        $_SESSION["challenge"],
                        true,
                        true,
                        false
                    );
                } catch (Exception $ex) {
                    print_r($ex);
                    exit;
                }


                // Create the dynamic directory if it doesn't exist
                if (!is_dir(dirname($initData['saveto']))) {
                    mkdir(dirname($initData['saveto']), 0777, true);
                }

                // (C2) SAVE
                file_put_contents($initData['saveto'], serialize($data));

                echo "Passkey has been registered successfully.";
                break;
        }
    }


    /**
     *   Validate Web Authn
     **/
    public function webauthnvalid(Request $request)
    {
        // (A) INIT & CHECK
        $userData =  Auth::user() ?? User::where('id', $request->id)->first();
        $initData =  WebAuthnHelper::init($userData);

        $trimmedDirectoryPath = dirname($initData['saveto']);

        if (is_dir($trimmedDirectoryPath)) {
            // Get a list of all files in the directory using scandir
            $files = scandir($trimmedDirectoryPath);

            foreach ($files as $file) {
                if ($file != '.' && $file != '..') {
                    $filePath = $trimmedDirectoryPath . '/' . $file;

                    if (file_exists($filePath)) {
                        $saved = unserialize(file_get_contents($filePath));
                    } else {
                        exit("User is not registered");
                    }
                }
            }
        } else {
            exit("User is not registered");
        }

        switch ($_POST["phase"]) {
                // (B) VALIDATION PART 1 - GET ARGUMENTS
            case "a":
                $args = $initData['WebAuthn']->getGetArgs([$saved->credentialId], 30);
                $_SESSION["challenge"] = ($initData['WebAuthn']->getChallenge())->getBinaryString();
                echo json_encode($args);
                break;

                // (C) VALIDATION PART 2 - CHECKS & PROCESS
            case "b":
                $id = base64_decode($_POST["id"]);
                if ($saved->credentialId !== $id) {
                    exit("Invalid credentials");
                }
                try {
                    $initData['WebAuthn']->processGet(
                        base64_decode($_POST["client"]),
                        base64_decode($_POST["auth"]),
                        base64_decode($_POST["sig"]),
                        $saved->credentialPublicKey,
                        $_SESSION["challenge"]
                    );
                    echo "Passkey has been verified successfully.";
                    // DO WHATEVER IS REQUIRED AFTER VALIDATION
                } catch (Exception $ex) {
                    print_r($ex);
                    exit;
                }
                break;
        }
    }


    /**
     *   Validate Web Authn
     **/
    public function passkeyValidate(Request $request)
    {
        // (A) INIT & CHECK
        $userData =  Auth::user() ?? User::where('id', $request->id)->first();
        $initData =  WebAuthnHelper::init($userData);

        $trimmedDirectoryPath = dirname($initData['saveto']);

        if (is_dir($trimmedDirectoryPath)) {
            // Get a list of all files in the directory using scandir
            $files = scandir($trimmedDirectoryPath);

            foreach ($files as $file) {
                if ($file != '.' && $file != '..') {
                    $filePath = $trimmedDirectoryPath . '/' . $file;

                    if (file_exists($filePath)) {
                        $saved = unserialize(file_get_contents($filePath));
                    } else {
                        return $this->toJson([], 'User is not registered', 0);
                    }
                }
            }
        } else {
            return $this->toJson([], 'User is not registered', 0);
        }


        switch ($_POST["phase"]) {
                // (B) VALIDATION PART 1 - GET ARGUMENTS
            case "a":
                $args = $initData['WebAuthn']->getGetArgs([$saved->credentialId], 30);
                $_SESSION["challenge"] = ($initData['WebAuthn']->getChallenge())->getBinaryString();
                //echo json_encode($args);
                return $this->toJson($args, 'Success', 1);
                break;

                // (C) VALIDATION PART 2 - CHECKS & PROCESS
            case "b":
                $id = base64_decode($_POST["id"]);
                if ($saved->credentialId !== $id) {
                    return $this->toJson([], 'Invalid credentials', 0);
                    exit("Invalid credentials");
                }
                try {
                    $initData['WebAuthn']->processGet(
                        base64_decode($_POST["client"]),
                        base64_decode($_POST["auth"]),
                        base64_decode($_POST["sig"]),
                        $saved->credentialPublicKey,
                        $_SESSION["challenge"]
                    );
                    return $this->toJson([], 'Passkey has been verified successfully', 1);

                    echo "Passkey has been verified successfully.";
                    // DO WHATEVER IS REQUIRED AFTER VALIDATION
                } catch (Exception $ex) {
                    return $this->toJson([], $ex->getMessage(), 0);
                    print_r($ex);
                    exit;
                }
                break;
        }
        return $this->toJson([], 'fail', 0);
    }
}
