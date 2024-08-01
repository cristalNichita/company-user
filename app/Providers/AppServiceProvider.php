<?php

namespace App\Providers;

use App\Models\User;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * RegisterRequest any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::withoutDoubleEncoding();
        Blade::directive('showLogo', function () {
            $user = Auth::user();
            if ($user->role == 'business') {
                $path = $user->businessLogo ?  Storage::disk("logo")->url("logo/" . $user->businessLogo) : asset("front-new/images/logo.webp");
                return  "<img src='$path'>";
            } else if ($user->parentId) {
                $user = User::where('id', $user->parentId)->first();
                $path = $user->businessLogo ?  Storage::disk("logo")->url("logo/" . $user->businessLogo) : asset("front-new/images/logo.webp");
                return  "<img src='$path'>";
            } else {
                $path = asset("front-new/images/logo.webp");
                return  "<img src='$path'>";
            }
        });
    }
}
