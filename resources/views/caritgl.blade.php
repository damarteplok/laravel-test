@extends('master.master')

@section('content')


<div class="layout">
	<div class="container mt-5 pt-5">
		<div class="row">
			<div class="col col-md-6 offset-md-3">
				<div class="card text-primary my-5">

					@include('admin.include.error')

					<form action="{{ route('caritgl.status') }}" method="GET">
						<div class="card-header">Cari Ketersediaan Room
						</div>
							
						<div class="card-body">

							<div class="form-group">

							    <label for="tes">Cari ketersediaan</label>
							    <div class="form-group row">
								  <label for="example-date-input" class="col-2 col-form-label">Date</label>
								  <div class="col-12">
								    <input class="form-control" type="date" id="example-date-input" placeholder="Masukan Tanggal" name="book">
								  </div>
								</div>
								<div class="text-center">
									<button class="btn btn-success" type="submit">Search</button>
								</div>
			
							</div>				

						</div>
					</form>

				</div>

			</div>
		</div>
	</div>
</div>

	

 

	
	
	

@stop

@section('custom')




@stop

