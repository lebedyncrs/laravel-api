<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function signIn(Request $request)
    {
        $validator = $this->validator($request->all());
        $user = User::whereEmail($request->get('email'))->first();

        if ($validator->fails()) {
            return response($validator->errors(), 422);
        }
        if (is_null($user) || !$user->isPasswordValid($request->get('password'))) {
            return response([], 401);
        }
        $user->generateToken();
        $user->save();
        return response(['token' => $user->remember_token, 'user' => $user]);
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6',
        ]);
    }
}
