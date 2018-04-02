@extends('layouts.app')

@section('content')

<div class="card">

	<div class="card-header">
		
		Posts

	</div>

	<div class="card-body">
	<table class="table table-striped">
	  
	  <thead>
	    <tr>
	      <th scope="col">Image</th>
	      <th scope="col">Title</th>
	      <th scope="col">Edit</th>
	      <th scope="col">Trash</th>
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
		      		
		      		<a href="{{ route('post.edit', ['id' => $post->id]) }}" class="btn btn-info btn-sm">
		      			edit
		      		</a>
		      </td>

		      <td>
		      		
		      		<a href="{{ route('post.delete', ['id' => $post->id]) }}" class="btn btn-danger btn-sm">
		      			Trash
		      		</a>


		      </td>



		    </tr>
		    
		    @endforeach

		    {!! $posts->render() !!}

		@else

				<th colspan="5" class="text-center"> No post</th>

		@endif
	      
	  </tbody>
	</table>
	</div>
</div>
@stop