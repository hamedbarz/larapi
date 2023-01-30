<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\Api\v1\User as UserResoure;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function login(Request $request){

        $validData = $this->validate($request, [
            'email' => 'required|email|exists:users',
            'password' => 'required|min:6',
        ]);

        if(! auth()->attempt($validData)){
            return response([
                'data' => 'اطلاعات ارسالی اشتباه است.',
                'status' => 'error',
            ], 403);
        }else{
            return new UserResoure(auth()->user());
        }

    }

    public function register(Request $request){

        $validData = $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $user = User::create([
            'name' => $validData['name'],
            'email' => $validData['email'],
            'password' => bcrypt($validData['password']),
            'api_token' => Str::random(60),
        ]);

        return new UserResoure($user);
    }
}
