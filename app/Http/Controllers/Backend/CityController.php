<?php

namespace App\Http\Controllers\Backend;

use App\Repositories\CityRepository as City;
use App\Http\Requests\Backend\CityRequest;
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
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.city.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CityRequest $request)
    {
        $result = $this->city->create($request->all());
        if ($result) {
            flash(trans('messages.successfully'), 'success');
        } else {
            flash(trans('messages.failed'), 'danger');
        }
        return redirect('admin/city');
    }
}
