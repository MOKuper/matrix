<?php

declare(strict_types=1);

namespace ASICS\Domain\Matrix\Transformations;

class Num2Alpha
{
    public static function for($n) {
        $n -= 1;
        for ($r = ""; $n >= 0; $n = intval($n / 26) - 1)
            $r = chr($n % 26 + 0x41) . $r;
        return $r;
    }
}
