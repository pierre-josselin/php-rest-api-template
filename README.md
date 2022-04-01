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
$response->setHttpResponseCode(200);
$response->setHeader("Content-Type", "application/json");
$response->setBody($body);
$response->send();
```