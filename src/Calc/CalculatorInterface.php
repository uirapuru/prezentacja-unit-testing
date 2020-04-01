<?php

namespace Calc;

interface CalculatorInterface
{
    public function compute(string $operator, ...$params) : void;

    public function result();
}