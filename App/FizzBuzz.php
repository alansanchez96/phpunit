<?php

namespace App;

class FizzBuzz
{
    private $cuenta;

    public function dimeLaCuenta()
    {
        return $this->cuenta;
    }

    public function diNumero(int $num): string
    {
        ++$this->cuenta;

        if ($num % 3 === 0 && $num % 5 === 0)
            return 'FizzBuzz';
        if ($num % 3 === 0)
            return 'Fizz';
        if ($num % 5 === 0)
            return 'Buzz';

        return $num;
    }
}
