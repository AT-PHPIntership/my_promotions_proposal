<?php

namespace App\Http\Controllers\Frontend;

use App\Repositories\BusinessRepository as Business;
use App\Http\Controllers\Controller;

class BusinessManagerController extends Controller
{
    /**
     * Business
     *
     * @var business
     */
    private $business;

    /**
     * Function construct of BusinessController
     *
     * @param BusinessRepository $business business
     *
     * @return void
     */
    public function __construct(Business $business)
    {
        $this->business = $business;
    }
    
     /**
     * Get a listing of new Business.
     *
     * @param BusinessRepository $id id
     *
     * @return \Illuminate\Http\Response
     */
    public function showBusiness($id)
    {
        $business = $this->business->find($id);
        
        if (empty($business)) {
            return response()->json(
                ['error' => trans('messages.error_not_found')],
                config('statuscode.not_found')
            );
        }
        
        return response()->json($business, config('statuscode.ok'));
    }
}
