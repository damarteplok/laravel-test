@extends('master.master2')
@section('content')


@include('admin.include.error')

<div class="container mt-5">
	<div class="row">
		<div class="col col-md-6 offset-md-3">
			<div class="card my-5">
				<div class="card-body mx-3">
					<div class="card-text">
						<form action="{{ route('book.store') }}" method="post" id="form2">
							{{ csrf_field() }}

							{{-- <div class="form-group">
							    <label for="date1">Tanggal Booking</label>
							    <input type="text" class="form-control" id="date1" aria-describedby="dateHelp" placeholder="Input date booking" name="date">
							    <small id="dateHelp" class="form-text text-muted">Format YYYY-MM-DD</small>
							</div> --}}
							<div class="form-group">
								  <label for="example-date-input">Tanggal Booking</label>
								  
								    <input class="form-control" type="date" id="example-date-input" placeholder="Masukan Tanggal Booking" name="date">
								 
							</div>

							<div class="form-group">
								<label for="paket">Select paket</label>
								<select name="product_id" id="paket" class="form-control">
									
									@foreach($products as $product)
								  
								  	<option value="{{ $product->id }}">{{ $product->name }}</option>
								  	@endforeach
								</select>
							</div>

							<div class="form-group">
								<div class="text-center">
									<button class="btn btn-success" type="submit">Book Now!!</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>



 @stop