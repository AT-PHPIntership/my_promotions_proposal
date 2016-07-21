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
     * @var businessCity
     * @var busiCounty
     */
    private $business;
    private $businessCity;
    private $businessCounty;

    /**
     * Function construct of BusinessController
     *
     * @param BusinessRepository        $business       business
     * @param BusinessCityReponsitory   $businessCity   businessCity
     * @param BusinessCountyReponsitory $businessCounty businessCounty
     *
     * @return void
     */
    public function __construct(Business $business, BusinessCity $businessCity, BusinessCounty $businessCounty)
    {
        $this->business = $business;
        $this->businessCity = $businessCity;
        $this->businessCounty = $businessCounty;
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

        // Save business
        $result = $this->business->create($data);

        if (!$result) {
            return response()->json([
                'message' => trans('messages.error_update_profile')
                ], 500);
        }
        
        // Save city and counties
        $store = $this->storeCityCounty($request->city, $request->county, $result->id);

        if (!$store) {
            return response()->json([
                'message' => trans('messages.error_update_profile')
                ], 500);
        }

        return response()->json([
            'message' => trans('messages.update_profile_successfull')
            ], 200);
    }

    /**
     * Store a newly created city and counties.
     *
     * @param Array   $city     city
     * @param Array   $counties counties
     * @param Integer $business business
     *
     * @return \Illuminate\Http\Response
     */
    public function storeCityCounty($city, $counties, $business)
    {
        // save city
        $resultCity = $this->businessCity->create(['business_id' => $business, 'city_id' => $city]);

        if (!$resultCity) {
            return false;
        }

        // save counties
        foreach ($counties as $county) {
            $resultCounty = $this->businessCounty->create(['business_id' => $business, 'county_id' => $county]);

            if (!$resultCounty) {
                return false;
            }
        }

        return true;
    }
}
