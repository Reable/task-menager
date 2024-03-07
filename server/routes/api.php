<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(["prefix" => "auth"], function (){
    Route::post("login", [UserController::class, "login"]);
    Route::post("register", [UserController::class, "register"]);
});

Route::group(["middleware" => "user", "prefix" => "task"], function (){
    Route::get("/", [TaskController::class, "getAll"]);
    Route::post("/", [TaskController::class, "create"]);
    Route::post("/{id}", [TaskController::class, "update"]);
    Route::delete("/{id}", [TaskController::class, "delete"]);
});
