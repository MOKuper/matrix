<?php

declare(strict_types=1);

namespace ASICS\Domain\Matrix;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

class MisMatchedMatrixMultiplicationException extends UnprocessableEntityHttpException
{
    public function render(): JsonResponse
    {
        return response()
            ->json(
                [
                    'message' => 'The given data failed to pass validation',
                    'errors'  => [
                        "matrix_a" => "Column count does not match row count of matrix B",
                        "matrix_b" => "Row count does not match column count of matrix A",
                    ],
                ],
                422
            );
    }
}
