@extends('layouts.app')
@section('content')


@include('admin.include.error')

<div class="card">
	<div class="card-header">Update tag : {{ $tag->tag }}</div>
	<div class="card-body">
		<form action="{{ route('tag.update',['id' => $tag->id]) }}" method="post">
			{{ csrf_field() }}

			<div class="form-group">
				<label for="tag">Tag</label>
				<input type="text" value="{{ $tag->tag }}" name="tag" class="form-control">
			</div>

			<div class="form-group">
				<div class="text-center">
					<button class="btn btn-success" type="submit">update tag</button>
				</div>
			</div>

		</form>
	</div>
</div>

@stop