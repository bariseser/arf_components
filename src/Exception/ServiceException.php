<?php

namespace ArfLabsOu\Components\Exception;

class ServiceException extends \Exception
{
    private array $requestData;

    private mixed $responseData;

    /**
     * @param $message
     * @param array $requestData
     * @param mixed $responseData
     * @param int $code
     * @param \Exception|null $previous
     */
    public function __construct($message, array $requestData = [], $responseData = null, int $code = 0, ?\Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->requestData = $requestData;
        $this->responseData = $responseData;
    }

    /**
     * @return array
     */
    public function getRequestData(): array
    {
        return $this->requestData ?? [];
    }

    /**
     * @return mixed
     */
    public function getResponseData()
    {
        return $this->responseData ?? null;
    }

    /**
     * @return string
     */
    public function getCustomMessage(): string
    {
        return sprintf("%s - File: %s - Line: %s", $this->getMessage(), $this->getFile(), $this->getLine());
    }
}