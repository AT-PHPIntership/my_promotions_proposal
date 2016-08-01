<?php

namespace App\Http\Controllers\Frontend;

use App\Repositories\BusinessRepository as Business;
use App\Repositories\CategoryRelationRepository as Promotion;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;

class BusinessManagerController extends Controller
{
    /**
     * Business, Promotion
     *
     * @var business
     * @var promotion
     */
    private $business;
    private $promotion;

    /**
     * Function construct of BusinessController
     *
     * @param BusinessRepository $business business
     * @param CategoryRelationRepository $promotion promotion
     *
     * @return void
     */
    public function __construct(Business $business, Promotion $promotion)
    {
        $this->business  = $business;
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
        return Datatables::of($promotions)->make(true);
    }
}
