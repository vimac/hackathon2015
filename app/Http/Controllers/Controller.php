<?php

namespace App\Http\Controllers;

use App\Model\User;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

abstract class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function fetchUserData()
    {
        $token = request()->cookie('token');
        $user = User::where('token', '562b4ff3bc1485.91214040')->first();
        return $user;
    }

}
