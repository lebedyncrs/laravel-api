<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'location' => 'required|string',
            'role' => 'required|string|in:driver,cto',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => explode('@', $data['email'])[0],
            'email' => $data['email'],
            'password' => $data['password'],
            'location' => $data['location'],
            'role' => $data['role'],
        ]);
    }

    public function signUp(Request $request)
    {
        $validator = $this->validator($request->all());
        if ($validator->fails()) {
            return response($validator->errors(), 422);
        }
        $this->create($request->all());
        return $request->all();
    }
}
