<?php

namespace Core;

class Request
{
    public string $path;
    public string $method;
    public array $query = [];
    public array $headers = [];
    public string $body;

    public function __construct()
    {
        $this->path = strtok($_SERVER["REQUEST_URI"], "?");
        $this->method = $_SERVER["REQUEST_METHOD"];
        $this->body = file_get_contents("php://input");

        if ($_SERVER["QUERY_STRING"]) {
            parse_str($_SERVER["QUERY_STRING"], $this->query);
        }

        $headers = getallheaders();
        if ($headers) {
            foreach ($headers as $name => $value) {
                $this->headers[strtolower($name)] = $value;
            }
        }
    }

    public function getDecodedQueryStringBody()
    {
        $array = null;
        parse_str($this->body, $array);
        return $array;
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
