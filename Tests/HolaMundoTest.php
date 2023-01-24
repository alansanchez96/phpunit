<?php

namespace Tests;

use App\HolaMundo;
use PHPUnit\Framework\TestCase;

class HolaMundoTest extends TestCase
{
    public function test_said_holamundo_when_saluda()
    {
        $this->assertEquals('Hola mundo', (new HolaMundo)->saludar());
    }
}
