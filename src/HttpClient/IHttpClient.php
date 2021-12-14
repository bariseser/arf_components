<?php

namespace ArfLabsOu\Components\HttpClient;

use Psr\Http\Message\ResponseInterface;

interface IHttpClient
{
    public function get($url, array $options = []): ResponseInterface;

    public function post($url, array $options = []): ResponseInterface;

    public function delete($url, array $options = []): ResponseInterface;
}
