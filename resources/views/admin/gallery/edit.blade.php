@extends('layouts.app')
@section('content')


@include('admin.include.error')

<div class="card">
	<div class="card-header">Edit photo:{{ $gallery->filename }}</div>
	<div class="card-body">
		<form action="{{ route('gallery.update', ['id' => $gallery->id]) }}" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}

			

			<div class="form-group">
				<label for="featured">Featured image</label>
				<input type="file" name="featured" class="form-control">
			</div>

			

			
			<div class="form-group">
				<div class="text-center">
					<button class="btn btn-success" type="submit">Update photo</button>
				</div>
			</div>

		</form>
	</div>
</div>

@stop

