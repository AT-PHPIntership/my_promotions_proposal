<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Repositories\BusinessRepository as Business;
use App\Repositories\RelationRepository as Promotion;
use App\Repositories\PromotionRelationRepository as ManagerPromotion;
use App\Repositories\PromotionRepository as UpdatePromotion;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use Validator;
use Auth;

class BusinessManagerController extends Controller
{
    /**
     * Business, Promotion, ManagerPromotion, UpdatePromotion
     *
     * @var business
     * @var promotion
     * @var managerpromotion
     */
    private $business;
    private $promotion;
    private $managerpromotion;
    private $updatepromotion;

    /**
     * Function construct of BusinessController
     *
     * @param BusinessRepository          $business         business
     * @param RelationRepository          $promotion        promotion
     * @param PromotionRelationRepository $managerpromotion managerpromotion
     * @param PromotionRepository         $updatepromotion  updatepromotion
     *
     * @return void
     */
    public function __construct(Business $business, Promotion $promotion, ManagerPromotion $managerpromotion, UpdatePromotion $updatepromotion)
    {
        $this->business = $business;
        $this->promotion = $promotion;
        $this->managerpromotion = $managerpromotion;
        $this->updatepromotion = $updatepromotion;
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

    /**
     * Show list promotion with id business.
     *
     * @param business $business business
     *
     * @return \Illuminate\Http\Response
     */
    public function showPromotion($business)
    {
        $promotions = $this->promotion->eagerLoadRelations(['business', 'category'], 'business', 'id', $business, false);

        if (empty($promotions)) {
            return response()->json(
                ['error' => trans('messages.error_not_found')],
                config('statuscode.not_found')
            );
        }

        return Datatables::of($promotions)->make(true);
    }

    /**
     * Show list follow with id business.
     *
     * @param business $business business
     *
     * @return \Illuminate\Http\Response
     */
    public function showFollow($business)
    {
        $follows = $this->business->find($business)->followedUsers;

        if (empty($follows)) {
            return response()->json(
                ['error' => trans('messages.error_not_found')],
                config('statuscode.not_found')
            );
        }
        
        return Datatables::of($follows)->make(true);
    }

    /**
     * Store a newly created Promotion.
     *
     * @param \Illuminate\Http\Request $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required',
            'title' => 'required|min:5|unique:promotionsg,title',
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
        $result = $this->managerpromotion->create($data);

        if (!$result) {
            return respone()->json([
                'message' => trans('messages.error_create_promotion')
            ], config('statuscode.internal_server_error'));
        }
        return response()->json([
            'message' => trans('messages.create_promotion_successfull')
        ], config('statuscode.ok'));
    }

    /**
     * Show promotion with id .
     *
     * @param \Illuminate\Http\Request $promotion promotion
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($promotion)
    {
        $editPromotion = $this->managerpromotion->findWhere('business_id', Auth::user()->business->id, $promotion);

        if (empty($editPromotion)) {
            return response()->json([
                'error' => trans('messages.error_not_found')
            ], config('statuscode.not_found'));
        }

        return response()->json([
            $editPromotion
        ], config('statuscode.ok'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request   request
     * @param \Illuminate\Http\Request $promotion promotion
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $promotion)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required',
            'title' => 'required|min:5|unique:promotions,title,' . $promotion,
            'intro' => 'required|min:5',
            'content' => 'required|min:5',
            'expired_day' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->all(), config('statuscode.unprocessable_entity'));
        }
        $data = $request->except('_method', '_token');
        // Save image if has
        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $data['image'] = time() . '_' . $img->getClientOriginalName();
            $img->move(public_path(config('upload.user_path')), $data['image']);
        }
        $result = $this->updatepromotion->update($data, $promotion);

        if (!$result) {
            return respone()->json([
                'message' => trans('messages.error_update_promotion')
            ], config('statuscode.internal_server_error'));
        }
        return response()->json([
            'message' => trans('messages.update_promotion_successfull')
        ], config('statuscode.ok'));
    }
}
