<?php
declare(strict_types=1);

namespace App\tests;

use PHPUnit\Framework\TestCase;
use App\Calculator\Calculator;

class CalculatorTest extends TestCase
{

    public function testAdd()
    {
        $calc = new Calculator();
        $result = $calc->calculate(20, 10, '-');

        $this->


//        $result1 = $calculator->addition(20, 50);
//        $this->assertEquals(70, $result1);
    }
}
