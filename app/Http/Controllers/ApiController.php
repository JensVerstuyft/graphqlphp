<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use TheCodingMachine\GraphQLite\Annotations\Query;
use App\Entities\Location;

class ApiController extends Controller
{
    /**
     * @Query
     */
    public function location(float $lat, float $lon): Location
    {
        $location = new Location($lat, $lon);
        $location->fetchWeatherData();
        return $location;
    }
}