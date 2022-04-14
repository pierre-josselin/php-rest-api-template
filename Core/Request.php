<?php

namespace Core;

final class Request
{
    private string $method;
    private string $path;
    private array $urlQuery = [];
    private array $headers = [];
    private string $body;

    public function __construct()
    {
        $this->method = strtoupper($_SERVER["REQUEST_METHOD"]);
        $this->path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
        $this->body = file_get_contents("php://input");

        parse_str($_SERVER["QUERY_STRING"], $this->urlQuery);

        $headers = getallheaders();
        if ($headers) {
            foreach ($headers as $name => $value) {
                $this->headers[strtolower($name)] = $value;
            }
        }
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function getUrlQueryParameter(string $name)
    {
        return array_key_exists($name, $this->urlQuery) ? $this->urlQuery[$name] : null;
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
