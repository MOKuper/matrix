<?php

declare(strict_types=1);

namespace ASICS;

use ASICS\Application\Matrix\MatrixOperationHandler;
use ASICS\Application\Matrix\MatrixOperation;
use Illuminate\Bus\Dispatcher;
use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

class ServiceProvider extends LaravelServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . './../routes/api.php');

        app(Dispatcher::class)->map([
            MatrixOperation::class => MatrixOperationHandler::class,
        ]);
    }
}
