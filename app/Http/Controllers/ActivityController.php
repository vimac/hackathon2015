<?php

namespace App\Http\Controllers;

use App\Model\User;
use App\Model\UserActivity;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ActivityController extends Controller
{

    public function postJoin(Request $req)
    {
        $activityId = $req->get('activity_id');
        $telephone = $req->get('telephone');
        $name = $req->get('name');

        $user = $this->fetchUserData();

        if (!$user) {
            $telephone = $req->get('telephone');
            $name = $req->get('name');

            if (empty($telephone)) {
                return response()->json([
                    'code' => 403,
                    'msg' => '手机号不能为空',
                ]);
            }

            $user = User::where('telephone', $telephone)->first();

            if (!$user) {
                if (empty($name)) {
                    return response()->json([
                        'code' => 403,
                        'msg' => '用户名不能为空',
                    ]);
                }

                $user = User::create([
                    'name' => $name,
                    'telephone' => $telephone,
                    'token' => uniqid('', true)
                ]);
            }
        }

        $userActivity = UserActivity::where(['user_id' => $user->id, 'activity_id' => $activityId])->first();

        if (!$userActivity) {
            $userActivity = UserActivity::create([
                'user_id' => $user->id,
                'activity_id' => $activityId,
                'status' => 0
            ]);
        }

        if ($userActivity) {
            return response()->json([
                'code' => 0,
                'msg' => 'ok',
                'data' => []
            ])->withCookie('token', $user->token);
        } else {
            return response()->json([
                'code' => 0,
                'msg' => 'ok',
                'data' => []
            ])->withCookie('token', $user->token);
        }
    }

}
