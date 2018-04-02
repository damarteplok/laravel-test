@extends('layouts.app')

@section('content')

<div class="card">
	
	<div class="card-header">
		
		Tags

	</div>


	<div class="card-body">
	<table class="table table-striped">
	  
	  <thead>
	    <tr>
	      <th scope="col">Tag Name</th>
	      <th scope="col">Edit</th>
	      <th scope="col">Delete</th>
	    </tr>
	  </thead>
	  
	  <tbody>

	  	@if($tags->count() > 0)


	  	@foreach($tags as $tag)
	    
	    <tr>
	      <td>
	      	{{ $tag->tag }}
	      </td>

	      <td>
	      		
	      		<a href="{{ route('tag.edit', ['id' => $tag->id]) }}" class="btn btn-info btn-sm">
	      			Edit
	      		</a>

	      </td>

	      <td>
	      		
	      		<a href="{{ route('tag.delete', ['id' => $tag->id]) }}" class="btn btn-danger btn-sm">
	      			Delete
	      		</a>

	      </td>

	    </tr>
	    
	    @endforeach
	    {!! $tags->render() !!}
	    @else

	    	<th colspan="5" class="text-center"> No tag </th>

	    @endif
	      
	  </tbody>
	</table>
	</div>
</div>
@stop