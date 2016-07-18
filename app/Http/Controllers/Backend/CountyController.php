<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\CountyRequest;
use App\Http\Controllers\Controller;
use App\Repositories\CountyRepository as County;
use App\Repositories\CityRepository as City;

class CountyController extends Controller
{
    /**
     * County, City
     *
     * @var county
     * @var city
     */
    private $county;
    private $city;

    /**
     * Create a new CountyRepository instance.
     *
     * @param CountyRepository $county county
     * @param CityRepository   $city   city
     *
     * @return void
     */
    public function __construct(County $county, City $city)
    {
        $this->county = $county;
        $this->city = $city;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['counties'] = $this->county->all(['id', 'name', 'city_id']);
        return view('backend.county.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['cities'] = $this->city->all(['id', 'name'])->lists('name', 'id');
        return view('backend.county.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request\Backend\CountyRequest $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CountyRequest $request)
    {
        $result = $this->county->create($request->all());
        if ($result) {
            flash(trans('messages.create_county_successfull'), 'success');
        } else {
            flash(trans('messages.error_create_county'), 'danger');
        }
        return redirect()->route('admin.county.index');
    }
}
