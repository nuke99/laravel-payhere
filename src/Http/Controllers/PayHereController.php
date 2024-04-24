<?php

namespace Dasundev\PayHere\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PayHereController extends Controller
{
    /**
     * Handle PayHere return request.
     *
     * @return View
     */
    public function handleReturn(Request $request)
    {
        if (! $request->hasValidSignatureWhileIgnoring(['order_id'])) {
            abort(401);
        }

        return view('payhere::return');
    }
}
