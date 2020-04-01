<?php

namespace Calc\Ops;

/**
 * @codeCoverageIgnore
 */
class Adding2
{
    public function __invoke(int ...$params) : int {
        return array_sum($params);
    }
}