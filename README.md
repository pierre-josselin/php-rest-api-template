# PHP REST API template

A simple REST API template for PHP.

## Getting started

### Prerequisites

- PHP (curl)
- Apache (mod_rewrite)
- Composer

### Installation

Install composer dependencies.

```
composer install
```

## Usage

### Router

[bramus/router](https://github.com/bramus/router)

### Response

```php
$response = new \Core\Response();
$response->statusCode = \Core\HttpResponseStatusCodes::HTTP_OK;
$response->headers["Content-Type"] = "application/json";
$response->body = $json;
$response->send();
```

### Request

```php
$request = new \Core\Request();
$request->url = "http://example.com";
$request->method = "GET";
$response = $request->send();
echo $response->body;
```
