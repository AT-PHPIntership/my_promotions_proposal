<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repositories\PromotionRepository as Promotion;

class CategoryController extends Controller
{
    /**
     * Promotion
     *
     * @var promotion
     */
    private $promotion;

    /**
     * Function construct of CategoryController
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
     * Get data when user click category.
     *
     * @param int $id id category
     *
     * @return \Illuminate\Http\Response
     */
    public function postCategory($id)
    {
        $promotions = $this->promotion->findBy('category_id', $id);

        if (count($promotions) == 0) {
            return response()->json(
                ['error' => trans('messages.error_not_found')],
                config('statuscode.not_found')
            );
        }

        return response()->json($promotions->load('business', 'category'), config('statuscode.ok'));
    }
}
