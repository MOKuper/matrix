<?php

declare(strict_types=1);

namespace ASICS\Tests\Integration;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tests\CreatesApplication;

abstract class IntegrationTestCase extends BaseTestCase
{
    use CreatesApplication;
}
