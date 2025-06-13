<?php

use App\Exceptions\ClientNotFoundException;
use App\Exceptions\OrderNotFoundException;
use App\Exceptions\PreconditionOrderException;
use App\Helpers\ApiResponse;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        
		 $exceptions->render(function (OrderNotFoundException $exception){
            return ApiResponse::error('',$exception->getMessage(), $exception->getCode());
        });
		
        $exceptions->render(function (ClientNotFoundException $exception)
        {
            return ApiResponse::error('',$exception->getMessage(), $exception->getCode());
        });

        $exceptions->render(function (PreconditionOrderException $exception)
        {
            return ApiResponse::error('',$exception->getMessage(), $exception->getCode());
        });
    })->create();
