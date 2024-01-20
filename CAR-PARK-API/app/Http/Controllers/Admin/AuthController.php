<?php

namespace App\Http\Controllers\Admin;

use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //

    use HttpResponses;

    public function login(LoginRequest $request){

        $credentials = $request->only('email', 'password');

        if(!Auth::attempt($credentials)){
            return $this->error('',401,'Authentication Failed');
        }

        $user = Auth::user();

        if($user->status !== 'admin'){
            return $this->error('', 401, 'Access Denied');
        }

        return $this->success([
            'name' => $user->name,
            'type' => $user->status,
            'token' => $user->createToken('API Token of ' . $user->name)->plainTextToken,
        ]);


    }


}
