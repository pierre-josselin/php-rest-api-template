<?php

namespace Core;

class Response
{
    public int $statusCode;
    public array $headers = [];
    public string $body;

    public function addHeader(string $name, string $value)
    {
        $this->headers[strtolower($name)][] = $value;
    }

    public function setJsonBody($data)
    {
        $this->body = json_encode($data);
    }

    public function send()
    {
        foreach ($this->headers as $name => $values) {
            foreach ($values as $value) {
                header("{$name}: {$value}", false);
            }
        }
        if (isset($this->statusCode)) {
            http_response_code($this->statusCode);
        }
        if (isset($this->body)) {
            echo ($this->body);
        }
        exit;
    }
}
