<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\PromotionRatingRepository as PromotionRating;
use App\Repositories\RatingRepository as Rating;

class RatingController extends Controller
{
    /**
     * Promotion Rating
     *
     * @var rating
     */
    private $rating;


    /**
     * Function construct of RatingController
     *
     * @param PromotionRatingRepository $promotionrating promotionrating
     * @param RatingRepository          $rating          rating
     *
     * @return void
     */
    public function __construct(PromotionRating $promotionrating, Rating $rating)
    {
        $this->promotonrating = $promotionrating;
        $this->rating = $rating;
    }

    /**
     * Display the specified resource.
     *
     * @param int $id id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reviews = $this->promotonrating->findBy('promotion_id', $id)->load('user');
        $totalRating = $this->rating->groupByHaving('sum(score) as total_score, promotion_id', 'promotion_id', 'promotion_id', $id);
        return response()->json(["reviews" => $reviews, 'total_rating' => $totalRating], config('statuscode.ok'));
    }
}
