<?php

declare(strict_types=1);

namespace App\Receivers;

class Calculator
{
    private float $numOne;
    private float $numTwo;

    public function __construct(float $numOne, float $numTwo)
    {
        $this->numOne = $numOne;
        $this->numTwo = $numTwo;
    }

    public function add(): float
    {
        return $this->numOne + $this->numTwo;
    }

    public function subtract(): float
    {
        return $this->numOne - $this->numTwo;
    }

    public function multiply(): float
    {
        return $this->numOne * $this->numTwo;
    }

    public function divide(): float
    {
        return $this->numOne / $this->numTwo;
    }

    public function setNumOne(float $numOne)
    {
        $this->numOne = $numOne;
    }

    public function setNumTwo(float $numTwo)
    {
        $this->numTwo = $numTwo;
    }
}
