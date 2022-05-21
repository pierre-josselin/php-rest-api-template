<?php

namespace Core\API;

use Bramus\Router\Router;
use Core\Request;
use Core\Response;

final class API
{
    private static Router $router;
    private static Request $request;
    private static Response $response;

    public static function init(): void
    {
        self::$router = new Router();
        self::$request = new Request();
        self::$response = new Response();
    }

    public static function router(): Router
    {
        return self::$router;
    }

    public static function request(): Request
    {
        return self::$request;
    }

    public static function response(): Response
    {
        return self::$response;
    }
}
