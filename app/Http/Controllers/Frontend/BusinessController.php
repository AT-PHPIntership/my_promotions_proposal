<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\BusinessRepository as Business;
use App\Repositories\RelationRepository as Promotion;
use Validator;
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
    private $promotion;


    /**
     * Function construct of BusinessController
     *
     * @param BusinessRepository $business  business
     * @param BusinessRepository $promotion promotion
     *
     * @return void
     */
    public function __construct(Business $business, Promotion $promotion)
    {
        $this->business = $business;
        $this->promotion = $promotion;
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
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:businesses,name',
            'email' => 'required|email',
            'phone' => 'required|numeric|min:9',
            'logo' => 'required|image',
            'description' => 'required',
            'city' => 'required',
            'county' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->all(), config('statuscode.unprocessable_entity'));
        }

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
                ], config('statuscode.internal_server_error'));
        }
        
        // Save cities
        $cities = array_unique($request->city);
        $resultCity = $result->cities()->sync($cities);

        if (!$resultCity) {
            return response()->json([
                'message' => trans('messages.error_update_profile')
            ], config('statuscode.internal_server_error'));
        }

        // Save counties
        $counties = array_unique($request->county);
        $resultCounty = $result->counties()->sync($counties);

        if (!$resultCounty) {
            return response()->json([
                'message' => trans('messages.error_update_profile')
            ], config('statuscode.internal_server_error'));
        }

        return response()->json([
            'message' => trans('messages.update_profile_successfull')
        ], config('statuscode.ok'));
    }

    /**
     * Store a newly created Bussiness.
     *
     * @param int $id show
     *
     * @return \Illuminate\Http\Response
     */
    public function postShowBusinessPromotion($id)
    {
        $business = $this->promotion->eagerLoadRelations(['business', 'category'], 'business', 'id', $id, config('define.paginate'));
        return response()->json($business, config('statuscode.ok'));
    }
}
