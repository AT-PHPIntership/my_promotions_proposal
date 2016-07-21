<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\BusinessRepository as Business;
use App\Repositories\BusinessCityReponsitory as BusinessCity;
use App\Repositories\BusinessCountyReponsitory as BusinessCounty;
use File;
use Auth;

class BusinessController extends Controller
{
	/**
     * Business, BusinessCity, BusinessCounty
     *
     * @var business
     * @var business_city
     * @var business_county
     */
    private $business;
    private $business_city;
    private $business_county;

    /**
     * Function construct of BusinessController
     *
     * @param CityRepository $city city
     * @param CountyRepository $county county
     *
     * @return void
     */
    public function __construct(Business $business, BusinessCity $business_city, BusinessCounty $business_county)
    {
        $this->business = $business;
        $this->business_city = $business_city;
        $this->business_county = $business_county;
    }

    public function getRegister()
    {
    	return view('frontend.business.register');
    }

    public function postRegister(Request $request)
    {
        $data = $request->all();

        if ($request->hasFile('logo')) {
            $img = $request->file('logo');
            $data['logo'] = time() . '_' . $img->getClientOriginalName();
            $img->move(public_path(config('upload.user_path')), $data['logo']);
        }

        $data['user_id'] = Auth::user()->id;

        $result = $this->business->create($data);

        if (!$result) {
            return response()->json([
                'message' => trans('messages.error_update_profile')
            ], 500);
        }

        $city = [
            'business_id' => $result->id,
            'city_id' => $request->city,
        ];
        
        $result_city = $this->business_city->create($city);

        foreach ($request->county as $key => $value) {
            $this->business_county->create(['business_id' => $result->id, 'county_id' => $value]);
        }

        return response()->json([
            'message' => trans('messages.update_profile_successfull')
        ], 200);
    }
}
