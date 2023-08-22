<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;

class UserController extends Controller
{
    use HttpResponses;
    public function register(RegisterRequest $request){
        $request->validated($request->all());

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'Phone' => $request->phone,
            'Address1' => $request->Address1,
            'Address2' => $request->Address2,
            'kin_name' => $request->kin_name,
            'kin_number' => $request->kin_phone,
            'kin_email' => $request->kin_email,
            'kin_address' => $request->kin_address,
            'password' => Hash::make($request->password)
        ]);



        return $this->success([
            'user' => $user,
            'token' => $user->createToken('API Token of '.$user->name)->plainTextToken,
        ]);
    }

    public function login(LoginRequest $request){
        $request->validated($request->all());
        if(!Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return $this->error('',401,'Credentials do not match !!');
        }
        else{
            $user = User::where('email',$request->email)->first();
            return $this->success([
                'user' => $user,
                'token' => $user->createToken('API Token of '.$user->name)->plainTextToken,
            ],'Login Successful');
        }
    }
}
