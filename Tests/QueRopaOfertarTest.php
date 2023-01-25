<?php

namespace Tests;

use App\QueRopaOfertar;
use App\TiempoApi;
use PHPUnit\Framework\TestCase;

class QueRopaOfertarTest extends TestCase
{
    public function test_determina_remera_cuando_la_temperatura_es_mayor_a_18_grados()
    {
        $tiempoApi = $this->getMockBuilder(TiempoApi::class)->getMock();

        $tiempoApi->expects($this->once())
            ->method('queTemperaturaHaceEn')
            ->willReturn(22);

        $queRopaOfertar = new QueRopaOfertar($tiempoApi);

        $ropa = $queRopaOfertar->determina('Buenos Aires');

        $this->assertEquals('Remera', $ropa);
    }

    public function test_determina_campera_cuando_la_temperatura_es_menor_a_10_grados()
    {
        $tiempoApi = $this->getMockBuilder(TiempoApi::class)->getMock();

        $tiempoApi->expects($this->once())
            ->method('queTemperaturaHaceEn')
            ->willReturn(5);

        $queRopaOfertar = new QueRopaOfertar($tiempoApi);

        $ropa = $queRopaOfertar->determina('Buenos Aires');

        $this->assertEquals('Campera', $ropa);
    }

    public function test_determina_camisas_cuando_la_temperatura_esta_entre_10_y_18_grados()
    {
        $tiempoApi = $this->getMockBuilder(TiempoApi::class)->getMock();

        $tiempoApi->expects($this->once())
            ->method('queTemperaturaHaceEn')
            ->willReturn(14);

        $queRopaOfertar = new QueRopaOfertar($tiempoApi);

        $ropa = $queRopaOfertar->determina('Buenos Aires');

        $this->assertEquals('Camisas', $ropa);
    }
}
