<?php

namespace Calc\Storage;

class Screen extends InMemory
{
    public function store($result): void
    {
        print_r($result);
        parent::store($result);
    }

    /**
     * @codeCoverageIgnore
     */
    public function get()
    {
        return parent::get();
    }
}