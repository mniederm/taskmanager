<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Task;
use App\User;

class TasksController extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // set authentication for the tasks --> only auth users can access
        // except of an array of functions
        $this->middleware('auth', ['except' => ['show']]);
        
        // everything is only accessable for auth users
        //$this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get logged in user and his id
        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        // request all tasks
        //$tasks = Task::orderBy('created_at', 'desc')->paginate(10);
        
        // request only the users tasks
        $tasks = $user->tasks()->orderBy('created_at', 'desc')->paginate(10);
        return view('tasks.index')->with('tasks', $tasks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'task_image' => 'image|nullable|max:1999'
        ]);
        
        // Handle File Upload
        if($request->hasFile('task_image')){
            $fileNameWithExt = $request->file('task_image')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('task_image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().$extension;
            $path = $request->file('task_image')->storeAs('public/task_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        } 


        //Create Task
        $task = new Task;
        $task->title = $request->input('title');
        $task->body = $request->input('body');
        $task->user_id = auth()->user()->id;
        $task->task_image = $fileNameToStore;
        $task->save();

        return redirect('/tasks')->with('success', 'Task created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::find($id);
        if (!empty($task)){
            return view('tasks.show')->with('task', $task);
        } 
        else {
            return redirect('/tasks')->with('error', 'Task '.$id.' can not be found');    
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::find($id);

        // Check for correct user
        if (auth()->user()->id !== $task->user_id){
            return redirect('/tasks')->with('error', 'You are not allowed to edit this task');    
        }
        else {
            return view('tasks.edit')->with('task', $task);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'task_image' => 'image|nullable|max:1999'
        ]);

        // Handle File Upload
        if($request->hasFile('task_image')){
            $fileNameWithExt = $request->file('task_image')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('task_image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().$extension;
            $path = $request->file('task_image')->storeAs('public/task_images', $fileNameToStore);
        }

        //Find Task
        $task = Task::find($id);
        $task->title = $request->input('title');
        $task->body = $request->input('body');
        if($request->hasFile('task_image')){
            if ($task->task_image != '' and $task->task_image != 'noimage.jpg'){
                // Delete old File
                Storage::delete('public/task_images/'.$task->task_image);
            }
            $task->task_image = $fileNameToStore;
        }
        $task->save();

        return redirect('/tasks')->with('success', 'Task: '.$task->title.' updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Find Task
        $task = Task::find($id);
        // Check for correct user
        if (auth()->user()->id !== $task->user_id){
            return redirect('/tasks')->with('error', 'You are not allowed to delete this task');    
        } else {
            if ($task->task_image != 'noimage.jpg' and $task->task_image != ''){
                Storage::delete('public/task_images/'.$task->task_image);
            }
            $task->delete();
            return redirect('/tasks')->with('success', 'Task '.$id.' removed');
        }
    }
}
