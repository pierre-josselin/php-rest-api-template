# PHP REST API template

A simple REST API template for PHP.

Follows many conventions such as object-oriented programming, model-~~view~~-controller structure, use of CRUD managers...

## Getting started

### Prerequisites

- PHP (curl) >= 7.4
- Apache (mod_rewrite)
- Composer

### Apache configuration

> The following commands are intended for Debian 10 and may have to be adapted if you are using a different operating system.

Create a new Apache configuration file:

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

Activate the site:

```
sudo a2ensite example.com
```

Restart Apache:

```
sudo service apache2 restart
```

### Installation

Clone the repository:

```
git clone https://github.com/pierre-josselin/php-rest-api-template.git
```

Rename and access the cloned repository:

```
mv php-rest-api-template example.com
cd example.com
```

Install composer dependencies:

```
composer install
```

Create a dotenv file:

```
cp .env.example .env
```

## Usage

### Environment variables

[vlucas/phpdotenv](https://github.com/vlucas/phpdotenv)

### Router

[bramus/router](https://github.com/bramus/router)

### Models

```php
namespace API\Models;

use Core\Model;

class User extends Model
{
    public string $firstName;
    public string $lastName;
}
```

### Controllers

```php
namespace API\Controllers;

use Core\API;
use Core\Controller;

class UserController extends Controller
{
    public function index(): void
    {
    }

    public function store(): void
    {
    }

    public function show(): void
    {
    }

    public function update(): void
    {
    }

    public function destroy(): void
    {
    }
}
```

### Managers

```php
namespace API\Managers;

use API\Models\User;
use Core\Manager;

class UserManager extends Manager
{
    public function create(User $user): bool
    {
    }

    public function read(string $id): User
    {
    }

    public function update(User $user): bool
    {
    }

    public function delete(User $user): bool
    {
    }
}
```

### Response

```php
API::response()->setStatusCode(\Core\HttpResponseStatusCodes::HTTP_OK);
API::response()->setHeader("Content-Type", "application/json");
API::response()->setJsonBody(["hello" => "world"]);
API::response()->send();
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
