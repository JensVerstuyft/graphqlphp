<?php

namespace App\Entities;

use TheCodingMachine\GraphQLite\Annotations\Field;
use TheCodingMachine\GraphQLite\Annotations\Type;
use App\Entities\CurrentWeather;
use Illuminate\Support\Facades\Log;

/**
 * @Type()
 */
class Location
{
    private $lat;
    private $lon;
    private $timezone;
    private $timezone_offset;
    private $current;

    public function __construct($lat, $lon) {
        $this->lat = $lat;
        $this->lon = $lon;
    }

    public function fetchWeatherData() {
        $url = 'https://api.openweathermap.org/data/2.5/onecall?exclude=hourly,daily&appid=8bb8add819320856218e1d341b14ace6&units=metric';
        $url .= '&lat='.$this->lat;
        $url .=  '&lon='.$this->lon;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch); 

        if($output) {
            $output = json_decode($output);
            $this->lat = $output->lat;
            $this->lon = $output->lon;
            $this->timezone = $output->timezone;
            $this->timezone_offset = $output->timezone_offset;
            $this->current = new CurrentWeather();
            $this->current->JsonToCurrentWeather($output->current);
        }
    }

    /**
     * @Field()
     */
    public function getLat(): float
    {
        return $this->lat;
    }

    /**
     * @Field()
     */
    public function getLon(): float
    {
        return $this->lon;
    }

    /**
     * @Field()
     */
    public function getTimezone(): ?string
    {
        return $this->timezone;
    }

    /**
     * @Field()
     */
    public function getTimezone_offset(): ?int
    {
        return $this->timezone_offset;
    }

    /**
     * @Field()
     */
    public function getCurrent(): ?CurrentWeather
    {
        return $this->current;
    }

}