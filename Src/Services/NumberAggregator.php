<?php

namespace ResearchGate\Src\Services;

use ResearchGate\Src\Model\AggregatedValues;
use Generator;

class NumberAggregator
{
    /** @var int */
    private $min;

    /** @var int */
    private $max;

    /**
     * @param int $minimumPossibleValue
     * @param int $maximumPossibleValue
     */
    public function __construct($minimumPossibleValue, $maximumPossibleValue)
    {
        $this->min = $maximumPossibleValue;//PHP_INT_MAX;
        $this->max = $minimumPossibleValue;//-1 - PHP_INT_MAX;//PHP_INT_MIN available for PHP7
    }

    /**
     * @param Generator $generator
     * @return AggregatedValues
     */
    public function aggregate(Generator $generator)
    {
        $sum = 0;
        $countOfNumbers = '0';
        foreach ($generator as $value) {
            $sum = bcadd($value, $sum);

            $countOfNumbers = bcadd($countOfNumbers, '1');

            if ($value < $this->min) {
                $this->min = $value;
            }
            if ($value > $this->max) {
                $this->max = $value;
            }
        }
        $average = bcdiv($sum, $countOfNumbers);

        return new AggregatedValues($sum, $countOfNumbers, $this->min, $this->max, $average);
    }
}
