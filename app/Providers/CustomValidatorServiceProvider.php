<?php


namespace App\Providers;


use App\Applications\CustomValidation\CustomValidator;
use Illuminate\Support\ServiceProvider;

class CustomValidatorServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
    }

    public function boot()
    {
        $this->app->validator->resolver(function($translator, $data, $rules, $messages)
        {
            return new CustomValidator($translator, $data, $rules, $messages);
        });
    }
}