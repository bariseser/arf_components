<?php

namespace ArfLabsOu\Components\HttpClient;

use Exception;

abstract class AbstractHttpClient
{
    /** @var IHttpClient */
    protected IHttpClient $httpClient;

    /**
     * @var string
     */
    public string $assetType;

    /**
     * query parameters
     *
     * @var array
     */
    public array $queryParameters = [];

    /**
     * post parameters
     *
     * @var array
     */
    public array $postParameters = [];

    /**
     * @var array
     */
    public array $headers = [];

    /**
     * AbstractHttpClient constructor.
     * @param IHttpClient $httpClient
     */
    public function __construct(IHttpClient $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    /**
     * @return string
     */
    abstract protected function buildUrl(): string;

    /**
     * @return string
     */
    protected function getAssetType(): string
    {
        return $this->assetType;
    }

    /**
     * @param string $assetType
     */
    public function setAssetType(string $assetType): void
    {
        $this->assetType = $assetType;
    }

    /**
     * @param $url
     * @param string $method
     * @return mixed
     * @throws Exception
     */
    abstract protected function fetch($url, string $method = "get");

    /**
     * Prepare query parameters for request
     *
     * @return string
     */
    protected function prepareQueryParameters(): string
    {
        $parameters = $this->getQueryParameters();
        ksort($parameters);

        $parts = [];
        foreach ($parameters as $name => $value) {
            $parts[] = http_build_query([$name => $value]);
        }

        return implode('&', $parts);
    }

    /**
     * @return array
     */
    public function getQueryParameters(): array
    {
        return $this->queryParameters;
    }

    /**
     * @param $key
     * @param $value
     */
    public function setQueryParameters($key, $value): void
    {
        $this->queryParameters[$key] = $value;
    }

    /**
     * @return array
     */
    public function getParams(): array
    {
        return $this->postParameters;
    }

    /**
     * @param $key
     * @param $value
     */
    public function setPostParams($key, $value): void
    {
        $this->postParameters[$key] = $value;
    }

    /**
     * @return array
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    /**
     * @param $key
     * @param $value
     */
    public function setHeaders($key, $value): void
    {
        $this->headers[$key] = $value;
    }
}
