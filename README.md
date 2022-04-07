# PHP REST API template

A simple REST API template for PHP.

## Getting started

### Prerequisites

- PHP (curl) >= 7.4
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

### Environment variables

[PHP Dotenv](https://github.com/vlucas/phpdotenv)

### Response

```php
$response = new \Core\Response();
$response->statusCode = \Core\HttpResponseStatusCodes::HTTP_OK;
$response->addHeader("Content-Type", "application/json");
$response->setJsonBody(["hello" => "world"]);
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

### Model

```php
namespace API\Models;

class User extends \Core\Model {
    public string $firstName;
    public string $lastName;
}
```

### Controller

```php
namespace API\Controllers;

class UserManager extends \Core\Controller {
    public function index() {
    }
    public function store() {
    }
    public function show() {
    }
    public function update() {
    }
    public function destroy() {
    }
}
```
