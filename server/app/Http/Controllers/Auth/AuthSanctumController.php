<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthSanctumController extends Controller
{
    public function authenticate(Request $request)
    {
        $token = $request->user()->createToken('channel:auth');

        return response(['token' => $token->plainTextToken]);
    }
}
