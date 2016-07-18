<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\CountyRepository as County;

class CountyController extends Controller
{
    /**
     * County
     *
     * @var county
     */
    private $county;

    /**
     * Create a new CountyRepository instance.
     *
     * @param CountyRepository $county county
     *
     * @return void
     */
    public function __construct(County $county)
    {
        $this->county = $county;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['counties'] = $this->county->all();
        return view('backend.county.index')->with($data);
    }
}
