# PHP REST API template

A simple REST API template for PHP.

## Getting started

### Prerequisites

- PHP (curl) >= 7.4
- Apache (mod_rewrite)
- Composer

### Installation

Clone the repository.

```
git clone https://github.com/pierre-josselin/php-rest-api-template.git
```

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

### Model

```php
namespace API\Models;

class User
{
    public string $firstName;
    public string $lastName;
}
```

### Controller

```php
namespace API\Controllers;

class UserController
{
    public function index()
    {
    }

    public function store()
    {
    }

    public function show()
    {
    }

    public function update()
    {
    }

    public function destroy()
    {
    }
}
```

### Helpers

#### Request

```php
$request = new \Core\Helpers\RequestHelper();
$request->url = "http://example.com";
$request->method = "GET";
$response = $request->send();
echo $response->body;
```
