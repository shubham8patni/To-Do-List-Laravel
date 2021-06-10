<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TodoCreateRequest;
use App\Models\Todo;
use App\Models\Step;

class TodoController extends Controller
{

	public function __construct(){
		$this->middleware('auth');
	}

    public function index(){
    	//$todos = Todo::orderBy('completed')->get();
    	$todos = auth()->user()->todos->sortBy('completed');
    	return view('todos.index', compact('todos'));
    }

    public function completed(Todo $todo){

    	$todo->update(['completed' => True]);
    	return redirect(route('todo.home'))->with('message','Task marked as completed'); // success message

    }

    public function revert(Todo $todo){

    	$todo->update(['completed' => False]);
    	return redirect(route('todo.home'))->with('message','Task marked as incomplete'); // success message

    }

    public function delete(Todo $todo){

        $todo->steps->each->delete();
    	$todo->delete();
    	return redirect(route('todo.home'))->with('message','Task Deleted'); // success message

    }

    public function showlist(Todo $todo){
    	//$todos = Todo::orderBy('completed')->get();
    	return view('todos.showlist', compact('todo'));
    }

    public function create(){ 
    	return view('todos.create');
    }

    public function store(TodoCreateRequest $request){
       
    	$todo = auth()->user()->todos()->create($request->all());
        if ($request->step) {
            foreach($request->step as $step){
                $todo->steps()->create(['name'=> $step]);
            }
        }
        
    	return redirect(route('todo.home'))->with('message','To-Do created successfully'); // success message
    	
    }

    public function edit(Todo $todo){

    	return view('todos.edit', compact('todo'));

    }

    public function update(TodoCreateRequest $request, Todo $todo){

    	$todo->update(['title' => $request -> title]);
        if ($request->stepName) {
            foreach($request->stepName as $key => $value){    
                $id = $request->stepId[$key];
                if(!$id){
                    $todo->steps()->create(['name'=> $value]);
                }
                else{
                    $step=Step::find($id);
                    $step->update(['name' => $value]);
                }
            }
        }
           
    	return redirect(route('todo.home'))->with('message','To-Do updated successfully'); // success message

    }
    

}
