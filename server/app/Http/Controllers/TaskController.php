<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{

    public function getAll(Request $request){
        $tasks = Tasks::where('user_id', $request->user_id)->get()->toArray();

        return array_reverse($tasks);
    }

    public function create(Request $request){
        $validate = Validator::make($request->all(), [
            "title" => "required | string",
            "description" =>  "required | string"
        ]);

        if($validate->fails()){
            return response()->json((object)[
                "errors" => $validate->errors()->toArray()
            ],412);
        }

        $task = new Tasks();

        $task->title = $request->input('title');
        $task->description = $request->input('description');
        $task->user_id = $request->user_id;
        $task->completed = false;

        $task->save();

        return response()->json((object)[
            "message" => "Success",
            "task" => $task
        ], 200);

    }

    public function update(Request $request){
        Log::info('----------------------------------');
        Log::info($request->id);
        $task = Tasks::where('id', $request->id)->first();

        if(is_null($task)){
            return response()->json((object)[
                "error" => (object)[
                    "message" => "Not found task"
                ]
            ],400);
        }

        $task->title = $request->input('title') ?? $task->title;
        $task->description = $request->input('description') ?? $task->description;
        $task->completed = $request->input('completed') ?? $task->completed;

        $task->save();

        return response()->json((object)[
            "message" => "Success",
            "task" => $task
        ], 200);
    }

    public function delete(Request $request){
        $task = Tasks::where('id', $request->id)->first();

        if(is_null($task)){
            return response()->json((object)[
                "error" => (object)[
                    "message" => "Error delete task"
                ]
            ],400);
        }

        $task->delete();

        return response()->json((object)[
            "message" => "Success",
            "task" => $task
        ], 200);
    }
}
