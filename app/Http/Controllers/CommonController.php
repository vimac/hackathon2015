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

class CommonController extends Controller{

    public function getQrcode(Request $req) {
        $qrCode = new QrCode();
        $qrCode
            ->setText("Life is too short to be generating QR codes")
            ->setSize(300)
            ->setPadding(10)
            ->setErrorCorrection('high')
            ->setForegroundColor(array('r' => 0, 'g' => 0, 'b' => 0, 'a' => 0))
            ->setBackgroundColor(array('r' => 255, 'g' => 255, 'b' => 255, 'a' => 0))
            ->setLabel('My label')
            ->setLabelFontSize(16)
            ->render()
        ;
        return $qrCode;

    }

}