<?php

namespace Core\Helpers\RequestHelper;

final class Response
{
    private bool $error;
    private int $statusCode;
    private array $headers = [];
    private string $body;

    public function __construct(bool $error, int $statusCode, array $headers, string $body)
    {
        $this->error = $error;
        $this->statusCode = $statusCode;
        $this->headers = $headers;
        $this->body = $body;
    }

    public function getError(): bool
    {
        return $this->error;
    }

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    public function getHeader(string $name): ?string
    {
        $name = strtolower($name);
        return array_key_exists($name, $this->headers) ? $this->headers[$name] : null;
    }

    public function getBody(): string
    {
        return $this->body;
    }

    public function getDecodedJsonBody()
    {
        $data = @json_decode($this->body, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            return null;
        }
        return $data;
    }
}
