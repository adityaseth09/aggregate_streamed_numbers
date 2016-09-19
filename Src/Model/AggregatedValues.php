<?php

namespace ResearchGate\Src\Model;

class AggregatedValues
{
    /** @var float */
    private $sum;

    /** @var int */
    private $countOfNumbers;

    /** @var float */
    private $min;

    /** @var float */
    private $max;

    /** @var float */
    private $average;

    /**
     * AggregatedValues constructor.
     * @param float $sum
     * @param int $countOfNumbers
     * @param float $min
     * @param float $max
     */
    public function __construct($sum, $countOfNumbers, $min, $max, $average)
    {
        $this->sum            = floatval($sum);
        $this->countOfNumbers = intval($countOfNumbers);
        $this->min            = floatval($min);
        $this->max            = floatval($max);
        $this->average        = floatval($average);
    }

    /**
     * @return float
     */
    public function getSum()
    {
        return $this->sum;
    }

    /**
     * @return int
     */
    public function getCountOfNumbers()
    {
        return $this->countOfNumbers;
    }

    /**
     * @return float
     */
    public function getMin()
    {
        return $this->min;
    }

    /**
     * @return float
     */
    public function getMax()
    {
        return $this->max;
    }

    /**
     * @return float
     */
    public function getAverage()
    {
        return $this->average;
    }
}
