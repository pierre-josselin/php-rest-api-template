<?php

namespace Core;

class Autoloader
{
    public static function autoload(string $className): void
    {
        require(implode(DIRECTORY_SEPARATOR, array_merge([ROOT_DIRECTORY_PATH], explode("\\", $className))) . ".php");
    }
}
