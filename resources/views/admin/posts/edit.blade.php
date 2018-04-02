@extends('layouts.app')
@section('content')


@include('admin.include.error')

<div class="card">
	<div class="card-header">Edit post:{{ $post->title }}</div>
	<div class="card-body">
		<form action="{{ route('post.update', ['id' => $post->id]) }}" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}

			<div class="form-group">
				<label for="title">Title</label>
				<input type="text" name="title" class="form-control" value="{{ $post->title }}">
			</div>

			@if(strlen($post->youtube_url) > 0)
			<div class="form-group">
				<label for="url">Url Videos</label>
				<input type="text" name="url" class="form-control" value="{{ $post->youtube_url }}">
			</div>
			@endif

			<div class="form-group">
				<label for="featured">Featured image</label>
				<input type="file" name="featured" class="form-control">
			</div>

			<div class="form-group">
				<label for="category">Select category</label>
				<select name="category_id" id="category" class="form-control">
					
					@foreach($categories as $category)
				  
				  	<option value="{{ $category->id }}"
				  		
						@if($post->category_id == $category->id)
								selected
						@endif
						

				  		>{{ $category->name }}</option>
				  	@endforeach
				</select>
			</div>

			<div class="form-group">

				<label for="tags">Select tags</label>
				<div class="d-flex flex-wrap">
				@foreach($tags as $tag)
					<div class="custom-checkbox m-1">
						<label><input type="checkbox" value="{{ $tag->id }}" name="tags[]"
							@foreach($post->tags as $t)
							@if($tag->id == $t->id)
								checked
							@endif
							@endforeach
							>{{ $tag->tag }}</label>
					</div>

				@endforeach
				</div>
				
			</div>

			<div class="form-group">
				<label for="content">Content</label>
				<textarea name="content" id="summernote" cols="5" rows="5" class="form-control">{{ $post->content }}</textarea>
			</div>

			<div class="form-group">
				<div class="text-center">
					<button class="btn btn-success" type="submit">Update post</button>
				</div>
			</div>

		</form>
	</div>
</div>

@stop

@section('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
@stop

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>

<script>
	$('#summernote').summernote({
        
        tabsize: 2,
        height: 100
      });


</script>

@stop
