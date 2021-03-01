<?php

declare(strict_types=1);

namespace ASICS\Tests\Feature;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tests\CreatesApplication;

abstract class FeatureTestCase extends BaseTestCase
{
    use CreatesApplication;
}
