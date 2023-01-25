<?php

namespace App;

use App\TiempoApi;

class QueRopaOfertar
{
    protected TiempoApi $api;

    public function __construct($api)
    {
        $this->api = $api;
    }

    public function determina(string $ciudad): string
    {
        $temperatura = $this->api->queTemperaturaHaceEn($ciudad);
        $categoria = 'Camisas';

        if ($temperatura > 18)
            $categoria = 'Remera';

        if ($temperatura < 10)
            $categoria = 'Campera';

        return $categoria;
    }
}
