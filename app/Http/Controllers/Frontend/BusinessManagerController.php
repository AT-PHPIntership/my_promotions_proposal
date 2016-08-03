<?php

namespace App\Http\Controllers\Frontend;

use App\Repositories\BusinessRepository as Business;
use App\Repositories\RelationRepository as Promotion;
use App\Repositories\PromotionRepository as PromotionRepo;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;

class BusinessManagerController extends Controller
{
    /**
     * Business, Promotion, PromotionRepo
     *
     * @var business
     * @var promotion
     * @var promotionRepo
     */
    private $business;
    private $promotion;
    private $promotionRepo;

    /**
     * Function construct of BusinessController
     *
     * @param BusinessRepository  $business      business
     * @param RelationRepository  $promotion     promotion
     * @param PromotionRepository $promotionRepo promotionRepo
     *
     * @return void
     */
    public function __construct(Business $business, Promotion $promotion, PromotionRepo $promotionRepo)
    {
        $this->business = $business;
        $this->promotion = $promotion;
        $this->promotionRepo = $promotionRepo;
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
     * Delete promotion.
     *
     * @param promotion $promotion promotion
     *
     * @return \Illuminate\Http\Response
     */
    public function destroyPromotion($promotion)
    {
        $result = $this->promotionRepo->delete($promotion);

        if (empty($result)) {
            return response()->json(
                ['error' => trans('messages.error_delete_promotion')],
                config('statuscode.not_found')
            );
        }
        
        return response()->json(['message' => trans('messages.delete_promotion_successfull')], config('statuscode.ok'));
    }
}
