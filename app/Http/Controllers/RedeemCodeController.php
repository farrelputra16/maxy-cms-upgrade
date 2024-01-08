<?php

namespace App\Http\Controllers;

use App\Models\RedeemCode;
use Illuminate\Http\Request;

class RedeemCodeController extends Controller
{
    function getRedeemCode()
    {
        $redeemCodes = RedeemCode::all();
        return view('redeem_code.index', compact('redeemCodes'));
    }
}
