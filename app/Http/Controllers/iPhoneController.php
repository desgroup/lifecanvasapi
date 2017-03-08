<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class iPhoneController extends Controller
{
    public function login(Request $request)
    {
        if ($request->input('username') == 'cheddar' And $request->input('password') == 'cheese' )
        {
            return 'true';
        }

        return 'false';
    }
}
