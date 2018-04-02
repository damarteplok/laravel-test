@extends('layouts.app')

@section('content')



	<div class="card text-primary mb-3">
		<div class="card-header">Utk Rekap Tahunan</div>

		<form action="{{ route('rekap.thn') }}" method="post">
			
			{{  csrf_field() }}
			
			<div class="card-body">
			
			<input type="text" class="form-control" placeholder="Insert Year" name="thn">

			</div>
		</form>

	</div>




@stop