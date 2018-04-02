@extends('layouts.app')

@section('content')

<div class="card">

	<div class="card-header">
		
		Members

	</div>

	<div class="card-body">
	<table class="table table-striped">
	  
	  <thead>
	    <tr>
	      
	      <th scope="col">Name</th>
	      <th scope="col">Email</th>
	      <th scope="col">NoHp</th>
	      <th scope="col">History</th>
	      <th scope="col">Delete</th>
	    </tr>
	  </thead>
	  
	  <tbody>

	  	@if($member->count() > 0)

		  	@foreach($member as $user)
		    
		    <tr>
		      
		    	

		    	<td>
		    		{{ $user->name }}
		    	</td>

		    	<td>
		    		{{ $user->email }}
		    	</td>

		    	<td>
		    		{{ $user->nohp }}
		    	</td>

		    	<td>
		    		
		    			
		    			<a href="{{ route('member.history', ['id' => $user->id]) }}" class="btn btn-sm btn-success">History</a>
		    		
		    	</td>

		    	<td>
		    		

		    		<a href="{{ route('member.delete', ['id' => $user->id]) }}" class="btn btn-sm btn-danger">delete</a>

		    		
		    	</td>

		    </tr>
		    
		    @endforeach

		@else

				<th colspan="5" class="text-center"> No Member</th>

		@endif
	      
	  </tbody>
	</table>
	</div>
</div>
@stop