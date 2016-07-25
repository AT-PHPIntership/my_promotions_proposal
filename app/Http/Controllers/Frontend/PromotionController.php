<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repositories\PromotionRepository as Promotion;

class PromotionController extends Controller
{
    /**
     * Promotion
     *
     * @var promotion
     */
    private $promotion;

    /**
     * Function construct of PromotionController
     *
     * @param PromotionRepository $promotion promotion
     *
     * @return void
     */
    public function __construct(Promotion $promotion)
    {
        $this->promotion = $promotion;
    }
    
    /**
     * Display the specified resource.
     *
     * @param int $id id
     *
     * @return \Illuminate\Http\Response
     */
    public function postShow($id)
    {
        $promotions = $this->promotion->find($id);
        
        if (empty($promotions)) {
            return response()->json(
                ['error' => trans('messages.error_not_found')],
                config('statuscode.not_found')
            );
        }
        
    return response()->json($promotions, config('statuscode.ok'));
    }
    /**
     * Get a listing of new promotion.
     *
     * @return \Illuminate\Http\Response
     */
    public function postPromotion()
    {
        $promotions = $this->promotion->all()->take(config('define.paginate'));
        $promotions->load('business', 'category');
        return response()->json([
            'promotions' => $promotions
        ], config('statuscode.ok'));
    }
}
