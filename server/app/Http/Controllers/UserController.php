<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UserController extends Controller
{

    public function login(Request $request): \Illuminate\Http\JsonResponse
    {
        $validate = Validator::make($request->all(), [
            "login" => "required | string",
            "password" =>  "required | string"
        ]);

        if($validate->fails()){
            return response()->json((object)[
                "errors" => $validate->errors()->toArray()
            ],412);
        }

        $user = Users::where("login", $request->input('login'))->first();

        if(!$user){
            return response()->json((object)[
                "error" => (object)[
                    "message" => "Not found user"
                ]
            ], 400);
        }

        if(!Hash::check($request->input('password'),$user->password)){
            return response()->json((object)[
                "error" => (object)[
                    "message" => "Error password"
                ]
            ], 400);
        }

        $user->token = Str::random(100);
        $user->save();

        return response()->json((object)[
            "token" => $user->token
        ], 200);
    }

    public function register(Request $request){
        $validate = Validator::make($request->all(), [
            "login" => "required | string",
            "password" =>  "required | string"
        ]);

        if($validate->fails()){
            return response()->json((object)[
                "errors" => $validate->errors()->toArray()
            ],412);
        }

        if($user = Users::where("login", $request->input('login'))->first()){
            return response()->json((object)[
                "error" => (object)[
                    "message" => "User already exists"
                ]
            ], 400);
        }

        $user = new Users();

        $user->login = $request->input("login");
        $user->password = Hash::make($request->input("password"));
        $user->token = Str::random(100);

        $user->save();

        return response()->json((object)[
            "token" => $user->token
        ], 200);
    }
}
