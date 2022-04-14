<?php

final class API
{
    private static Bramus\Router\Router $router;
    private static Core\Request $request;
    private static Core\Response $response;

    private function __construct()
    {
    }

    public static function init(): void
    {
        self::$router = new Bramus\Router\Router();
        self::$request = new Core\Request();
        self::$response = new Core\Response();
    }

    public static function router(): Bramus\Router\Router
    {
        return self::$router;
    }

    public static function request(): Core\Request
    {
        return self::$request;
    }

    public static function response(): Core\Response
    {
        return self::$response;
    }
}
