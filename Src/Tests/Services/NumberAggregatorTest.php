<?php

namespace ResearchGate\Src\Services;

use ResearchGate\Src\Services\NumberAggregator;

class NumberAggregatorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider aggregationDataProvider
     */
    public function testAggregate(
        $lowerLimit,
        $UpperLimit,
        $expectedMin,
        $expectedMax,
        $expectedSum,
        $expectedAverage,
        $expectedCount
    )
    {
        $numberAggregator = new NumberAggregator($lowerLimit, $UpperLimit);
        $returnObject = $numberAggregator->aggregate($this->getContinuousGenerator($lowerLimit, $UpperLimit));

        $this->assertEquals($expectedMin,$returnObject->getMin());
        $this->assertEquals($expectedMax,$returnObject->getMax());
        $this->assertEquals($expectedSum,$returnObject->getSum()); //An = n(A1 + An)/2
        $this->assertEquals($expectedAverage,$returnObject->getAverage());

        $this->assertEquals($expectedCount,$returnObject->getCountOfNumbers());
    }

    private function getContinuousGenerator($minNum, $maxNum)
    {
        for ($i = $minNum; $i <= $maxNum; $i++){
            yield $i;
        }
    }

    private function getSumOfAirthmaticProgression($a1, $an, $n)
    {
        return($n * ($a1+$an)/2);
    }

    public function aggregationDataProvider()
    {
        return [
            'Small Possitive Set' => [1, 9, 1, 9, $this->getSumOfAirthmaticProgression(1, 9, 9), 5, 9],
            'Large Possitive Set' => [1, 9999, 1, 9999, $this->getSumOfAirthmaticProgression(1, 9999, 9999), 5000 , 9999],
            'Negative Number Set' => [-1000, 1000, -1000, 1000, $this->getSumOfAirthmaticProgression(-1000, 1000, 2000), 0, 2001]
        ];
    }

}
