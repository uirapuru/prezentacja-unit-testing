<?php

namespace Calc\Storage;

class InMemory implements StorageInterface
{
    private $storage;

    public function store($result): void
    {
        $this->putValue($result);
    }

    /**
     * @codeCoverageIgnore
     */
    public function get()
    {
        return $this->getValue();
    }

    protected function putValue($value) {
        $this->storage = $value;
    }

    /**
     * @codeCoverageIgnore
     */
    private function getValue()
    {
        return $this->storage;
    }
}