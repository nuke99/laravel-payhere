<?php

namespace Dasundev\PayHere\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PayHereController extends Controller
{
    public function return(Request $request)
    {
        if (! $request->hasValidSignatureWhileIgnoring(['order_id'])) {
            abort(401);
        }

        return view('payhere::return');
    }
}