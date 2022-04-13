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
$response->setStatusCode(\Core\HttpResponseStatusCodes::HTTP_OK);
$response->setHeader("Content-Type", "application/json");
$response->setJsonBody(["hello" => "world"]);
$response->send();
```

### Model

```php
namespace API\Models;

class User
{
    private string $firstName;
    private string $lastName;
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
$requestHelper = new \Core\Helpers\RequestHelper();
$requestHelper->setUrl("http://example.com");
$requestHelper->setMethod("GET");
$response = $requestHelper->send();
echo $response->getBody();
```
