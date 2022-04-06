<?php
namespace Core;

class Request {
    public string $url;
    public string $method;
    public array $headers = [];
    public string $body;
    public bool $followRedirection;
    public int $timeout;

    public function addHeader(string $name, string $value) {
        $this->headers[] = [$name, $value];
    }

    public function send() {
        $ch = curl_init();
        if(isset($this->url)) {
            curl_setopt($ch, CURLOPT_URL, $this->url);
        }
        if(isset($this->method)) {
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $this->method);
        }
        if($this->headers) {
            $headers = [];
            foreach($this->headers as $header) {
                $headers[] = "{$header[0]}: {$header[1]}";
            }
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        }
        if(isset($this->body)) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, $this->body);
        }
        if(isset($this->followRedirection)) {
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, $this->followRedirection);
        }
        if(isset($this->timeout)) {
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $this->timeout);
        }
        curl_setopt($ch, CURLOPT_FAILONERROR, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADERFUNCTION,
            function($curl, $header) use (&$headers) {
                $headerParts = explode(":", $header, 2);
                if(count($headerParts) === 2) {
                    $headers[trim($headerParts[0])][] = trim($headerParts[1]);
                }
                return strlen($header);
            }
        );

        $headers = [];
        $response = new Request\Response();
        $response->body = curl_exec($ch);
        $response->statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $response->error = $response->statusCode >= 400;
        $response->headers = $headers;
        return $response;
    }
}
