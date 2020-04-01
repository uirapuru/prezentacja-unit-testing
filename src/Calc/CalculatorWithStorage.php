<?php

namespace Calc;

use Calc\Storage\StorageInterface;
use Exception;

class CalculatorWithStorage implements CalculatorInterface
{
    private StorageInterface $storage;

    private CalculatorInterface $calculator;

    public function __construct(StorageInterface $storage, CalculatorInterface $calculator)
    {
        $this->storage = $storage;
        $this->calculator = $calculator;
    }

    public function compute(string $operator, ...$params): void
    {
        $this->calculator->compute($operator, ...$params);

        $this->storage->store(
            $this->calculator->result()
        );
    }

    public function result()
    {
        return $this->storage->get();
    }

    /**
     * @codeCoverageIgnore
     */
    public function method() {
        return 0;
    }

    public function print() {
        if(true) {
            print_r(123);
        } else {
            echo "";
        }
    }
}