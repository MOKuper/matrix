<?php

declare(strict_types=1);

namespace ASICS\Ui\Matrix;

use Illuminate\Foundation\Http\FormRequest;

class MatrixMultiplicationRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'data' => 'required|array',
        ];
    }

}
