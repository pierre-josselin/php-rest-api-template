<?php

namespace Core;

final class Response
{
    private int $statusCode;
    private array $headers = [];
    private string $body;

    public function __destruct()
    {
        foreach ($this->headers as $name => $value) {
            header("{$name}: {$value}");
        }
        if (isset($this->statusCode)) {
            http_response_code($this->statusCode);
        }
        if (isset($this->body)) {
            echo ($this->body);
        }
    }

    public function setStatusCode(int $statusCode): void
    {
        $this->statusCode = $statusCode;
    }

    public function setHeader(string $name, string $value): void
    {
        $this->headers[strtolower($name)] = $value;
    }

    public function setBody($body): void
    {
        $this->body = $body;
    }

    public function setJsonBody($data): void
    {
        $this->body = json_encode($data);
    }

    public function send(): void
    {
        exit;
    }
}
