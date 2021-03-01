<?php

declare(strict_types=1);

namespace ASICS\Domain\Matrix\Operations;

use ASICS\Domain\Matrix\Operation;
use ASICS\Domain\Matrix\Transformations\Num2Alpha;

class IntegerToAlphaConverter implements Operation
{
    public const ID = 'IntegerToAlphaConverter';

    private array $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function run(): array
    {
        $resultMatrix = collect($this->data)->map(function ($arrayContainer) {
            return collect($arrayContainer)->map(function ($item) {
                return Num2Alpha::for($item);
            });
        });

        return $resultMatrix->toArray();
    }
}
