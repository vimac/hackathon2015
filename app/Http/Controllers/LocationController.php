<?php
/**
 * Created by PhpStorm.
 * User: liuxinlong
 * Date: 15/10/24
 * Time: 18:15
 */

namespace App\Http\Controllers;


use App\Model\UserActivity;
use App\Model\UserLocation;
use Illuminate\Http\Request;

class LocationController extends Controller {

    /** 上传用户坐标地址
     * @param Request $req
     * @return \Illuminate\Http\JsonResponse
     */
    public function postUpload(Request $req) {
        $user = $this->fetchUserData();
        if ($user) {
            $userId = $user->id;
            $longitude = $req->get('longitude');
            $latitude = $req->get('latitude');
            $activityId = 1 ;

            $userLocation = UserLocation::where(['user_id' => $userId])->first();
            if ($userLocation) {
                $userLocation->latitude = $latitude;
                $userLocation->longitude = $longitude;
                $location = $userLocation->save();
            } else {
                $location = UserLocation::create([
                    'user_id' => $userId,
                    'longitude' => $longitude,
                    'latitude' => $latitude,
                    'activity_id' => $activityId,
                    'created_at' => time(),
                    'updated_at' => time()
                ]);
            }
            return response()->json([
                'code' => 0,
                'msg' => '上传地址成功',
                'data' => $location
            ]);
        } else {
            return response()->json([
                'code' => 10010,
                'msg' => '上传地址失败',
                'data' => []
            ]);
        }

    }

    /**
     * 获取用户坐标地址
     * @param Request $req
     * @return \Illuminate\Http\JsonResponse
     */
    public function getList(Request $req) {
        $activityId = $req->get('activity_id');

        $userLocation = UserLocation::where([ 'activity_id' => $activityId])->get()->toArray();
        if ($userLocation) {
            return response()->json([
                'code' => 0,
                'msg' => '上传地址成功',
                'data' => $userLocation
            ]);
        } else {
            return response()->json([
                'code' => 10010,
                'msg' => '获取数据失败',
                'data' => []
            ]);
        }
    }

}