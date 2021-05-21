<?php

namespace App\Calculator;

use RuntimeException;

class Calculator
{
    const OPERATOR_ADDITION = '+';
    const OPERATOR_SUBTRACTION = '-';
    const OPERATOR_MULTIPLICATION = '*';
    const OPERATOR_DIVISION = '/';

    /**
     * @throws \Exception
     */
    public function calculate($a, $b, string $sign)
    {
        switch ($sign) {
            case self::OPERATOR_ADDITION:
                return $this->addition($a, $b);
            case self::OPERATOR_SUBTRACTION:
                return $this->subtraction($a, $b);
            case self::OPERATOR_MULTIPLICATION:
                return $this->multiplication($a, $b);
            case self::OPERATOR_DIVISION:
                return $this->division($a, $b);
            default:
                throw new \Exception('Incorrect math sign!');
        }
    }

    public function addition($a, $b)
    {
        return $a + $b;
    }

    public function subtraction($a, $b)
    {
        return $a - $b;
    }

    public function multiplication($a, $b)
    {
        return $a * $b;
    }

    public function division($a, $b)
    {
        if($b != 0) {
            return $a / $b;
        }
         throw new RuntimeException('You cannot divide by zero');
    }
}

