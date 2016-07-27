<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repositories\PromotionRepository as Promotion;
use App\Repositories\RelationRepository as Relation;
use App\Repositories\RatingRepository as Rating;
use App\Repositories\UserRepository as User;
use Auth;
use App\Models\Promotion as Md;

class PromotionController extends Controller
{
    /**
     * Promotion, Rating, User, Relation
     *
     * @var promotion
     * @var rating
     * @var user
     * @var relation
     */
    private $promotion;
    private $rating;
    private $user;
    private $relation;

    /**
     * Function construct of PromotionController
     *
     * @param PromotionRepository $promotion promotion
     * @param RatingRepository    $rating    rating
     * @param UserRepository      $user      user
     * @param RelationRepository  $relation  relation
     *
     * @return void
     */
    public function __construct(Promotion $promotion, Rating $rating, User $user, Relation $relation)
    {
        $this->promotion = $promotion;
        $this->rating = $rating;
        $this->user = $user;
        $this->relation = $relation;
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

    /**
     * Get a list of business get user follows.
     *
     * @return \Illuminate\Http\Response
     */
    public function postFollowPromotion()
    {
        $follows = $this->user->find(Auth::user()->id)->followedBusinesses->load('promotions');
        if (empty($follows)) {
            return response()->json(
                ['error' => trans('messages.error_not_found')],
                config('statuscode.not_found')
            );
        }
        return response()->json($follows, config('statuscode.ok'));
    }

    /**
     * Search promotion.
     *
     * @param info $info info
     *
     * @return \Illuminate\Http\Response
     */
    public function postSearch($info)
    {
        $promotions = $this->relation->search(['business', 'category'], 'business', 'title', 'name', "%$info%", 'like', config('define.paginate'));

        if (count($promotions) == 0) {
            return response()->json(
                ['error' => trans('messages.error_not_found')],
                config('statuscode.not_found')
            );
        }
        
        return response()->json($promotions, config('statuscode.ok'));
    }
}
