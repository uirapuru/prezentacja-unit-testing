<?php

namespace Calc;

use Exception;

class Calculator implements CalculatorInterface
{
    private array $operator = [];

    private $result;

    public function __construct(array $operator)
    {
        $this->operator = $operator;
    }

    public function compute(string $operator, ...$params) : void {
        if(false === isset($this->operator[$operator])) {
            throw new Exception("Operator " . $operator . " does not exist");
        }

        $this->result = call_user_func_array(
            $this->operator[$operator], $params
        );
    }

    public function result()
    {
        return $this->result;
    }
}