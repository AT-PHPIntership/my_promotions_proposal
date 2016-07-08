<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\BusinessRepository as Business;
use Exception;

class BusinessController extends Controller
{
    /**
     * Business
     *
     * @var Business
     */
    private $business;

    /**
     * Construct a BusinessController
     *
     * @param int $business business
     */
    public function __construct(Business $business)
    {
        $this->business = $business;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['businesses'] = $this->business->withRelationship('user');
        return view('backend.business.list')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \Illuminate\Http\Request $request request update
     * @param int                      $id      id
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        try {
            $data['business'] = $this->business->find($id);
        } catch (Exception $e) {
            $request->session()->flash('error', trans('messages.error_not_found'));
            return back();
        }
        return view('backend.business.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id id
     *
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $this->business->updateStatus($id);
        return "OK";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }
}
