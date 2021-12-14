<?php

namespace ArfLabsOu\Components\HttpClient;

use ArfLabsOu\Components\Exception\ServiceException;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use Psr\Http\Message\ResponseInterface;

class HttpClient implements IHttpClient
{
    /**
     * @var Client
     */
    private Client $client;

    /**
     * Client constructor.
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param string $url
     * @param array $options
     * @return ResponseInterface
     * @throws ServiceException
     */
    public function get($url, array $options = []): ResponseInterface
    {
        try {
            return $this->client->get($url, $options);
        } catch (RequestException $requestException) {
            if ($requestException->hasResponse()) {
                $payload = $requestException->getResponse();
                throw new ServiceException($requestException->getMessage(), $options, $payload->getBody()->getContents(), $requestException->getCode(), $requestException);
            } else {
                throw new ServiceException($requestException->getMessage(), $options, null, $requestException->getCode(), $requestException);
            }
        } catch (ConnectException $connectException) {
            throw new ServiceException($connectException->getMessage(), $options, null, $connectException->getCode(), $connectException);
        } catch (Exception $exception) {
            throw new ServiceException($exception->getMessage(), $options, null, $exception->getCode(), $exception);
        }
    }

    /**
     * @param string $url
     * @param array $options
     * @return ResponseInterface
     * @throws ServiceException
     */
    public function post($url, array $options = []): ResponseInterface
    {
        try {
            return $this->client->post($url, $options);
        } catch (RequestException $requestException) {
            if ($requestException->hasResponse()) {
                $payload = $requestException->getResponse();
                throw new ServiceException($requestException->getMessage(), $options, $payload->getBody()->getContents(), $requestException->getCode(), $requestException);
            } else {
                throw new ServiceException($requestException->getMessage(), $options, null, $requestException->getCode(), $requestException);
            }
        } catch (ConnectException $connectException) {
            throw new ServiceException($connectException->getMessage(), $options, null, $connectException->getCode(), $connectException);
        } catch (Exception $exception) {
            throw new ServiceException($exception->getMessage(), $options, null, $exception->getCode(), $exception);
        }
    }

    /**
     * @param string $url
     * @param array $options
     * @return ResponseInterface
     * @throws ServiceException
     */
    public function delete($url, array $options = []): ResponseInterface
    {
        try {
            return $this->client->delete($url, $options);
        } catch (RequestException $requestException) {
            if ($requestException->hasResponse()) {
                $payload = $requestException->getResponse();
                throw new ServiceException($requestException->getMessage(), $options, $payload->getBody()->getContents(), $requestException->getCode(), $requestException);
            } else {
                throw new ServiceException($requestException->getMessage(), $options, null, $requestException->getCode(), $requestException);
            }
        } catch (ConnectException $connectException) {
            throw new ServiceException($connectException->getMessage(), $options, null, $connectException->getCode(), $connectException);
        } catch (Exception $exception) {
            throw new ServiceException($exception->getMessage(), $options, null, $exception->getCode(), $exception);
        }
    }
}
