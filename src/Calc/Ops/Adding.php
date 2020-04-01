<?php

namespace Calc\Ops;

class Adding
{
    public function __invoke(int $a, int $b) : int {
        return $a + $b;
    }
}