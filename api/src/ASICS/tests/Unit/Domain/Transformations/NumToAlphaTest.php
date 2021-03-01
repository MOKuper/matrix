<?php

declare(strict_types=1);

namespace ASICS\Tests\Unit\Domain\Transformations;

use ASICS\Domain\Matrix\Transformations\Num2Alpha;
use PHPUnit\Framework\TestCase;

class NumToAlphaTest extends TestCase
{
    /**
     * @dataProvider correctAnswers
     * @param int    $input
     * @param string $answer
     */
    public function testNumToAlpha(int $input, string $answer)
    {
        // Takes a number and converts it to an Excel like column name
        // implementation found: https://stackoverflow.com/questions/3302857/algorithm-to-get-the-excel-like-column-name-of-a-number
        $this->assertEquals($answer, Num2Alpha::for($input));
    }

    public function correctAnswers(): array
    {
        return [
            [
                1,
                'A',
            ],
            [
                26,
                'Z',
            ],
            [
                27,
                'AA',
            ],
            [
                28,
                'AB',
            ],
            [
                324234,
                "RKPN",
            ],
            [
                1234567789,
                "CYWOQRM",
            ],
        ];
    }

}
