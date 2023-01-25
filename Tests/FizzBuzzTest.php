<?php

namespace Tests;

use App\FizzBuzz;
use PHPUnit\Framework\TestCase;

class FizzBuzzTest extends TestCase
{
    public function useCase(): array
    {
        return [
            [3, 'Fizz'],
            [5, 'Buzz'],
            [15, 'FizzBuzz'],
            [1, 1]
        ];
    }

    /**
     * @dataProvider useCase
     */
    public function test_Fizz_Buzz($num, $expectedResult): void
    {
        $result = (new FizzBuzz)->diNumero($num);

        $this->assertEquals($expectedResult, $result);
    }

    public function test_la_cuenta_si_no_se_ha_dicho_ningun_numero()
    {
        $this->assertEquals(0, (new FizzBuzz)->dimeLaCuenta());
    }

    public function test_la_cuenta_se_ha_incrementado_cuando_decimos_numero()
    {
        $fizzBuzz = new FizzBuzz;

        $fizzBuzz->diNumero(1);
        $fizzBuzz->diNumero(2);

        $this->assertEquals(2, $fizzBuzz->dimeLaCuenta());
    }
}
