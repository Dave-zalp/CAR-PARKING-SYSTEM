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
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
           $user = Auth::user();
           if($user->status === 'admin'){
                 return $this->success([
                    'name' => $user->name,
                    'type' => $user->status,
                    'token' => $user->createToken('API Token of '.$user->name)->plainTextToken,
                 ]);
           }
           else{
                return $this->error('',401,'Authentication Failed');
           }

        }
        else{
            return $this->error('',401,'Authentication Failed');
        }
    }

    public function CreateAdmin(){

    }

}
