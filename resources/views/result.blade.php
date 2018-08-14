@extends('master.master')


@section('content')

<div class="indexblog my-5">

    <div class="container">
        <div class="row">
             <div class="col text-center my-5"">
                <div class="judul text-center">
                    <h1>Search result : {{ $query }}
                    </h1>
                </div>    
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
           @if($posts->count() > 0)
            @foreach($posts->sortByDesc('created_at') as $post)
            <div class="col-6 mb-2 col-sm-6 mb-sm-2 col-md-4 mb-md-2 col-lg-2 d-flex align-items-stretch">
              <div class="card d-flex flex-column justify-content-between ">
                    <a href="{{ route('post.single', ['slug' =>$post->slug]) }}">
                    <img class="card-img-top" src="{{ $post->featured }}" alt="{{ $post->title }}"></a>
                    
                    
                    <div class="footer-card  card-footer text-muted">
                      <div class="mb-1">
                        <a href="{{ route('post.single', ['slug' =>$post->slug]) }}"><p class="card-text">{{ $post->title }}</p></a>
                      </div>
                      <div class="mb-0">
                      
                      <p>{{ $post->created_at->toFormattedDateString() }}</p>
                      </div>
                    </div>
              </div>
            </div>
            @endforeach
            @else

                <h1 class="text-center mb-5">
                        No result found
                </h1>

            @endif

        
            

            @include('shared.sidebar')
        </div>

        
    </div>
</div>




@stop

@section('custom')

<style>
	
    .judul h1 {
        line-height: 72px;
        font-size: 48px;
    }

	

</style>


@stop




