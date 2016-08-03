<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Repositories\BusinessRepository as Business;
use App\Repositories\RelationRepository as Promotion;
use App\Repositories\PromotionRepository as ManagerPromotion;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use Validator;
use Auth;

class BusinessManagerController extends Controller
{
    /**
     * Business, Promotion, ManagerPromotion
     *
     * @var business
     * @var promotion
     */
    private $business;
    private $promotion;
    private $managerpromotion;

    /**
     * Function construct of BusinessController
     *
     * @param BusinessRepository $business  business
     * @param RelationRepository $promotion promotion
     * @param PromotionRepository $managerpromotion managerpromotion
     *
     * @return void
     */
    public function __construct(Business $business, Promotion $promotion, ManagerPromotion $managerpromotion)
    {
        $this->business = $business;
        $this->promotion = $promotion;
        $this->managerpromotion = $managerpromotion;
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

    public function edit($promotion)
    {
        $editPromotion = $this->managerpromotion->find($promotion);

        if(empty($editPromotion)){
            return response()->json([
                'error' => trans('messages.error_not_found')
            ], config('statuscode.not_found'));
        }

        return response()->json([
            $editPromotion
        ], config('statuscode.ok'));
    }

    public function update()
    {

    }
}
