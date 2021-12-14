<?php

namespace ArfLabsOu\Components;

use ArfLabsOu\Components\Helper\ArfHelper;
use ArfLabsOu\Components\HttpClient\HttpClient;
use ArfLabsOu\Components\HttpClient\IHttpClient;
use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;

class ArfServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/arf_component.php' => config_path('arf_component.php')
        ]);
    }

    public function register()
    {
        $this->app->bind(IHttpClient::class, function ($app) {
            $guzzleClient = new Client(['timeout' => 20]);
            return new HttpClient($guzzleClient);
        });

        $this->app->singleton('arf_helper', function () {
            return new ArfHelper();
        });
    }

}