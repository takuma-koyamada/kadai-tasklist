<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Tasks = Task::all();
        
        return view ('Tasks.index',[
            'Tasks'=>$Tasks,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Task = new Task;
        
        return view('Tasks.create',[
            'Task'=>$Task,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
                'status' => 'required|max:10', 
                'content' => 'required|max:255',
            ]);
        
        $Task = new Task;
        $Task->status = $request->status;
        $Task->content = $request->content;
        $Task->save();
        
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $idcd
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Task = Task::findOrFail($id);
         
        return view('Tasks.show', [
            'Task' => $Task,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Task = Task::findOrFail($id);
        
        return view('Tasks.edit', [
            'Task' => $Task,
        ]);
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
        $request->validate([
            'status' => 'required|max:10',
            'content' => 'required|max:255',
        ]);
        
        $Task = Task::findOrFail($id);
        
        $Task->status = $request->status;
        $Task->content = $request->content;
        $Task->save();
        
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Task = Task::findOrFail($id);
        
        $Task->delete();
        
        return redirect('/');
    }
}
