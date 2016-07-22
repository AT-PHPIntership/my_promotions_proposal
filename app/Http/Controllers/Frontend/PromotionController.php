<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
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
