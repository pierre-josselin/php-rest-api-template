<?php
namespace Core;

class Autoloader {
    public static function autoload(string $className) {
        require(ROOT_DIRECTORY_PATH . DIRECTORY_SEPARATOR . str_replace("\\", DIRECTORY_SEPARATOR, $className) . ".php");
    }
}
