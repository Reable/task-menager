<?php

namespace App\Http\Middleware;

use App\Models\Users;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UsersMiddleware
{
    public function handle(Request $request, Closure $next)
    {

        $token = $request->header('Authorization');

        if(is_null($token)){
            return response()->json((object)[
                "data" => (object)[
                    "error" => (object)[
                        "message" => "You not auth"
                    ]
                ]
            ],401);
        }

        $token = explode(" ", $token)[1];

        if($user = Users::where('token', $token)->first()){
            $request->user_id = $user->id;
            return $next($request);
        }

        return response()->json((object)[
            "data" => (object)[
                "error" => (object)[
                    "message" => "You not auth"
                ]
            ]
        ],401);
    }
}
