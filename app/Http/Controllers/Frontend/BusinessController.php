<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\BusinessRepository as Business;
use App\Repositories\RelationRepository as Promotion;
use App\Repositories\RelationUserRepository as User;
use Validator;
use File;
use Auth;

class BusinessController extends Controller
{
    /**
     * Business, Promotion, User
     *
     * @var business, promotion, user
     */
    private $business;
    private $promotion;
    private $user;


    /**
     * Function construct of BusinessController
     *
     * @param BusinessRepository $business  business
     * @param RelationRepository $promotion promotion
     * @param UserRepository     $user      user
     *
     * @return void
     */
    public function __construct(Business $business, Promotion $promotion, User $user)
    {
        $this->business = $business;
        $this->promotion = $promotion;
        $this->user = $user;
    }

    /**
     * Store a newly created Bussiness.
     *
     * @param \Illuminate\Http\Request $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function postRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:businesses,name',
            'email' => 'required|email',
            'phone' => 'required|numeric|min:9',
            'logo' => 'required|image',
            'description' => 'required',
            'city' => 'required',
            'county' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->all(), config('statuscode.unprocessable_entity'));
        }

        $data = $request->all();

        // Save image if has
        if ($request->hasFile('logo')) {
            $img = $request->file('logo');
            $data['logo'] = time() . '_' . $img->getClientOriginalName();
            $img->move(public_path(config('upload.user_path')), $data['logo']);
        }

        $data['user_id'] = Auth::user()->id;

        // Save business
        $result = $this->business->create($data);

        if (!$result) {
            return response()->json([
                'message' => trans('messages.error_update_profile')
                ], config('statuscode.internal_server_error'));
        }
        
        // Save cities
        $cities = array_unique($request->city);
        $resultCity = $result->cities()->sync($cities);

        if (!$resultCity) {
            return response()->json([
                'message' => trans('messages.error_update_profile')
            ], config('statuscode.internal_server_error'));
        }

        // Save counties
        $counties = array_unique($request->county);
        $resultCounty = $result->counties()->sync($counties);

        if (!$resultCounty) {
            return response()->json([
                'message' => trans('messages.error_update_profile')
            ], config('statuscode.internal_server_error'));
        }

        return response()->json([
            'message' => trans('messages.update_profile_successfull')
        ], config('statuscode.ok'));
    }

    /**
     * Show Bussiness.
     *
     * @param int $id show
     *
     * @return \Illuminate\Http\Response
     */
    public function postShowBusinessPromotion($id)
    {
        $business = $this->promotion->eagerLoadRelations(['business', 'category'], 'business', 'id', $id, config('define.paginate'));
        $follow = $this->user->checkFollowed('followedBusinesses', Auth::user()->id, $id);

        if ($business->count() == 0) {
            return response()->json(
                ['error' => trans('messages.error_not_found')],
                config('statuscode.not_found')
            );
        }
        return response()->json([
            'data'         => $business,
            'followed'     => $follow
        ], config('statuscode.ok'));
    }

    /**
     * Update follow
     *
     * @param \Illuminate\Http\Request $request  request
     * @param int                      $user     user     id
     * @param int                      $business business id
     *
     * @return \Illuminate\Http\Response
     */
    public function updateFollow(Request $request, $user, $business)
    {
        // unfollow
        if ($request->follow === 'true') {
            $result = $this->user->detachFollowed($user, $business);
            if ($result == 0) {
                return response()->json(
                    ['error' => trans('messages.error_not_unfollow')],
                    config('statuscode.internal_server_error')
                );
            }
            return response()->json(trans('messages.unfollow'), config('statuscode.ok'));
        }
        
        // follow
        $result = $this->user->attachFollowed($user, $business);
        return response()->json(trans('messages.follow'), config('statuscode.ok'));
    }
}
