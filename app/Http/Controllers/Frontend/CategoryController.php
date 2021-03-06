<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repositories\RelationRepository as Promotion;

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
     * @param RelationRepository $promotion promotion
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
        $promotions = $this->promotion->eagerLoadRelations(['business', 'category'], 'category', 'id', $id, true, config('define.paginate'));

        if (count($promotions) == 0) {
            return response()->json(
                ['error' => trans('messages.error_not_found')],
                config('statuscode.not_found')
            );
        }
        
        return response()->json($promotions, config('statuscode.ok'));
    }
}
