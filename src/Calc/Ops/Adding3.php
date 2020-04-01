<?php

namespace Calc\Ops;

class Adding3
{
    public function __invoke(float ...$params) : float {
        return array_sum($params);
    }
}