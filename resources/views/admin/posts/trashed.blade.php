@extends('layouts.app')

@section('content')

<div class="card">

	<div class="card-header">
		
		Trashed posts

	</div>

	<div class="card-body">
	<table class="table table-striped">
	  
	  <thead>
	    <tr>
	      <th scope="col">Image</th>
	      <th scope="col">Title</th>
	      <th scope="col">Edit</th>
	      <th scope="col">Restore</th>
	      <th scope="col">Destroy</th>
	    </tr>
	  </thead>
	  
	  <tbody>

	  	@if($posts->count() > 0)

		  	@foreach($posts as $post)
		    
		    <tr>
		      <td><img src="{{ $post->featured }}" alt="{{ $post->title }}" width="90px" height="auto"></td>
		      <td>
		      	{{ $post->title }}
		      </td>

		      <td>
		      		
		      		Edit
		      </td>

		      <td>
		      		
		      		<a href="{{ route('post.restore', ['id' => $post->id]) }}" class="btn  btn-success btn-sm">
		      			restore
		      		</a>



		      </td>

		      <td>
		      		
		      		<a href="{{ route('post.kill', ['id' => $post->id]) }}" class="btn btn-danger btn-sm">
		      			Destroy
		      		</a>



		      </td>

		    </tr>
		    
		    @endforeach

	    @else

	    	<th colspan="5" class="text-center"> No trashed post</th>

	    @endif

	      
	  </tbody>
	</table>
	</div>
</div>
@stop