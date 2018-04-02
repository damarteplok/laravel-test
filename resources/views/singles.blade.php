@extends('master.master')


@section('content')

<div class="wrapper">
    <div class="container mt-5 pt-5">
        <div class="card">
            @if(strlen($post->youtube_url) > 0)
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="{{ $post->youtube_url }}" allowfullscreen></iframe>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-lg-9 pl-lg-5">
                        <div class="card-title">
                            <h3>
                            <a href="{{ route('category.single', ['id' =>$post->category->id]) }}"> 

                            {{ $post->category->name }}
                            
                            </a>
                            <span>/</span>  
                                {{ $post->created_at->toFormattedDateString() }}
                            </h3>
                            <h1>
                                {{  $title }}
                            </h1>
                        </div>
                        <div class="card-text">
                            {!! $post->content !!}
                        </div>

                    </div>
                    <div class="col-12 col-lg-3">
                        
                        <div class="row">
                            <div class="col-12">
                                <h3>Recent <a href="{{ route('category.single', ['id' =>$post->category->id]) }}"> 

                            {{ $post->category->name }}
                            
                            </a></h3>
                            </div>
                        </div>    
                        <div class="row">

                            @include('shared.recent')
                        
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-muted">
                <div class="col-12 col-lg-9 pl-lg-5">
                    <div class="media">
                      <img class="align-self-start mr-3 rounded-circle" src="{{ asset($post->user->profile->avatar) }}" alt="{{ $post->user->name }}" style="min-width: 64px; min-height: 64px; max-height: 64px; max-width: 64px;">
                      <div class="media-body">
                        <h5 class="mt-0">{{ $post->user->name }} 
                        
                        <span class="ml-2"><a target="_blank" href="{{  $post->user->profile->facebook}}"><i class="fa fa-facebook"></i></a>
                            
                        </span>
                        <span class="ml-2"><a target="_blank" href="{{  $post->user->profile->youtube}}"><i class="fa fa-youtube-play"></i></a>
                            
                        </span>
                        </h5>
                        {{ $post->user->profile->about }} <br>
                        
                      </div>
                    </div>
                </div>
            </div>

            <div class="card-footer pl-lg-5">
                @foreach($post->tags as $tag)
                 
                <a href="{{ route('tag.single', ['id' => $tag->id]) }}" class="btn btn-raised btn-sm btn-info mx-2 mb-2" role="button">
                    {{ $tag->tag }}
                </a>
                


                @endforeach
            </div>



            @else
            <img class="card-img-top" src="{{ $post->featured }}" alt="{{ $post->title }}">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-lg-9 pl-lg-5">
                        <div class="card-title">
                            <h3>
                            <a href="{{ route('category.single', ['id' =>$post->category->id]) }}"> 

                            {{ $post->category->name }}
                            
                            </a>
                            <span>/</span>  
                                {{ $post->created_at->toFormattedDateString() }}
                            </h3>
                            <h1>
                                {{  $title }}
                            </h1>
                        </div>
                        <div class="card-text">
                            {!! $post->content !!}
                        </div>

                    </div>
                    <div class="col-12 col-lg-3">
                        
                        <div class="row">
                            <div class="col-12">
                                <h3>Recent <a href="{{ route('category.single', ['id' =>$post->category->id]) }}"> 

                            {{ $post->category->name }}
                            
                            </a></h3>
                            </div>
                        </div>    
                        <div class="row">

                            @include('shared.recent')
                        
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-muted">
                <div class="col-12 col-lg-9 pl-lg-5">
                    <div class="media">
                      <img class="align-self-start mr-3 rounded-circle" src="{{ asset($post->user->profile->avatar) }}" alt="{{ $post->user->name }}" style="min-width: 64px; min-height: 64px; max-height: 64px; max-width: 64px;">
                      <div class="media-body">
                        <h5 class="mt-0">{{ $post->user->name }} 
                        
                        <span class="ml-2"><a target="_blank" href="{{  $post->user->profile->facebook}}"><i class="fa fa-facebook"></i></a>
                            
                        </span>
                        <span class="ml-2"><a target="_blank" href="{{  $post->user->profile->youtube}}"><i class="fa fa-youtube-play"></i></a>
                            
                        </span>
                        </h5>
                        {{ $post->user->profile->about }} <br>
                        
                      </div>
                    </div>
                </div>
            </div>
            <div class="card-footer pl-lg-5">
                @foreach($post->tags as $tag)
                 
                <a href="{{ route('tag.single', ['id' => $tag->id]) }}" class="btn btn-raised btn-sm btn-info mx-2 mb-2" role="button">
                    {{ $tag->tag }}
                </a>
                


                @endforeach
            </div>
            @endif

        </div>
    </div>
    <div class="container my-3">
        <div class="row">
            @if($prev)
            <div class="col"><a href="{{ route('post.single', ['slug' => $prev->slug]) }}">  
                <img src="{{ asset('open-iconic/svg/caret-left.svg') }}"> <span>{{ $prev->title }}</span></a>
            </div>
            @endif
            @if($next)
            <div class="col  text-right">
                <a href="{{ route('post.single', ['slug' => $next->slug]) }}"><span>{{ $next->title }}</span>
                <img src="{{ asset('open-iconic/svg/caret-right.svg') }}" class="pl-auto"></a>
            </div>
            @endif
        </div>
    </div>
    <div class="container my-3">
        @include('shared.disqus')
    </div>
    <div class="container my-3">
        <div class="row">
            @foreach($tags as $tag)
                <span class="mx-2 mb-3">
                <a href="{{ route('tag.single', ['id' => $tag->id]) }}">{{ $tag->tag }}
                </a>
                </span>
            @endforeach
        </div>
    </div>
</div>







@stop

@section('custom')

<style>
	
	.card-footer {
        border-top: 0px;
    }

	

	

</style>


@stop