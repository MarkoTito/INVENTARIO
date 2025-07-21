<?php

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
        //se especifica que el archivo /routes/admin.php es un rutador
        then:function(){
            Route::middleware('web','auth')//autentifica siempre q se valla a una ruta (ahora ya no se nesecita poner un menu con ref al login :/)
                ->prefix('admin')//prefijo inicial
                ->name('admin')//inicio del nombre
                ->group(base_path('routes/admin.php'));//donde estara el nuevo rutador
        }
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
