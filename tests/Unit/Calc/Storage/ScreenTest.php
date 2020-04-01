<?php

namespace Tests\Unit\Calc\Storage;

use Calc\Storage\Screen;
use PHPUnit\Framework\TestCase;

class ScreenTest extends TestCase
{
    public function test_store_is_printing() {
        $store = new Screen();

        ob_start();
        $store->store(123);
        $result = ob_get_flush();

        $this->assertEquals(123, $result);
        $this->assertEquals(123, $store->get());

    }
}