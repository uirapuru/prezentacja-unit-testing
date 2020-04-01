<?php

namespace Calc\Storage;

/**
 * @codeCoverageIgnore
 */
class Http implements StorageInterface
{
    public function store($result): void
    {
        // curl("http://drive.google.com", $result)
    }

    public function get()
    {
        // return curl("http://drive.google.com");
    }
}