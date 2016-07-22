<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\CityRepository as City;
use App\Repositories\CountyRepository as County;

class CityController extends Controller
{
    /**
     * City, County
     *
     * @var city
     * @var county
     */
    private $city;
    private $county;
    
    /**
     * Function construct of CityController
     *
     * @param CityRepository   $city   city
     * @param CountyRepository $county county
     *
     * @return void
     */
    public function __construct(City $city, County $county)
    {
        $this->city = $city;
        $this->county = $county;
    }

    /**
     * Get a listing of cities.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCity()
    {
        $cities = $this->city->all(['id', 'name']);
        return response()->json([
            'cities' => $cities
        ], config('statuscode.ok'));
    }

    /**
     * Get a listing of counties with city.
     *
     * @param \Illuminate\Http\Request $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function getCounty(Request $request)
    {
        $city = $this->city->find($request->id, ['id', 'name']);

        if ($city) {
            return response()->json([
                'counties' => $city->counties
            ], config('statuscode.ok'));
        }

        return response()->json([
            'error' => trans('messages.error_not_found')
        ], config('statuscode.not_found'));
    }
}
