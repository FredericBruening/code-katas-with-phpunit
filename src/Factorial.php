<?php

namespace App;

use RangeException;

class Factorial
{
    public static function calculate(int $n)
    {
        if ($n < 0 || $n > 12) {
            throw new RangeException;
        }

        return $n ? $n * static::calculate($n - 1) : 1;
    }
}
