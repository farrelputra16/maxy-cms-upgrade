<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PrakerjaRedeemCode;

class PrakerjaController extends Controller
{
    function getRedeemCode(){
        $redeemcode = PrakerjaRedeemCode::all();
        // return dd($redeemcode);
        return view('redeem_code.index', ['redeemcode' => $redeemcode]);
    }
}
