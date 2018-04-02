@extends('master.master')


@section('content')

<div class="indexblog my-5">
    

    <div class="container my-5 pt-5">
       
             
                <div class="judul">
                    <h1>Tag: {{ $tag->tag }}
                    </h1>
                </div>    
            
       
    </div>
    
        <div class="container" >
          <div class="row">
            @if($tag->posts()->count() > 0)
            @foreach($tag->posts()->orderBy('created_at', 'desc')->paginate(30) as $post)
            <div class="col-6 mb-2 col-sm-6 mb-sm-2 col-md-4 mb-md-2 col-lg-2 d-flex align-items-stretch">
              <div class="card ">
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
            <div class="col-6 offset-3">
            <div class="card my-5">
                <div class="card-body text-center">
                    <h1>
                        No result found
                    </h1>
                </div>
            </div>
            </div>
            

            @endif
          </div>
          <div class="row">
            <div class="col my-5">
                
                {!! $tag->posts()->orderBy('created_at', 'desc')->paginate(30)->render() !!}
                
            </div>
          </div>
        </div>    

  

    @include('shared.sidebar')
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




