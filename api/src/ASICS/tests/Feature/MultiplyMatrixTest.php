<?php

declare(strict_types=1);

namespace ASICS\Tests\Feature;

class MultiplyMatrixTest extends FeatureTestCase
{
    public function testItMultipliesAssignableMatrices()
    {
        $this->withoutExceptionHandling();

        $response = $this->post(
            route('matrix-multiplication'),
            [
                'data' => [
                    'a' => [
                        [2, 3, 12],
                        [21, 7, 17],
                        [6, 1, 9],
                    ],
                    'b' => [
                        [54, 11, 82],
                        [6, 74, 1],
                        [87, 4, 87],
                    ],
                ],
            ]
        );

        $response->assertJson(
            [
                "data" => [
                    [1170, 292, 1211],
                    [2655, 817, 3208],
                    [1113, 176, 1276],
                ],
            ]
        );
    }

    public function testMisMatchedDimensionsAreCaughtByValidation()
    {
        $response = $this->post(
            route('matrix-multiplication'),
            [
                'data' => [
                    'a' => [
                        [2, 3, 12],
                    ],
                    'b' => [
                        [54],
                        [87],
                    ],
                ],
            ]
        );

        $response->assertStatus(422);
        $response->assertJson(['message' => 'The given data failed to pass validation']);
        $response->assertJson(['errors' => [
            "matrix_a" => "Column count does not match row count of matrix B",
            "matrix_b" => "Row count does not match column count of matrix A",
        ]]);
    }
}
