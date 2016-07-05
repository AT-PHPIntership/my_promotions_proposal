<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\City;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['cities'] = City::all();
        return view('backend.city.index')->with($data);
    }
}
