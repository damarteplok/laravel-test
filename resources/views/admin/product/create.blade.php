@extends('layouts.app')
@section('content')


@include('admin.include.error')

<div class="card">
	<div class="card-header">Createa a new paket</div>
	<div class="card-body">
		<form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}

			<div class="form-group">
				<label for="title">Name paket</label>
				<input type="text" name="name" class="form-control">
			</div>

			<div class="form-group">
				<label for="title">Price paket</label>
				<input type="text" name="price" class="form-control">
			</div>

			<div class="form-group">
				<label for="description">Description</label>
				<textarea name="description" id="summernote" rows="20" class="form-control"></textarea>
			</div>

			<div class="form-group">
				<div class="text-center">
					<button class="btn btn-success" type="submit">Store paket</button>
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
