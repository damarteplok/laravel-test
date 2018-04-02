@extends('layouts.app')

@section('content')


	<div class="card border-primary">

		<form action="{{ route('todo.save', ['id' => $todo->id]) }}" method="post">

				{{  csrf_field() }}
				<div class="card-body">
				
					<input type="text" class="form-control" placeholder="Create a new todo" name="todo" value="{{ $todo->todo }}">
				</div>

		</form>

	</div>
	
	
@stop

