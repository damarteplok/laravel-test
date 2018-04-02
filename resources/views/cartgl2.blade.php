@extends('master.master')

@section('content')


<div class="layout">
	<div class="container mt-5 pt-5">
		<div class="row">
			<div class="col col-md-6 offset-md-3">
				@if($result !== null)

			    <div class="card text-primary my-5">
			  		<div class="card-header">
			    		No Available
			   	 	</div>

			     	<div class="card-body">
				    	<h5 class="card-title">No Available For {{ $tgl }} </h5>
				    	<a href="{{ route('caritgl') }}"><p class="card-text">Try another day?</p></a>
				    
			  		</div>
			    </div>

			    @else

			    
			    <div class="card text-primary my-5">

					 <div class="card-header">
				    	Available
				   	 </div>
					<form action="{{ route('customer.login') }}" method="GET">
				     <div class="card-body">
				     	<input name="invisible" type="hidden" value="{{ $tgl }}">
					    <h5 class="card-title">Available For {{ $tgl }}</h5>
					    <p class="card-text">Wanna book for this day?</p>
					   {{--  <a target="_blank" href="{{ route('customers') }}" class="btn btn-primary">Go book now!</a> --}}
					   <button class="btn btn-success" type="submit">Go book now!</button>
				  	</div>
				  	</form>
			  	</div>

			    
			    
				
				
			  @endif

			</div>
		</div>
	</div>
</div>


	  
	    
	    
		    

	  	
	
{{-- 
	@endforeach --}}
@stop