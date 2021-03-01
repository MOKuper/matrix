<?php

declare(strict_types=1);

namespace ASICS\Domain\Matrix;

use ASICS\Domain\Matrix\Operations\IntegerToAlphaConverter;
use ASICS\Domain\Matrix\Operations\Multiplier;
use Exception;

class OperationFactory
{
    public static function getOperationFor(string $transformation): string
    {
        switch ($transformation) {
            case Multiplier::ID:
                return Multiplier::class;
            case IntegerToAlphaConverter::ID:
                return IntegerToAlphaConverter::class;
            default:
                $msg = sprintf(
                    'no transformation class found for: "%s"',
                    $transformation
                );
                throw new Exception($msg);
        }
    }
}
