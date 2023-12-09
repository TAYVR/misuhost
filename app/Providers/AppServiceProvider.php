<?php

namespace App\Providers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Validator::extend('square_image', function($attribute, $photo, $parameters){
            list($width, $height) = getimagesize($photo);
            return ($width == $height);
    });
    Validator::replacer('square_image', function($message, $attribute, $rule, $parameters) {
        return str_replace(':attribute', $attribute, 'The :attribute must be a square image.');
    });

    }
}
