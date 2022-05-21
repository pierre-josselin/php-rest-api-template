# PHP REST API template

A simple REST API template for PHP.

## Getting started

### Prerequisites

- PHP (curl) >= 7.4
- Apache (mod_rewrite)
- Composer

### Apache configuration

> The following commands are intended for Debian 10 and may have to be adapted if you are using a different operating system.

Create a new Apache configuration file

/etc/apache2/sites-available/example.com.conf

```
<VirtualHost *:80>
    ServerName example.com
    ServerAdmin admin@example.com
    DocumentRoot /var/www/example.com/public
    ErrorLog /var/www/example.com/logs/error.log
    CustomLog /var/www/example.com/logs/access.log combined
</VirtualHost>
<Directory /var/www/example.com/public>
    AllowOverride All
</Directory>
```

Activate the site

```
sudo a2ensite example.com
```

Restart Apache

```
sudo service apache2 restart
```

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
API::response()->setStatusCode(\Core\HttpResponseStatusCodes::HTTP_OK);
API::response()->setHeader("Content-Type", "application/json");
API::response()->setJsonBody(["hello" => "world"]);
API::response()->send();
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
