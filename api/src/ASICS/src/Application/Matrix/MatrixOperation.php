<?php

declare(strict_types=1);

namespace ASICS\Application\Matrix;

use Illuminate\Foundation\Bus\Dispatchable;

class MatrixOperation
{
    use Dispatchable;

    private string $operation;
    private array  $data;

    public function create(string $operation, array $data): MatrixOperation
    {
        $this->operation = $operation;
        $this->data      = $data;

        return $this;
    }

    public function getOperation(): string
    {
        return $this->operation;
    }

    public function getData(): array
    {
        return $this->data;
    }
}
