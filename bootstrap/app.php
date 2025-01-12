<?php

use App\Http\Middleware\AddCustomHeader;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        then: function ()
        {
            Route:: prefix('pages')->group(
                base_path('routes/pages.php')
            )->middleware('web');
        }

    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->append(AddCustomHeader::class);
    })


    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
