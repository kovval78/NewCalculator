<?php

namespace App\Calculator;

use RuntimeException;

class Calculator
{

    public function calculate($a, $b, $sign){
        if (!is_numeric($a) || ($b)){
            throw new RuntimeException('Numbers have to be either integer nor float');
        }

        if ($sign == '+'){
            return $this->addition($a, $b);
        }

        if ($sign == '-'){
            return $this->subtraction($a, $b);
        }

        if ($sign == '*'){
            return $this->multiplication($a, $b);
        }

        if ($sign == '/'){
            return $this->division($a, $b);
        }
        throw new RuntimeException('Incorrect math sign!');
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
        if ($b != 0){
            return $a / $b;
        }
         throw new RuntimeException('You cannot divide by zero');
    }
}

