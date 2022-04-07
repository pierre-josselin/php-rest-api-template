<?php
error_reporting(E_ALL & ~E_NOTICE);
ini_set("display_errors", 0);

define("ROOT_DIRECTORY_PATH", dirname(realpath(__DIR__)));

require(implode(DIRECTORY_SEPARATOR, [ROOT_DIRECTORY_PATH, "vendor", "autoload.php"]));

require(implode(DIRECTORY_SEPARATOR, [ROOT_DIRECTORY_PATH, "Core", "Autoloader.php"]));

spl_autoload_register([Core\Autoloader::class, "autoload"]);

$dotenv = Dotenv\Dotenv::createImmutable(ROOT_DIRECTORY_PATH);
$dotenv->load();
$dotenv->required("DEBUG")->isBoolean();

ini_set("display_errors", intval(filter_var($_ENV["DEBUG"], FILTER_VALIDATE_BOOLEAN)));

date_default_timezone_set("UTC");

$router = new Bramus\Router\Router();
$router->setNamespace("\\API\\Controllers");
require(ROOT_DIRECTORY_PATH . DIRECTORY_SEPARATOR . "routes.php");
$router->run();
