@extends('layouts.app')

@section('content')

<div class="card">
	
	<div class="card-header">
		
		Categories

	</div>


	<div class="card-body">
	<table class="table table-striped">
	  
	  <thead>
	    <tr>
	      <th scope="col">Category Name</th>
	      <th scope="col">Edit</th>
	      <th scope="col">Delete</th>
	    </tr>
	  </thead>
	  
	  <tbody>

	  	@if($categories->count() > 0)


	  	@foreach($categories as $category)
	    
	    <tr>
	      <td>
	      	{{ $category->name }}
	      </td>

	      <td>
	      		
	      		<a href="{{ route('category.edit', ['id' => $category->id]) }}" class="btn btn-info btn-sm">
	      			Edit
	      		</a>

	      </td>

	      <td>
	      		
	      		<a href="{{ route('category.delete', ['id' => $category->id]) }}" class="btn btn-danger btn-sm">
	      			Delete
	      		</a>

	      </td>

	    </tr>
	    
	    @endforeach
	    {!! $categories->render() !!}
	    @else

	    	<th colspan="5" class="text-center"> No category </th>

	    @endif
	      
	  </tbody>
	</table>
	</div>
</div>
@stop