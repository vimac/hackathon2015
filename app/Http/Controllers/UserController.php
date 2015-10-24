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
            $phone = $req->get('phone');
            $name = $req->get('name');

            if (empty($phone)) {
                return response()->json([
                    'code' => 403,
                    'msg' => '手机号不能为空',
                ]);
            }

            $user = User::where('telephone', $phone)->first();

            if (!$user) {
                if (empty($name)) {
                    return response()->json([
                        'code' => 403,
                        'msg' => '用户名不能为空',
                    ]);
                }
                $user = User::create([
                    'name' => $name,
                    'telephone' => $phone,
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

}
