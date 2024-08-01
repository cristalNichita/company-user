<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use lbuchs\WebAuthn\WebAuthn;

class WebAuthnServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(WebAuthn::class, function ($app) {
            $rpName = 'FlashX';
            $rpId = 'flashx.com';
            $server = 'https://flashx.com';
            $androidSafetyNetApiKey = null; // Если нужно, добавьте API-ключ

            return new WebAuthn($rpName, $rpId, $server, $androidSafetyNetApiKey);
        });
    }
}
