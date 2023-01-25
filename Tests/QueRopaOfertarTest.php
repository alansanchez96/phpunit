<?php

namespace Tests;

use Exception;
use App\TiempoApi;
use App\QueRopaOfertar;
use PHPUnit\Framework\TestCase;

class QueRopaOfertarTest extends TestCase
{
    private TiempoApi $tiempoApi;
    private QueRopaOfertar $queRopaOfertar;

    public function setUp(): void
    {
        parent::setUp();

        $this->tiempoApi = $this->getMockBuilder(TiempoApi::class)->getMock();

        $this->queRopaOfertar = new QueRopaOfertar($this->tiempoApi);
    }

    public function test_determina_remera_cuando_la_temperatura_es_mayor_a_18_grados()
    {
        $this->tiempoApi->expects($this->once())
            ->method('queTemperaturaHaceEn')
            ->willReturn(22);

        $ropa = $this->queRopaOfertar->determina('Buenos Aires');

        $this->assertEquals('Remera', $ropa);
    }

    public function test_determina_campera_cuando_la_temperatura_es_menor_a_10_grados()
    {
        $this->tiempoApi->expects($this->once())
            ->method('queTemperaturaHaceEn')
            ->willReturn(5);

        $ropa = $this->queRopaOfertar->determina('Buenos Aires');

        $this->assertEquals('Campera', $ropa);
    }

    public function test_determina_camisas_cuando_la_temperatura_esta_entre_10_y_18_grados()
    {
        $this->tiempoApi->expects($this->once())
            ->method('queTemperaturaHaceEn')
            ->willReturn(14);

        $ropa = $this->queRopaOfertar->determina('Buenos Aires');

        $this->assertEquals('Camisas', $ropa);
    }

    public function test_comprueba_el_tiempo_en_la_ciudad_indicada()
    {
        $ciudad = 'Buenos Aires';
        $randomNum = 192873912;

        $this->tiempoApi->expects($this->once())
            ->method('queTemperaturaHaceEn')
            ->with($ciudad)
            ->willReturn($randomNum);

        $this->queRopaOfertar->determina($ciudad);
    }

    public function test_lanza_una_exception_si_la_ciudad_esta_vacia()
    {
        $this->expectException(Exception::class);

        $this->queRopaOfertar->determina('');
    }
}
