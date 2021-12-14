<?php

namespace ArfLabsOu\Components;

use ArfLabsOu\Components\Helper\ArfHelperf;
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
        $this->bind(IHttpClient::class, function ($app) {
            $guzzleClient = new Client(['timeout' => 20]);
            return new HttpClient($guzzleClient);
        });

        $this->bind('arf_helper', function () {
            return new ArfHelper();
        });
    }

}