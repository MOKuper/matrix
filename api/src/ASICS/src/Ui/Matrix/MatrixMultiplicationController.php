<?php

declare(strict_types=1);

namespace ASICS\Ui\Matrix;

use ASICS\Application\Matrix\MatrixOperation;
use ASICS\Domain\Matrix\Operations\IntegerToAlphaConverter;
use ASICS\Domain\Matrix\Operations\Multiplier;
use Illuminate\Bus\Dispatcher;
use Illuminate\Http\JsonResponse;

class MatrixMultiplicationController
{
    private Dispatcher      $commandBus;
    private MatrixOperation $operationCommand;

    public function __construct(Dispatcher $commandBus, MatrixOperation $operationCommand)
    {
        $this->commandBus       = $commandBus;
        $this->operationCommand = $operationCommand;
    }

    public function __invoke(MatrixMultiplicationRequest $request): JsonResponse
    {
        $result = $this->commandBus->dispatch(
            $this->operationCommand->create(
                Multiplier::ID,
                [
                    'matrix_a' => $request->input('data.a'),
                    'matrix_b' => $request->input('data.b'),
                ]
            )
        );

        if ($request->input('convert') === 'yes') {
            $result = $this->commandBus->dispatch(
                $this->operationCommand->create(
                    IntegerToAlphaConverter::ID,
                    $result
                )
            );
        }

        return response()->json(['data' => $result]);
    }
}
