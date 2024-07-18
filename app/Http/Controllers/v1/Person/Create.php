<?php

namespace App\Http\Controllers\v1\Person;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Create extends Controller
{
    public function create(Request $request)
    {
        $uid = $request->attributes->get('uid');
        return response()->json([
            'message' => $uid,
            'user' => $request
        ]);
    }
}
