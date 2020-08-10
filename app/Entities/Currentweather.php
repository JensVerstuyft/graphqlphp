<?php

namespace App\Entities;

use TheCodingMachine\GraphQLite\Annotations\Field;
use TheCodingMachine\GraphQLite\Annotations\Type;
use App\Entities\Weather;
use Illuminate\Support\Facades\Log;

/**
 * @Type()
 */
class CurrentWeather
{
    private $dt;
    private $sunrise;
    private $sunset;
    private $temp;
    private $feels_like;
    private $pressure;
    private $humidity;
    private $dew_point;
    private $uvi;
    private $clouds;
    private $visibility;
    private $wind_speed;
    private $wind_deg;
    private $weather = array();

    public function __construct() {

    }

    public function JsonToCurrentWeather($json) {
        foreach ($json as $key => $value) {
            if (is_array($value) && $key == 'weather') {
                foreach($value as $weathervalue) {
                    $weather = new Weather();
                    $weather->JsonToWeather($weathervalue);
                    $this->weather[] = $weather;
                }
            } else {
                $this->{$key} = $value;
            }
            
        }
    }

    /**
     * @Field()
     */
    public function getDt(): ?int
    {
        return $this->dt;
    }

    /**
     * @Field()
     */
    public function getSunrise(): ?int
    {
        return $this->sunrise;
    }

    /**
     * @Field()
     */
    public function getSunset(): ?int
    {
        return $this->sunset;
    }

    /**
     * @Field()
     */
    public function getTemp(): ?float
    {
        return $this->temp;
    }

    /**
     * @Field()
     */
    public function getFeels_like(): ?float
    {
        return $this->feels_like;
    }

    /**
     * @Field()
     */
    public function getPressure(): ?int
    {
        return $this->pressure;
    }

    /**
     * @Field()
     */
    public function getHumidity(): ?int
    {
        return $this->humidity;
    }

    /**
     * @Field()
     */
    public function getDew_point(): ?float
    {
        return $this->dew_point;
    }

    /**
     * @Field()
     */
    public function getUvi(): ?float
    {
        return $this->uvi;
    }

    /**
     * @Field()
     */
    public function getClouds(): ?int
    {
        return $this->clouds;
    }

    /**
     * @Field()
     */
    public function getVisibility(): ?int
    {
        return $this->visibility;
    }

    /**
     * @Field()
     */
    public function getWind_speed(): ?float
    {
        return $this->wind_speed;
    }

    /**
     * @Field()
     */
    public function getWind_deg(): ?int
    {
        return $this->wind_deg;
    }

    /**
     * @Field()
     * @return Weather[]
     */
    public function getWeather(): ?array
    {
        return $this->weather;
    }
}