<?php

use App\Http\Middleware\ReviewOrderMiddleware;
use App\Http\Middleware\StepThreeOrderMiddleware;
use App\Http\Middleware\StepTwoOrderMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'step-two-order' => StepTwoOrderMiddleware::class,
            'step-three-order' => StepThreeOrderMiddleware::class,
            'review-order' => ReviewOrderMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
