<?php

namespace ResearchGate\Src\Model;

/**
 * https://www.random.org/integers/?num=10000&min=-1000000000&max=1000000000&col=100&base=10&format=plain&rnd=new'
 */
class RandomOrgApiSettings
{
    /** @var int */
    private $length;

    /** @var int  */
    private $min;

    /** @var int  */
    private $max;

    /** @var int  */
    private $col;

    /** @var int  */
    private $base;

    /** @var string */
    private $format;

    /** @var string */
    private $rnd;

    public function __construct($length)
    {
        $this->length = $length;
        $this->min = -1000000000;
        $this->max = 1000000000;
        $this->col = 100;
        $this->base = 10;
        $this->format = 'plain';
        $this->rnd = 'new';
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return(
            'https://www.random.org/integers/?num=' . $this->length
            .'&min=' . $this->min
            .'&max=' . $this->max
            .'&col=' . $this->col
            .'&base=' . $this->base
            .'&format=' . $this->format
            .'&rnd=' . $this->rnd
        );
    }
}
