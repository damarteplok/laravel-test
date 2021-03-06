<?php

namespace App\Http\Controllers;



use Session;
use Illuminate\Http\Request;

use App\Todo;

class TodosController extends Controller
{
    //
    public function index()

    {
    
    	$todos = Todo::all();

    	return view('todos')->with('todos', $todos);

    }

    public function store(Request $request)
    
    {

    	//dd($request->all());

    	$todo = new Todo;


    	$todo->todo = $request->todo;

    	$todo->save();

        Session::flash('success','was created');

    	return redirect()->back();

    }

    public function delete($id)
    
    {

        //dd($id);

        $todo = Todo::find($id);

        $todo->delete();

        Session::flash('success','was deleted');
        
        return redirect()->back();

    }

    public function update($id)
    {

        $todo = Todo::find($id);

        

        return view('update')->with('todo', $todo);
    }

    public function save(Request $request, $id)
    {
       // dd($request->all());
    
        $todo = Todo::find($id);

        $todo->todo = $request->todo;
        
        $todo->save();

        Session::flash('success','was updated');

        return redirect()->route('todos');
    }

    public function completed($id)
    {

        $todo = Todo::find($id);

        $todo->completed = 1;

        $todo->save();

        Session::flash('success','was completed');

        return redirect()->back();

    }
}
