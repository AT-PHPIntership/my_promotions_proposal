<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Repositories\BusinessRepository as Business;
use App\Repositories\PromotionRepository as Promotion;
use App\Http\Controllers\Controller;
use Validator;
use Auth;

class BusinessManagerController extends Controller
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
     * @param BusinessRepository $business business
     *
     * @return void
     */
    public function __construct(Business $business, Promotion $promotion)
    {
        $this->business = $business;
        $this->promotion = $promotion;
    }
    
     /**
     * Get a listing of new Business.
     *
     * @param BusinessRepository $id id
     *
     * @return \Illuminate\Http\Response
     */
    public function showBusiness($id)
    {
        $business = $this->business->find($id);

        if (empty($business)) {
            return response()->json(
                ['error' => trans('messages.error_not_found')],
                config('statuscode.not_found')
            );
        }

        return response()->json($business, config('statuscode.ok'));
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required',
            'title' => 'required|min:5',
            'intro' => 'required|min:5',
            'content' => 'required|min:5',
            'image' => 'required|image',
            'expired_day' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors()->all(), config('statuscode.unprocessable_entity'));
        }

        $data = $request->all();
        $data['business_id'] = Auth::user()->business->id;

        // Save image if has
        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $data['image'] = time() . '_' . $img->getClientOriginalName();
            $img->move(public_path(config('upload.user_path')), $data['image']);
        }

        $result = $this->promotion->create($data);

        if (!$result) {
            return respone()->json([
                'message' => trans('messages.error_create_promotion')
            ], config('statuscode.internal_server_error'));
        }

        return response()->json([
            'message' => trans('messages.create_promotion_successfull')
        ], config('statuscode.ok'));
    }

}
