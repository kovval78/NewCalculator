<?php

namespace App\Calculator;

class Calculator
{
    private $fNumber;
    private $sNumber;
    private $mathSign;

    public function __construct($fNumber, $sNumber, $mathSign)
    {
            $this->fNumber = $fNumber;
            $this->sNumber = $sNumber;
            $this->mathSign = $mathSign;
    }

    public function getFNumber()
    {
        return $this->fNumber;
    }

    public function setFNumber($fNumber)
    {
        if(is_integer($fNumber) && $fNumber > 0){
            $this->fNumber = $fNumber;
            return $fNumber;
        } else {
            return 'The number is not integer or is zero';
        }
    }

    public function getSNumber()
    {
        return $this->sNumber;
    }

    public function setSNumber($sNumber)
    {
        if(is_integer($sNumber) && $sNumber > 0){
            $this->sNumber = $sNumber;
            return $sNumber;
        } else {
            return 'The number is not integer or is zero';
        }
    }

    public function getMathSign()
    {
        return $this->mathSign;
    }

    public function setMathSign($mathSign)
    {
        if(!empty($mathSign === '+' || '-' || '*' || '/')){
            $this->mathSign = $mathSign;
            return $mathSign;
            } else {
            return 'The incorrect math sign!';
        }
    }


    public function sign(){
        if($this->mathSign == '+'){
            return $this->addition();
        } elseif ($this->mathSign == '-'){
            return $this->subtraction();
        } elseif ($this->mathSign == '*'){
            return $this->multiplication();
        } elseif ($this->mathSign == '/'){
            return $this->division();
        } else {
            return 'The incorrect math sign';
        }
    }

    public function addition()
    {
            return $this->fNumber + $this->sNumber;
    }

    public function subtraction()
    {
            return $this->fNumber - $this->sNumber;
    }

    public function multiplication()
    {
            return $this->fNumber * $this->sNumber;
    }

    public function division()
    {
            return $this->fNumber / $this->sNumber;

    }
}

