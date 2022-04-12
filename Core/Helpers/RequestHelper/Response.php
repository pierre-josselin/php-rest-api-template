<?php

namespace Core\Helpers\RequestHelper;

class Response
{
    public bool $error;
    public int $statusCode;
    public array $headers = [];
    public string $body;

    public function getHeader(string $name, bool $firstElement = true)
    {
        $name = strtolower($name);
        if (!array_key_exists($name, $this->headers)) {
            return null;
        }
        if ($firstElement) {
            return $this->headers[$name][0];
        } else {
            return $this->headers[$name];
        }
    }

    public function getDecodedJsonBody()
    {
        $array = @json_decode($this->body, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            return null;
        }
        return $array;
    }
}
