<?php

namespace ResearchGate\Src\Services;

use Generator;

class SecureRandomNumberListGenerator
{
    const MIN = -999999;
    const MAX = 999999;
    /**
     * @param $numbers
     * @param int $min
     * @param int $max
     * @return Generator
     */
    public function generate($numbers, $min = self::MIN, $max = self::MAX)
    {
        for($column = 0; $column < $numbers; $column++) {

            try {
                yield random_int($min, $max);
            } catch (\Exception $e) {
                // If you get this message, the CSPRNG failed hard.
                die("Could not generate a random int. Is our OS secure?");
            }

        }
    }
}
