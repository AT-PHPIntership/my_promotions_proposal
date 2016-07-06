<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Repositories\City\CityInterface as CityInterface;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CityController extends Controller
{
    /**
     * Create a new CityInterface instance.
     *
     * @param CityInterface $city city
     *
     * @return void
     */
    public function __construct(CityInterface $city)
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
        $data['cities'] = $this->city->getAll();
        return view('backend.city.index')->with($data);
    }
}
