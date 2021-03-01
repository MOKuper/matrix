<?php

declare(strict_types=1);

namespace ASICS\Domain\Matrix\Operations;

use ASICS\Domain\Matrix\MisMatchedMatrixMultiplicationException;
use ASICS\Domain\Matrix\Operation;
use Matrix\Exception as MatrixException;
use Matrix\Matrix;

class Multiplier implements Operation
{
    public const ID = 'multiplication';

    private array $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function run(): array
    {
        $matrixA = new Matrix($this->data['matrix_a']);
        $matrixB = new Matrix($this->data['matrix_b']);

        try {
            $resultMatrix = $matrixA->multiply($matrixB)->toArray();
        } catch (MatrixException $e) {
            if($e->getMessage() === 'Matrices have mismatched dimensions') {
                throw new MisMatchedMatrixMultiplicationException();
            }
        }

        return $resultMatrix;
    }
}
