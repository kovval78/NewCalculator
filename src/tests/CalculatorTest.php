<?php
declare(strict_types=1);

namespace App\tests;

use App\Calculator\Calculator;
use http\Exception\InvalidArgumentException;
use PHPUnit\Framework\TestCase;

final class CalculatorTest extends TestCase
{
    public function testException()
    {
        $this->expectException(InvalidArgumentException::class);
    }

    /**
     * @dataProvider additionProvider
     */
    public function testIsAdditionWorks($a, $b,$expected)
    {
        $calc = new Calculator();
        $this->assertSame($expected, $calc->addition($a, $b));
}

    /**
     * @dataProvider additionProvider
     */
    public function testIsVariablesAreNumeric($a, $b)
    {
        $calc = new Calculator();
        $this->assertIsNumeric($calc->addition($a, $b));
    }

    /**
     * @dataProvider additionProvider
     */
    public function testIsOutputEmpty($a, $b)
    {
        $calc = new Calculator();
        $this->assertNotEmpty($calc->addition($a, $b));
    }

        public function additionProvider(): array
    {
        return [
            [-2, -2, -4],
            [1, -2, -1],
            [0, 1, 1],
            [1, 0, 1],
            [2.3, 1.0, 3.3],
            [0, 'a', 0]
        ];
    }
}
