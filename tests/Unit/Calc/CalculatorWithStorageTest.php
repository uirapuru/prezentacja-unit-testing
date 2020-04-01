<?php

namespace Tests\Unit\Calc;

use Calc\Calculator;
use Calc\CalculatorWithStorage;
use Calc\Storage\Http;
use Calc\Storage\InMemory;
use Calc\Storage\StorageInterface;
use Exception;
use PHPUnit\Framework\TestCase;
use Calc\Ops as Ops;

class CalculatorWithStorageTest extends TestCase
{
    /**
     * @test
     */
    public function adding_two_numbers_in_mock() {
        $calc = new Calculator([
            "+" => new Ops\Adding()
        ]);

        $storageMock = $this->prophesize(StorageInterface::class);
        $storageMock->store(31)->shouldBeCalledTimes(1);
        $storageMock->get()->shouldBeCalledTimes(1)->willReturn("hello world!");

        $storedCalc = new CalculatorWithStorage($storageMock->reveal(), $calc);

        $storedCalc->compute("+", 20, 11);

        $result = $storedCalc->result();
        $this->assertEquals("hello world!", $result);
    }

    /**
     * @test
     */
    public function adding_two_numbers_in_memory()
    {
        // przygotowanie testu
        $calc = new Calculator([
            "+" => new Ops\Adding()
        ]);

        $storage = new InMemory();
        $storedCalc = new CalculatorWithStorage($storage, $calc);

        // uruchomienie testu
        $storedCalc->compute("+", 20, 11);

        // sprawdzenie wyniku testu
        $result = $storedCalc->result();
        $this->assertEquals(31, $result);
    }
}