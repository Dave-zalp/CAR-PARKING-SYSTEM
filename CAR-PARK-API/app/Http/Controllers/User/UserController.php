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
      $validated =   $request->validated();

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'Phone' => $validated['phone'],
            'Address1' => $validated['Address1'],
            'Address2' => $validated['Address2'],
            'kin_name' => $validated['kin_name'],
            'kin_number' => $validated['kin_phone'],
            'kin_email' => $validated['kin_email'],
            'kin_address' => $validated['kin_address'],
            'password' => Hash::make($validated['password'])
        ]);

        $user_agent = $request->userAgent();


        return $this->success([
            'user' => $user,
            'token' => $user->createToken($user_agent)->plainTextToken,
        ]);
    }

    public function login(LoginRequest $request){

       $request->validated();
        $credentials = $request->only('email', 'password');
        if(!Auth::attempt($credentials)){
            return $this->error('',401,'Credentials do not match !!');
        }

            $user = User::where('email', $request->email)->first();
            $user_agent = $request->userAgent();

            return $this->success([
                'user' => $user,
                'token' => $user->createToken($user_agent)->plainTextToken,
            ],'Login Successful');

    }
}
