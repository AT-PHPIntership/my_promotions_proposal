<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repositories\RatingRepository as Rating;
use App\Repositories\PromotionRepository as Promotion;
use App\Repositories\UserRepository as User;

class RatingController extends Controller
{
    /**
     * Promotion, Rating, User, Relation
     *
     * @var rating
     * @var promotion
     * @var user
     */
    private $promotion;
    private $rating;
    private $user;

    /**
     * Function construct of PromotionController
     *
     * @param PromotionRepository $promotion promotion
     * @param RatingRepository    $rating    rating
     * @param UserRepository      $user      user
     *
     * @return void
     */
    public function __construct(Promotion $promotion, Rating $rating, User $user)
    {
        $this->promotion = $promotion;
        $this->rating = $rating;
        $this->user = $user;
    }
    
    /**
     * Display the specified resource.
     *
     * @param function $id id
     *
     * @return \Illuminate\Http\Response
     */
    public function listRating($id)
    {
//       $ratings = $this->rating->all();
//       $ratings->load('user', 'promotion');
//       return response()->json([
//           'ratings' => $ratings
//               ], config('statuscode.ok'));
        
        $rating = $this->rating->find($id);
        if (empty($rating)) {
            return response()->json(
                ['error' => trans('messages.error_not_found')],
                config('statuscode.not_found')
            );
        }
        
        return response()->json($rating, config('statuscode.ok'));
    }
}
