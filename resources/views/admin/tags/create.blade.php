@extends('layouts.app')
@section('content')


@include('admin.include.error')

<div class="card">
	<div class="card-header">Createa a new tag</div>
	<div class="card-body">
		<form action="{{ route('tag.store') }}" method="post">
			{{ csrf_field() }}

			<div class="form-group">
				<label for="name">Tag</label>
				<input type="text" name="tag" class="form-control">
			</div>

			<div class="form-group">
				<div class="text-center">
					<button class="btn btn-success" type="submit">Store tag</button>
				</div>
			</div>

		</form>
	</div>
</div>

@stop