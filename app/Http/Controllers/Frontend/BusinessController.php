<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\BusinessRepository as Business;
use App\Repositories\CategoryRelationRepository as Promotion;
use App\Repositories\RelationUserRepository as User;
use App\Repositories\RelationFollowRepository as Follow;
use Validator;
use File;
use Auth;

class BusinessController extends Controller
{
    /**
     * Business, Promotion, User, Follow
     *
     * @var business, promotion, user, follow
     */
    private $business;
    private $promotion;
    private $user;
    private $follow;


    /**
     * Function construct of BusinessController
     *
     * @param BusinessRepository       $business  business
     * @param RelationRepository       $promotion promotion
     * @param RelationUserRepository   $user      user
     * @param RelationFollowRepository $follow    follow
     *
     * @return void
     */
    public function __construct(Business $business, Promotion $promotion, User $user, Follow $follow)
    {
        $this->business  = $business;
        $this->promotion = $promotion;
        $this->user      = $user;
        $this->follow    = $follow;
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
        $business = $this->promotion->eagerLoadRelations(['business', 'category'], 'business', 'id', $id, true, config('define.paginate'));
        $totalFollow = $this->follow->count('business_id', $id);
        if ($business->count() == 0) {
            return response()->json(
                ['error' => trans('messages.error_not_found')],
                config('statuscode.not_found')
            );
        }

        if (Auth::guard('web')->check()) {
            $follow = $this->user->checkFollowed('followedBusinesses', Auth::user()->id, $id);
            return response()->json([
                'data'         => $business,
                'followed'     => $follow,
                'total_follow' => $totalFollow
            ], config('statuscode.ok'));
        }

        return response()->json([
            'data'         => $business,
            'total_follow' => $totalFollow
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
            $totalFollow = $this->follow->count('business_id', $business);
            if ($result == 0) {
                return response()->json(
                    ['error' => trans('messages.error_not_unfollow')],
                    config('statuscode.internal_server_error')
                );
            }
            return response()->json(['result' => trans('messages.unfollow'),'total_follow' => $totalFollow], config('statuscode.ok'));
        }
        
        // follow
        $result = $this->user->attachFollowed($user, $business);
        $totalFollow = $this->follow->count('business_id', $business);
        return response()->json(['result' => trans('messages.follow'), 'total_follow' => $totalFollow], config('statuscode.ok'));
    }
}
