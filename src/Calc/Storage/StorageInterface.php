<?php

namespace Calc\Storage;

interface StorageInterface
{
    public function store($result) : void;

    public function get();
}