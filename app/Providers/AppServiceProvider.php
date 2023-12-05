<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;

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
        Schema::defaultStringLength(191);

        // Configura mensajes de error personalizados en español
        Validator::extendImplicit('custom_required', function ($attribute, $value, $parameters, $validator) {
            return !empty($value);
        });

        Validator::replacer('custom_required', function ($message, $attribute, $rule, $parameters) {
            return str_replace(':attribute', $attribute, 'El campo :attribute es obligatorio.');
        });
    }
}
