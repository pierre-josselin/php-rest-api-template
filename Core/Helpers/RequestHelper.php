<?php

namespace Core\Helpers;

final class RequestHelper
{
    private string $method;
    private string $url;
    private array $urlQuery = [];
    private array $headers = [];
    private string $body;
    private bool $followRedirections;
    private int $timeout;

    public function setMethod(string $method): void
    {
        $this->method = strtoupper($method);
    }

    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    public function setUrlQueryParameter(string $name, $value): void
    {
        $this->urlQuery[$name] = $value;
    }

    public function setHeader(string $name, string $value)
    {
        $this->headers[strtolower($name)] = $value;
    }

    public function setBody(string $body): void
    {
        $this->body = $body;
    }

    public function setJsonBody($data): void
    {
        $this->body = json_encode($data);
    }

    public function setFollowRedirections(bool $followRedirections): void
    {
        $this->followRedirections = $followRedirections;
    }

    public function setTimeout(int $timeout): void
    {
        $this->timeout = $timeout;
    }

    public function send(): RequestHelper\Response
    {
        $ch = curl_init();
        if (isset($this->method)) {
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $this->method);
        }
        if (isset($this->url)) {
            $url = $this->url;
            if ($this->urlQuery) {
                $urlQuery = [];
                $urlQueryString = parse_url($url, PHP_URL_QUERY);
                if (!is_null($urlQueryString)) {
                    parse_str($urlQueryString, $urlQuery);
                }
                $urlQuery = array_merge($urlQuery, $this->urlQuery);
                $url = strtok($url, "?") . "?" . http_build_query($urlQuery);
            }
            curl_setopt($ch, CURLOPT_URL, $url);
        }
        if ($this->headers) {
            $headers = [];
            foreach ($this->headers as $name => $value) {
                $headers[] = "{$name}: {$value}";
            }
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        }
        if (isset($this->body)) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, $this->body);
        }
        if (isset($this->followRedirections)) {
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, $this->followRedirections);
        }
        if (isset($this->timeout)) {
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $this->timeout);
        }
        curl_setopt($ch, CURLOPT_FAILONERROR, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt(
            $ch,
            CURLOPT_HEADERFUNCTION,
            function ($curl, $header) use (&$headers) {
                $headerParts = explode(":", $header, 2);
                if (count($headerParts) === 2) {
                    $headers[strtolower(trim($headerParts[0]))] = trim($headerParts[1]);
                }
                return strlen($header);
            }
        );

        $headers = [];
        $body = curl_exec($ch);
        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $error = $statusCode == 0 || $statusCode >= 400;
        return new RequestHelper\Response($error, $statusCode, $headers, $body);
    }
}
