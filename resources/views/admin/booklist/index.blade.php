@extends('layouts.app')

@section('content')

<div class="card">

	<div class="card-header">
		
		BookList

	</div>

	<div class="card-body">
	<table class="table table-striped">
	  
	  <thead>
	    <tr>
	      <th scope="col">TglMesen</th>
	      <th scope="col">AN</th>
	      <th scope="col">Paket</th>
	      <th scope="col">Invoice</th>
	      <th scope="col">Price</th>
	      <th scope="col">UtkTgl</th>
	      <th scope="col">accept</th>
	      <th scope="col">delete</th>
	    </tr>
	  </thead>
	  
	  <tbody>

	  	@if($books->count() > 0)

		  	@foreach($books as $book)
		    
		    <tr>
		      <td>
		      	{{ $book->created_at->toFormattedDateString() }}
		      </td>
		      <td>
		      	{{ $book->customer->name }}
		      </td>
		      <td>
		      	{{ $book->product->name }}
		      </td>
		      <td>
		      	{{ $book->invoice }}
		      </td>
		      <td>
		      	{{ $book->product->price }}
		      </td>
		      <td>
		      	{{ $book->date }}
		      </td>
		      @if($book->status == 1)
		      <td>
		      		
		      		<a href="{{ route('book.edit', ['id' => $book->id]) }}" class="btn btn-info btn-sm">
		      			accept
		      		</a>
		      </td>
		      @elseif($book->status == 2)
		      <td>
		      		<button type="button" class="btn btn-success">paid</button>
		      </td>
		      @endif

		      <td>
		      		
		      		<a href="{{ route('book.delete', ['id' => $book->id]) }}" class="btn btn-danger btn-sm">
		      			Delete
		      		</a>


		      </td>



		    </tr>
		    
		    @endforeach

		    {!! $books->render() !!}

		@else

				<th colspan="5" class="text-center"> No booklist</th>

		@endif
	      
	  </tbody>
	</table>
	</div>
</div>
@stop