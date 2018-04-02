@extends('layouts.app')
@section('content')


@include('admin.include.error')

<div class="card">
	<div class="card-header">Product category : {{ $product->name }}</div>
	<div class="card-body">
		<form action="{{ route('product.update',['id' => $product->id]) }}" method="post">
			{{ csrf_field() }}

			<div class="form-group">
				<label for="name">Name</label>
				<input type="text" value="{{ $product->name }}" name="name" class="form-control">
			</div>

			<div class="form-group">
				<label for="price">Price</label>
				<input type="text" value="{{ $product->price }}" name="price" class="form-control">
			</div>

			<div class="form-group">
				<label for="description">Description</label>
				<textarea name="description" id="summernote" cols="5" rows="5" class="form-control">{{ $product->description }}</textarea>
			</div>

			<div class="form-group">
				<div class="text-center">
					<button class="btn btn-success" type="submit">update category</button>
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
