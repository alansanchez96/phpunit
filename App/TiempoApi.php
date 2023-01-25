<?php

namespace App;

use Cmfcmf\OpenWeatherMap;
use Http\Factory\Guzzle\RequestFactory;
use Http\Adapter\Guzzle6\Client as GuzzleAdapter;

class TiempoApi
{
    protected OpenWeatherMap $openWeatherMap;

    public function __construct()
    {
        $httpClient = GuzzleAdapter::createWithConfig([]);
        $httpRequestFactory = new RequestFactory();

        $this->openWeatherMap = new OpenWeatherMap('api_key_here', $httpClient, $httpRequestFactory);
    }

    public function queTemperaturaHaceEn(string $ciudad): int|float
    {
        $temperatura = $this->openWeatherMap->getWeather($ciudad, 'metric');

        return $temperatura->temperature->now->getValue();
    }
}
