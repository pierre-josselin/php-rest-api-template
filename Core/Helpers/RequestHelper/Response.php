<?php

namespace Core\Helpers\RequestHelper;

class Response
{
    public bool $error;
    public int $statusCode;
    public array $headers = [];
    public string $body;

    public function getDecodedJsonBody()
    {
        $array = @json_decode($this->body, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            return null;
        }
        return $array;
    }
}
