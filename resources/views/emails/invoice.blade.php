@extends('master.master2')
@section('content')





						<h1>INVOICE {{ $invoice }} </h1>
						<br>
						
						<h3>Nama customers :{{ $name }}</h3>
						<h3>Tgl mesen : {{ $tglmsn }}</h3>
						<h3>Tgl book :{{ $tglbook }}</h3>
						<h3>Email customers :{{ $email }}</h3>
						<br>
						<table class="table">
						  <thead>
						    <tr>
						      <th scope="col">#</th>
						      <th scope="col">Product</th>
						      <th scope="col">Price</th>
						      <th scope="col">Description</th>
						    </tr>
						  </thead>
						  <tbody>
						    <tr>
						      <th scope="row">1</th>
						      <td>{{ $product }}</td>
						      <td>{{ $price }}</td>
						      <td>{!! $description !!}</td>
						    </tr>
						  </tbody>
						</table>
					



 @stop

