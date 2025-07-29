<?php

use App\Http\Middleware\CheckMaintenanceMode;
use App\Http\Middleware\CheckPermission;
use App\Http\Middleware\SendEmailTAPHT;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )


    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'cekMaintenanceMode' => CheckMaintenanceMode::class
        ]);

        $middleware->web(append: [
            CheckMaintenanceMode::class,
            CheckPermission::class,
            SendEmailTAPHT::class,
        ]);
    })



    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
