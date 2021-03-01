<?php

namespace ASICS\Tests\Unit;

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Contracts\Foundation\Application;

trait CreatesApplication
{
    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication(): Application
    {
        $app = require __DIR__ . '/../../../../bootstrap/app.php';

        $app->make(Kernel::class)->bootstrap();

        return $app;
    }
}
