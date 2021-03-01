<?php

declare(strict_types=1);

namespace ASICS\Domain\Matrix;

interface Operation
{
    public function run(): array;
}
