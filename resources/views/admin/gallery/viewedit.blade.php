@extends('layouts.app')

@section('content')

<div class="card">
	
	<div class="card-header">
		
		<span>Photos</span>
		<a href="{{ route('gallery.add', ['id' => $a->id]) }}" class="btn btn-outline-success btn-sm float-right">ADD</a>

	</div>


	<div class="card-body">
	<table class="table table-striped">
	  
	  <thead>
	    <tr>
	      <th scope="col">Img</th>
	      <th scope="col">Edit</th>
	      <th scope="col">Delete</th>
	    </tr>
	  </thead>
	  
	  <tbody>

	  


	  	@foreach($gallery as $g)
	    
	    <tr>
	      <td>
    		<img src="{{ asset($g->filename) }}" alt="" width="60px" height="60px" style="border-radius: 50%">
    	</td>

	      <td>
	      		
	      		<a href="{{ route('gallery.edit2', ['id' => $g->id]) }}" class="btn btn-info btn-sm">
	      			Edit
	      		</a>

	      </td>

	      <td>
	      		
	      		<a href="{{ route('gallery.delete2', ['id' => $g->id]) }}" class="btn btn-danger btn-sm">
	      			Delete
	      		</a>

	      </td>

	    </tr>
	    
	    @endforeach
	    
	    
	      
	  </tbody>
	</table>
	</div>
</div>
@stop