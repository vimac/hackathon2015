<?php
/**
 * Created by PhpStorm.
 * User: liuxinlong
 * Date: 15/10/24
 * Time: 23:04
 */

namespace App\Http\Controllers;



use Endroid\QrCode\QrCode;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CommonController extends Controller{

    public function getQrcode(Request $req) {
        return response()->json([
            'code' => 0,
            'msg' => 'ok',
            'data' => "/common/qr"
        ]);
    }


    public function getQr(Request $req) {
        $qrCode = new QrCode();
        $qrCode
            ->setText("http://10.0.20.55:8001/index/wel#/sys/activities/one")
            ->setSize(300)
            ->setPadding(10)
            ->setErrorCorrection('high')
            ->setForegroundColor(array('r' => 0, 'g' => 0, 'b' => 0, 'a' => 0))
            ->setBackgroundColor(array('r' => 255, 'g' => 255, 'b' => 255, 'a' => 0));

        $response = new Response($qrCode->get(), 200);
        $response->header('content-type', 'image/png');
        return $response;
    }
}