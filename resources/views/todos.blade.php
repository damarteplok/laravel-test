@extends('layouts.app')

@section('content')

	<div class="card text-primary mb-3">

		<form action="{{ route('todo.create') }}" method="post">
			
			{{  csrf_field() }}
			
			<div class="card-body">
			
			<input type="text" class="form-control" placeholder="Create a new todo" name="todo">

			</div>
		</form>

	</div>


 
<div class="card-columns">
	
	@foreach($todos as $todo)

	
	
	<div class="card border-info mb-3" style="max-width: 18rem;">
		

		<div class="card-body">
			<p>{{$todo->todo}}</p>	
		</div>

		<div class="card-footer">	
	        <a href="{{ route('todo.delete',['id' => $todo->id]) }}" class="btn btn-danger btn-sm btn-block">x</a>
	    
	        <a href="{{ route('todo.update',['id' => $todo->id]) }}" class="btn btn-info btn-sm btn-block">update</a>

	        @if(!$todo->completed)
	        	<a href="{{ route('todo.completed',['id'=> $todo->id]) }}" class="btn btn-sm btn-success btn-block">Mark as complete</a>

	        @else

	        <span class="text-success"><p class="text-center mt-3">Completed</p></span>

	        @endif
	    
	    </div>   
	        
	    
	    
		
	</div>

	@endforeach	
</div>

	

@stop

