<?php

use ASICS\Ui\Matrix\MatrixMultiplicationController;
use Illuminate\Support\Facades\Route;

Route::post('/api/matrix/multiplication', MatrixMultiplicationController::class)
    ->name('matrix-multiplication');
