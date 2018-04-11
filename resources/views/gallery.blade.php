@extends('master.master')


@section('content')

<div class="indexblog my-5 pt-5">
  
    {{-- <div class="container my-5 pt-5">
                
      <h1> {{ $key->name }} </h1>
                  
    </div> --}}
     
  
        <div class="container" >
          {{-- @foreach($gallery as $key) --}}
          <div class="row">
            {{-- @foreach($key->galleryphotos()->get() as $post) --}} 
            {{-- {{ dd($post->filename) }} --}}
            @foreach($gallery as $key)
            <div class="col-6 mb-2 col-sm-6 mb-sm-2 col-md-4 mb-md-2 col-lg-2 d-flex align-items-stretch">
              <div class="card d-flex flex-column justify-content-between ">
                    <a href="{{ route('gallery.single', ['id' => $key->id]) }}">
                    <img class="card-img-top" src="{{ asset($key->galleryphotos()->first()->filename)}}" alt="{{ $key->galleryphotos()->first()->filename }}"></a>
                    <div class="card-footer">
                     <a href="{{ route('gallery.single', ['id' => $key->id]) }}"> <p>{{ $key->name }}</p></a>
                      <p>{{ $key->galleryphotos()->first()->created_at->toFormattedDateString() }}</p>
                    </div>
                    
                    
              </div>
            </div>
            @endforeach
          </div>
          
        </div>   
            

  {{-- @endforeach --}}
  <div class="container my-5 pt-5">
                
      
                  
    </div>
  

    @include('shared.sidebar')

</div>




@stop






