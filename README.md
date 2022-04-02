# PHP REST API template

A simple REST API template for PHP.

## Getting started

### Prerequisites

- PHP
- Apache (mod_rewrite)
- Composer

### Installation

Install composer dependencies.

```
composer install
```

## Usage

### Response

```php
$response = new \Core\Response();
$response->statusCode = \Core\HttpResponseStatusCodes::HTTP_OK;
$response->headers["Content-Type"] = "application/json";
$response->body = $body;
$response->send();
```
