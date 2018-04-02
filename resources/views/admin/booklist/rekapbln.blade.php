@extends('layouts.app')

@section('content')

	<div class="card text-primary mb-3">
		<div class="card-header">Utk Rekap Bulanan</div>
		<div class="card-body">
		<form class="form-inline" action="{{ route('rekap.bln') }}" method="post">
			
			{{  csrf_field() }}
			
			  <div class="form-group">
			    <label for="exampleInputName2" class="bmd-label-floating">Bln</label>
			    <input type="text" class="form-control" id="exampleInputName2" name="bln">
			  </div>
			  <div class="form-group ml-1">
			    <label for="exampleInputEmail2" class="bmd-label-floating">Year</label>
			    <input type="text" class="form-control" id="exampleInputEmail2" name="bln1">
			  </div>
			  <span class="form-group bmd-form-group mx-1"> <!-- needed to match padding for floating labels -->
			    <button type="submit" class="btn btn-primary">Go</button>
			  </span>
			
			
			
		</form>
		</div>
	</div>



@stop