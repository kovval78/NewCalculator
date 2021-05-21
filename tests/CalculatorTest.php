<?php declare(strict_types=1);

namespace Tests;

use App\Calculator\Calculator;
use PHPUnit\Framework\TestCase;

final class CalculatorTest extends TestCase
{
    private Calculator $calc;

    public function setUp(): void
    {
        parent::setUp();
        $this->calc = new Calculator();
    }

    public function testCalculateWhenSignIsEqualsPlus()
    {
       $this->assertSame(1, $this->calc->calculate(0, 1, Calculator::OPERATOR_ADDITION));
    }

    public function testCalculateWhenSignIsEqualsMinus()
    {
        $this->assertSame(1, $this->calc->calculate(1,0,Calculator::OPERATOR_SUBTRACTION));
    }

    public function testCalculateWhenSignIsEqualsMultiplier()
    {
        $this->assertSame(0, $this->calc->calculate(1, 0, Calculator::OPERATOR_MULTIPLICATION));
    }

    public function testCalculateWhenSignIsEqualsDivider()
    {
        $this->assertSame(2, $this->calc->calculate(4, 2, Calculator::OPERATOR_DIVISION));
    }

    /**
     * @dataProvider additionProvider
     */
    public function testAdditionCases($a, $b, $expected): void
    {
        $this->assertSame($expected, $this->calc->addition($a, $b));
    }

    /**
     * @dataProvider additionProvider
     */
    public function testVariablesAreNumeric($a, $b)
    {
        $this->assertIsNumeric($this->calc->addition($a, $b));
    }

        public function additionProvider(): array
    {
        return [
            [0, 1, 1],
            [1, 0, 1],
            [0, 0, 0],
            [-1, 1, 0],
            [1, -1, 0],
            [1.1, -1.1, 0.0]
        ];
    }

    /**
     * @dataProvider subtractionProvider
     */
    public function testSubtractionCases($a, $b, $expected)
    {
        $this->assertSame($expected, $this->calc->subtraction($a, $b));
    }

    public function subtractionProvider(): array
    {
        return [
          [2, 1, 1],
          [-2, 1, -3],
          [2, -1, 3],
          [-2, -1, -1],
        ];
    }

    /**
     * @dataProvider multiplicationProvider
     */
    public function testMultiplicationCases($a, $b, $expected)
    {
        $this->assertSame($expected, $this->calc->multiplication($a, $b));
    }

    public function multiplicationProvider(): array
    {
        return [
            [2, 1, 2],
            [-2, 1, -2],
            [2, 0, 0],
            [0, 2, 0],
            [0, 0, 0],
            [1.5, 1.5, 2.25],
        ];
    }

    /**
     * @dataProvider divisionProvider
     */
    public function testDivisionCases($a, $b, $expected): void
    {
        $this->assertSame($expected, $this->calc->division($a, $b));
    }

    public function divisionProvider(): array
    {
        return [
          [4, 2, 2],
          [-4, 2, -2],
          [4, -2, -2],
          [0, 2, 0],
          [5, 2, 2.5],
          [1, 3, 0.3333333333333333],
        ];
    }

    public function testDivisionByZero()
    {
        $this->expectException(\RuntimeException::class);
        $this->calc->calculate(3, 0, Calculator::OPERATOR_DIVISION);
    }
}
