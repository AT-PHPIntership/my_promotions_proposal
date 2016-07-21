<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\BusinessRepository as Business;
use File;
use Auth;

class BusinessController extends Controller
{
    /**
     * Business
     *
     * @var business
     */
    private $business;

    /**
     * Function construct of BusinessController
     *
     * @param BusinessRepository $business business
     *
     * @return void
     */
    public function __construct(Business $business)
    {
        $this->business = $business;
    }

    /**
     * Store a newly created Bussiness.
     *
     * @param \Illuminate\Http\Request $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function postRegister(Request $request)
    {
        $data = $request->all();

        // Save image if has
        if ($request->hasFile('logo')) {
            $img = $request->file('logo');
            $data['logo'] = time() . '_' . $img->getClientOriginalName();
            $img->move(public_path(config('upload.user_path')), $data['logo']);
        }

        $data['user_id'] = Auth::user()->id;

        // Save business & city
        $result = $this->business->create($data);
        $result->cities()->attach($request->city);

        if (!$result) {
            return response()->json([
                'message' => trans('messages.error_update_profile')
                ], 500);
        }
        
        // Save county
        $resultCounty = $result->counties()->sync($request->county);

        if (!$resultCounty) {
            return response()->json([
                'message' => trans('messages.error_update_profile')
            ], 500);
        }

        return response()->json([
            'message' => trans('messages.update_profile_successfull')
        ], 200);
    }
}
