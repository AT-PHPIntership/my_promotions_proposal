<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Repositories\CityRepository as City;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CityController extends Controller
{
    /**
     * City
     *
     * @var City
     */
    private $city;
    
    /**
     * Create a new CityRepository instance.
     *
     * @param CityRepository $city city
     *
     * @return void
     */
    public function __construct(City $city)
    {
        $this->city = $city;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['cities'] = $this->city->all();
        return view('backend.city.index')->with($data);
    }
}
