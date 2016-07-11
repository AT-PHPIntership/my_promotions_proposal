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
     * @var Actor
     */
    private $city;
    
    /**
     * Create a new CityInterface instance.
     *
     * @param CityInterface $city city
     *
     * @return void
     */
    public function __construct(City $city)
    {
        $this->city = $city;
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
            $request->session()->flash('message', trans('messages.successfully'));
        } else {
            $request->session()->flash('message', trans('messages.failed'));
        }
        return redirect('admin/city');
    }
}
