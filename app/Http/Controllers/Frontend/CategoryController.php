<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repositories\PromotionRepository as Promotion;
use App\Models\Promotion as MD;

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
        $promotions = MD::with('business', 'category')
        ->whereHas('category', function($query) use ($id) {
            $query->where('id', $id);
        })->paginate(2);

        if (count($promotions) == 0) {
            return response()->json(
                ['error' => trans('messages.error_not_found')],
                config('statuscode.not_found')
            );
        }
        
        return response()->json($promotions, config('statuscode.ok'));

        // $promotions = $this->promotion->findBy('category_id', $id, ['*'], 2);

        // if (count($promotions) == 0) {
        //     return response()->json(
        //         ['error' => trans('messages.error_not_found')],
        //         config('statuscode.not_found')
        //     );
        // }

        // return response()->json([
        //     'paginate' => $promotions,
        //     'data' => $promotions->load('business', 'category')
        // ], config('statuscode.ok'));
    }
}
