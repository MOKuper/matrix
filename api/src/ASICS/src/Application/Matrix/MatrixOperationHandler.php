<?php

declare(strict_types=1);

namespace ASICS\Application\Matrix;

use ASICS\Domain\Matrix\Operation;
use ASICS\Domain\Matrix\OperationFactory;

class MatrixOperationHandler
{
    public function handle(MatrixOperation $command): array
    {
        $operation = OperationFactory::getOperationFor($command->getOperation());

        /** @var Operation $operation */
        $operation = new $operation($command->getData());

        return $operation->run();
    }
}
