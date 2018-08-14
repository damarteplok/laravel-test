@extends('layouts.app')
@section('content')


@include('admin.include.error')

<div class="card">
	<div class="card-header">Create a video post</div>
	<div class="card-body">
		<form action="{{ route('post.stvideo') }}" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}

			<div class="form-group">
				<label for="title">Title</label>
				<input type="text" name="title" class="form-control">
			</div>

			<div class="form-group">
				<label for="featured">Featured image</label>
				<input type="file" name="featured" class="form-control">
			</div>

			<div class="form-group">
				<label for="category">Select category</label>
				<select name="category_id" id="category" class="form-control">
					
					@foreach($categories as $category)
				  
				  	<option value="{{ $category->id }}">{{ $category->name }}</option>
				  	@endforeach
				</select>
			</div>


			

			<div class="form-group">

				<label for="tags">Select tags</label>
				<div class="d-flex flex-wrap">
 

				@foreach($tags as $tag)
					<div class="custom-checkbox m-1">
						<label><input type="checkbox" value="{{ $tag->id }}" name="tags[]">{{ $tag->tag }}</label>
					</div>

				@endforeach
				</div>
				
			</div>

			<div class="form-group">
				<label for="url">Url</label>
				<input type="text" name="url" class="form-control">
			</div>

			<div class="form-group">
				<label for="content">Content</label>
				<textarea name="content" id="summernote" rows="20" class="form-control"></textarea>
			</div>

			<div class="form-group">
				<div class="text-center">
					<button class="btn btn-success" type="submit">Store post</button>
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
