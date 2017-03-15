<?php

namespace App\Http\Controllers\Frontend;

use App\Repositories\PromotionRepository as Promotion;
use App\Repositories\UserRepository as User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\PromotionRatingRepository as PromotionRating;
use App\Repositories\RatingRepository as Rating;
use Validator;
use Yajra\Datatables\Facades\Datatables;
use Auth;

class RatingController extends Controller
{
    /**
     * Promotion, Rating, User, Promotion Rating
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
     * @param PromotionRepository       $promotion       promotion
     * @param RatingRepository          $rating          rating
     * @param UserRepository            $user            user
     * @param PromotionRatingRepository $promotionrating promotionrating
     *
     * @return void
     */
    public function __construct(Promotion $promotion, Rating $rating, User $user, PromotionRating $promotionrating)
    {
        $this->promotion = $promotion;
        $this->rating = $rating;
        $this->user = $user;
        $this->promotonrating = $promotionrating;
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

    /**
     * Show the form for creating a new resource.
     *
     * @param \Illuminate\Http\Request $request request
     * @param int                      $id      id
     *
     * @return \Illuminate\Http\Response
     */
    public function postRating(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'score' => 'required',
            'content' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->all(), config('statuscode.unprocessable_entity'));
        }
        $data = $request->except('_token');
        $data['user_id'] = Auth::user()->id;
        $data['promotion_id'] = $id;
        $this->promotonrating->create($data);
        return response()->json([
            'message' => trans('messages.rating_successfull'),
        ], config('statuscode.ok'));
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
        $rating = \App\Models\Rating::with(['promotion', 'user'])->whereHas('promotion', function ($q) use ($id) {
            $q->where('business_id', $id);
        })->get();
        if (empty($rating)) {
            return response()->json(
                ['error' => trans('messages.error_not_found')],
                config('statuscode.not_found')
            );
        }
        
        return Datatables::of($rating)->make(true);
    }
}
