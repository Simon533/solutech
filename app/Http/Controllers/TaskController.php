<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Validator;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       
         $tasks = Task::all();
         if($tasks->count()>-0){
            return response()->json([
                'status'=>200,
                'task'=>$tasks
            ], 200);
        } else{
            return response()->json([
                'status'=>404,
                'messeage'=> 'No records found'
            ],404);
        }
    }
      

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
         $validator =Validator::make($request->all(),[
            'name' => 'required',
            'description' => 'required',
        ]);
        if($validator->fails()){
            return response()->json([
                'status'=>422,
                'errors'=>$validator->messages()
            ], 422);
        }
        else{
        $task=Task::create([
                'name'=>$request->name,
                'description'=>$request->description,
            ]);
            if($task){
                return response()->json([
                    'status'=>200,
                    'message'=>"task created"
                ],200);

            }else{
                return response()->json([
                    'status'=>500,
                    'message'=>"Something went wrong"
                ],500);
            }
        }
    }
        

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show($id)
            {
                $task= task::find($id);
                if($task){
                        return response()->json([
                            'status'=>200,
                            'message'=>$task
                        ],200);

                    }else{
                        return response()->json([
                            'status'=> 404,
                            'message'=>"Not found"
                        ],404);

                }
            }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
            {
                $task= Task::find($id);
                if($task){
                        return response()->json([
                            'status'=>200,
                            'message'=>$task
                        ],200);

                    }else{
                        return response()->json([
                            'status'=> 404,
                            'message'=>"Not found"
                        ],404);

                }
            }
            public function update(Request $request,int $id)
            {

        $validator =Validator::make($request->all(),[
            'name'=>'required|max:191',
            'description'=>'required|max:191',
        ]);
        if($validator->fails()){
            return response()->json([
                'status'=>422,
                'errors'=>$validator->messages()
            ], 422);
        } else{
            $task = Task::find($id);
            if($task){
                $task->update([
                    'name'=>$request->name,
                    'description'=>$request->description,
                    
                ]);
                return response()->json([
                    'status'=>200,
                    'message'=>"task updated"
                ],200);

            }else{
                return response()->json([
                    'status'=>404,
                    'message'=>"No such data"
                ],404);
            }
        }


            }
            public function destroy($id)
            {
                $task =Task::find($id);
                if($task){
                    $task->delete();
                    return response()->json([
                        'status'=>200,
                        'message'=>"task deleted succefully"
                    ],200);
                }else{
                    return response()->json([
                        'status'=>404,
                        'message'=>"data deleted succefully "
                    ],404);
                }
                }
            }

