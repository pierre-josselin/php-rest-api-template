<?php

use Core\API;

error_reporting(E_ALL & ~E_NOTICE);
ini_set("display_errors", 0);

define("ROOT_DIRECTORY_PATH", dirname(realpath(__DIR__)));

require(implode(DIRECTORY_SEPARATOR, [ROOT_DIRECTORY_PATH, "vendor", "autoload.php"]));

require(implode(DIRECTORY_SEPARATOR, [ROOT_DIRECTORY_PATH, "Core", "Autoloader.php"]));

spl_autoload_register([Core\Autoloader::class, "autoload"]);

$dotenv = Dotenv\Dotenv::createImmutable(ROOT_DIRECTORY_PATH);
$dotenv->load();
$dotenv->required("ENVIRONMENT")->allowedValues(["development", "production"]);
$dotenv->required("SHOW_ERRORS")->isBoolean();

define("ENVIRONMENT", $_ENV["ENVIRONMENT"]);
define("DEVELOPMENT", ENVIRONMENT === "development");
define("PRODUCTION", ENVIRONMENT === "production");

ini_set("display_errors", intval(filter_var($_ENV["SHOW_ERRORS"], FILTER_VALIDATE_BOOLEAN)));

date_default_timezone_set("UTC");

API::init();

API::router()->setNamespace("\\API");
require(implode(DIRECTORY_SEPARATOR, [ROOT_DIRECTORY_PATH, "routes", "api.php"]));

$pattern = implode(DIRECTORY_SEPARATOR, [ROOT_DIRECTORY_PATH, "init", "*.php"]);
$files = glob($pattern);

foreach ($files as $file) {
    require($file);
}

API::router()->run();
