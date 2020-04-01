<?php

namespace Tests\Unit\Calc;

use Calc\Calculator;
use Exception;
use PHPUnit\Framework\TestCase;
use Calc\Ops as Ops;

class CalculatorTest extends TestCase
{
    /**
     * @test
     */
    public function its_checking_calculator_initialization()
    {
        // przygotowanie testu
        $calc = new Calculator([
            "+" => new Ops\Adding3()
        ]);

        // uruchomienie programu
        $calc->compute("+", 20.2, 11.11, 33.34, 4.32);

        // sprawdzenie wyniku testu
        $result = $calc->result();
        $this->assertEquals(68.97, $result);
    }
    /**
     * @test
     */
    public function it_throws_an_exception_when_wrong_operator_is_used()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage("Operator / does not exist");

        // przygotowanie testu
        $calc = new Calculator([]);

        // uruchomienie programu
        $calc->compute("/", 20, 10);
    }

    /**
     * @test
     * @dataProvider calcDataProvider
     */
    public function its_checking_calculator_initialization_with_dataProvider(int $a, int $b, int $expectedResult)
    {
        // przygotowanie testu
        $calc = new Calculator([
            "+" => new Ops\Adding()
        ]);

        // uruchomienie programu
        $calc->compute("+", $a, $b);

        // sprawdzenie wyniku testu
        $result = $calc->result();
        $this->assertEquals($expectedResult, $result);
    }

    public function calcDataProvider()
    {
        return [
            "adding positives" => ["a" => 2, "b" => 1, "expectedResult" => 3],
            "adding negatives" => ["a" => -1, "b" => -2, "expectedResult" => -3],
            "adding zero" => ["a" => 0, "b" => 0, "expectedResult" => 0],
        ];
    }
}