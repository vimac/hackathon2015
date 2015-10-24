<?php

namespace App\Http\Controllers;

use App\Model\User;
use Illuminate\Http\Request;
use App\Http\Requests;

class UserController extends Controller
{
    public function postLogin(Request $req)
    {
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
        return response()
                ->json([
                    'code' => 0,
                    'msg' => 'success',
                    'data' => []
                ])
                ->withCookie('token', $user->token);
    }

    public function postLogout()
    {
        return response()->json()->withCookie('token');
    }

    public function getTelephone(Request $req)
    {
        $telephone = $req->get('telephone');

        $user = User::where('telephone', $telephone)->first();
        if ($user) {
            return response()
                ->json([
                    'code' => 0,
                    'msg' => 'success',
                    'data' => ['signed' => 1]
                ]);
        } else {
            return response()
                ->json([
                    'code' => 0,
                    'msg' => 'success',
                    'data' => ['signed' => 0]
                ]);
        }
    }

}
