@extends('layouts.app')

@section('content')

<div class="card">
	
	<div class="card-header">
		
		Products

	</div>


	<div class="card-body">
	<table class="table table-striped">
	  
	  <thead>
	    <tr>
	      <th scope="col">Paket Name</th>
	      <th scope="col">Edit</th>
	      <th scope="col">Delete</th>
	    </tr>
	  </thead>
	  
	  <tbody>

	  	@if($product->count() > 0)


	  	@foreach($product as $product)
	    
	    <tr>
	      <td>
	      	{{ $product->name }}
	      </td>

	      <td>
	      		
	      		<a href="{{ route('product.edit', ['id' => $product->id]) }}" class="btn btn-info btn-sm">
	      			Edit
	      		</a>

	      </td>

	      <td>
	      		
	      		<a href="{{ route('product.delete', ['id' => $product->id]) }}" class="btn btn-danger btn-sm">
	      			Delete
	      		</a>

	      </td>

	    </tr>
	    
	    @endforeach

	    @else

	    	<th colspan="5" class="text-center"> No product </th>

	    @endif
	      
	  </tbody>
	</table>
	</div>
</div>
@stop