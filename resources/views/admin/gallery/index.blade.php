@extends('layouts.app')

@section('content')

<div class="card">
	
	<div class="card-header">
		
		Gallery

	</div>


	<div class="card-body">
	<table class="table table-striped">
	  
	  <thead>
	    <tr>
	      <th scope="col">Gallery Name</th>
	      <th scope="col">View</th>
	      <th scope="col">Delete</th>
	    </tr>
	  </thead>
	  
	  <tbody>

	  	@if($gallery->count() > 0)


	  	@foreach($gallery as $g)
	    
	    <tr>
	      <td>
	      	{{ $g->name }}
	      </td>

	      <td>
	      		
	      		<a href="{{ route('gallery.edit', ['id' => $g->id]) }}" class="btn btn-info btn-sm">
	      			View
	      		</a>

	      </td>

	      <td>
	      		
	      		<a href="{{ route('gallery.delete', ['id' => $g->id]) }}" class="btn btn-danger btn-sm">
	      			Delete
	      		</a>

	      </td>

	    </tr>
	    
	    @endforeach
	    {!! $gallery->render() !!}
	    @else

	    	<th colspan="5" class="text-center"> No gallery </th>

	    @endif
	      
	  </tbody>
	</table>
	</div>
</div>
@stop