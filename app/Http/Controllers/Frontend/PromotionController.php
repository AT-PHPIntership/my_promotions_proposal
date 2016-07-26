<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\PromotionRepository as Promotion;
use App\Repositories\RatingRepository as Rating;

class PromotionController extends Controller
{
    /**
     * Promotion
     *
     * @var promotion
     */
    private $promotion;
    private $rating;

    /**
     * Function construct of PromotionController
     *
     * @param PromotionRepository $promotion promotion
     * @param RatingRepository    $rating    rating
     *
     * @return void
     */
    public function __construct(Promotion $promotion, Rating $rating)
    {
        $this->promotion = $promotion;
        $this->rating = $rating;
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

    /**
     * Get a listing of new promotion.
     *
     * @return \Illuminate\Http\Response
     */
    public function postRatingPromotion()
    {
        $ratings = $this->rating->groupBy('sum(score) as total_score, promotion_id', 'promotion_id', 'total_score')->take(config('define.paginate'));
        foreach ($ratings as $value) {
            $data[] = $this->promotion->find($value->promotion_id)->load('business', 'category');
        }
        return response()->json([
            'rating_promotions' => $data
        ], config('statuscode.ok'));
    }
}
