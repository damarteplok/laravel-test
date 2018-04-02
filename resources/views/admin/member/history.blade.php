@extends('layouts.app')

@section('content')

<div class="card">

	<div class="card-header">
		
		Members History

	</div>

	<div class="card-body">
	<table class="table table-striped">
	  
	  <thead>
	    <tr>
	      
	      
	      <th scope="col">Tgl Mesen</th>
	      <th scope="col">Tgl Booking</th>
	      <th scope="col">INV</th>
	      <th scope="col">STAT</th>

	    </tr>
	  </thead>
	  
	  <tbody>

	  	@if($member->count() > 0)

		  	@foreach($member as $user)
		    
		    <tr>
		      
		    	

		    	<td>
		    		{{ $user->date }}
		    	</td>

		    	<td>
		    		
		    			
		    			{{ $user->created_at }}
		    		
		    	</td>

		    	<td>
		    		
		    			
		    			{{ $user->invoice }}
		    		
		    	</td>

		    	<td>
		    		
					@if( $user->status !== 1)
					paid
					@else
					booked
					@endif
		    		
		    	</td>

		    </tr>
		    
		    @endforeach

		@else

				<th colspan="5" class="text-center"> No History</th>

		@endif
	      
	  </tbody>
	</table>
	</div>
</div>
@stop