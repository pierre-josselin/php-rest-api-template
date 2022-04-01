<?php
namespace Core;

class Response {
    private $statusCode;
    private $headers = [];
    private $body;

    public function getStatusCode() {
        return $this->statusCode;
    }
    public function getHeaders() {
        return $this->headers;
    }
    public function getBody() {
        return $this->body;
    }

    public function setStatusCode(int $statusCode) {
        $this->statusCode = $statusCode;
    }
    public function setHeaders(array $headers) {
        $this->headers = $headers;
    }
    public function setBody($body) {
        $this->body = $body;
    }

    public function setHeader(string $name, string $value) {
        $headers = $this->getHeaders();
        $headers[$name] = $value;
        $this->setHeaders($headers);
    }

    public function send() {
        foreach($this->getHeaders() as $name => $value) {
            header("{$name}: {$value}");
        }
        http_response_code($this->getStatusCode());
        echo($this->getBody());
        exit;
    }
}
