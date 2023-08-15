<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Traits\HttpResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    use HttpResponse;
    public function register(RegisterRequest $request){
        $request->validated($request->all());

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'Address1' => $request->Address1,
            'Address2' => $request->Address2,
            'kin_name' => $request->kin_name,
            'kin_phone' => $request->kin_phone,
            'kin_email' => $request->kin_email,
            'kin_address' => $request->kin_address,
            'password' => Hash::make($request->password)
        ]);

        return $this->success([
            'user' => $user,
            ''
        ])
    }
}
