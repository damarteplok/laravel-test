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
								  
								<div class="col-12 " id="datetimepicker"></div>
								
								<input class="form-control m-3" type="text" id="d" placeholder="Masukan Tanggal" name="book" onkeypress="return false;">
							

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

@section('script')


<script type="text/javascript">

	
$(function () {

                 $('#datetimepicker').datepicker({
                 dateFormat: 'yy-mm-dd',
                 inline: true,
			     altField: '#d',  
                 minDate:+1
                 
                 });

                 $('#d').change(function(){
				    $('#datetimepicker').datepicker('setDate', $(this).val());
				});
           });
</script>

@stop

