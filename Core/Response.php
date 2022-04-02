<?php
namespace Core;

class Response {
    public int $statusCode;
    public array $headers = [];
    public string $body;

    public function send() {
        foreach($this->headers as $name => $value) {
            header("{$name}: {$value}");
        }
        if(isset($this->statusCode)) {
            http_response_code($this->statusCode);
        }
        if(isset($this->body)) {
            echo($this->body);
        }
        exit;
    }
}
