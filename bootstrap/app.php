<?php
use Illuminate\Foundation\Application;
use App\Http\Middleware\AdminMiddleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function ($middleware) {
        $middleware->alias([
            'admin' => AdminMiddleware::class, // Registrar el alias
        ]);
    })
    ->withExceptions(function ($exceptions) {
        //
    })
    ->create();

