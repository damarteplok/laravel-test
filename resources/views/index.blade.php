@extends('master.master')
@section('content')


<div class="body-wrap"> 

{{-- <<<<<<< HEAD


=======
>>>>>>> cd74dffcd4a31b9f15dbd2df182be772015b4023 --}}
  <div class="corosel my-5 pt-md-3">
    @if(Session::has('success'))
               
      <div class="alert alert-success alert-dismissible fade show mt-2" role="alert" style="margin-bottom: 0px;">
        {{ Session::get('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    
    @endif
    
    <div id="demo" class="carousel slide" data-ride="carousel">    
      
      <div class="carousel-inner">
        <div class="carousel-item active">
          <a href="{{ route('post.single', ['slug' =>$first_post->slug]) }}"><img id="tesimage" src="{{ $first_post->featured }}" alt="{{ $first_post->title }}">
            <div class="carousel-caption d-flex mb-lg-5 h-75">
              <div class="row">
{{-- <<<<<<< HEAD --}}
                <div id="t-small" class="col col-sm-12 col-lg-8 align-self-lg-center" style="color: rgb(255,255,255);">
                  
                    <h1 class="text-lg-center"> {{ $first_post->title }}</h1>
{{-- ======= --}}
                {{-- <div id="t-small" class="col col-sm-12 col-lg-8 align-self-lg-center" style="color: rgb(82,82,82);">
                    <h1 class="text-lg-center">{{ $first_post->title }}</h1> --}}
{{-- >>>>>>> cd74dffcd4a31b9f15dbd2df182be772015b4023 --}}
                    {!! mb_substr($first_post->content,0,500) !!}<br>
                    <p class="text-lg-center ">{{ $first_post->created_at->toFormattedDateString() }}</p>
                  
                </div>
                <div class="col col-sm-12 col-lg-4 d-none d-lg-block align-self-lg-center">
                  <div class="card text-white bg-secondary">
                    <img class="card-img-top" src="{{ $first_post->featured }}" alt="{{ $first_post->title }}">
                    <div class=" card-body">
                    <h3>{{ $first_post->title }}</h3>
                    <p>{{ $first_post->category->name  }}</p>
                    </div>
                  </div>
                </div>
              </div>
              
              
            </div>
          </a>   
        </div>
        
        @foreach($second_post as $post)
          <div class="carousel-item">
            <a href="{{ route('post.single', ['slug' =>$post->slug]) }}"><img id="tesimage" src="{{ $post->featured }}" alt="{{ $post->title }}" >
            

            <div class="carousel-caption d-flex mb-lg-5 h-75">
              <div class="row">
{{-- <<<<<<< HEAD --}}
                <div id="t-small" class="col col-sm-12 col-lg-8 align-self-lg-center" style="color: rgb(255,255,255);">
                
{{-- ======= --}}
               {{--  <div id="t-small" class="col col-sm-12 col-lg-8 align-self-lg-center" style="color: rgb(82,82,82);"> --}}
{{-- >>>>>>> cd74dffcd4a31b9f15dbd2df182be772015b4023 --}}
                    <h1 class="text-lg-center">{{ $post->title }}</h1>
                  
                    {!! mb_substr($post->content,0,500) !!}<br>
                    <p class="text-lg-center">{{ $post->created_at->toFormattedDateString() }}</p>
                  
                </div>
                <div class="col col-sm-12 col-lg-4 d-none d-lg-block align-self-lg-center">
                  <div class="card text-white bg-secondary">
                    <img class="card-img-top" src="{{ $post->featured }}" alt="{{ $post->title }}">
                    <div class=" card-body">
                    <h3>{{ $post->title }}</h3>
                    <p>{{ $post->category->name  }}</p>
                    </div>
                  </div>
                </div>
              </div>
              
              
            </div>
            </a>

          </div>
        @endforeach 
      </div>

      <a class="carousel-control-prev" href="#demo" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </a>

      <a class="carousel-control-next" href="#demo" data-slide="next">
        <span class="carousel-control-next-icon"></span>
      </a>

    </div>
  </div>

<div class="container-fluid">
  <div class="paket">
      <div class="row">
          
          @foreach($pakets as $post)
          <div class="col-sm-4 my-1">
              <a href="{{ route('post.single', ['slug' =>$post->slug]) }}"><img src="{{ $post->featured }}" ></a>
          </div>
          @endforeach

      </div>
  </div>
</div>

<div class="container-fluid">
        <div class="container d-flex mt-5 mb-3">
            <div class="title-head">
                <h1>Lastest <a href="{{ route('category.single', ['id' =>$news1->id]) }}">{{ $news1->name }}</a></h1>
            </div>
            <div class="ml-auto align-self-center ">
              <a href="{{ route('category.single', ['id' =>$news1->id]) }}" class="btn btn-primary btn-sm active" role="button" aria-disabled="true">Read more</a>
            </div>
        </div>
</div>

    
<div class="container-fluid">
        <div class="container" >
          <div class="row">
            @foreach($news as $post)
            <div class="col-6 mb-2 col-sm-6 mb-sm-2 col-md-4 mb-md-2 col-lg-2 d-flex align-items-stretch">
              <div class="card d-flex flex-column justify-content-between">
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
          </div>
        </div>
</div>

<div class="container-fluid">
        <div class="container d-flex mt-5 mb-3">
            <div class="title-head">
                <h1>Lastest <a href="{{ route('category.single', ['id' =>$artist1->id]) }}">{{ $artist1->name }}</a></h1>
            </div>
            <div class="ml-auto align-self-center">
              <a href="{{ route('category.single', ['id' =>$artist1->id]) }}" class="btn btn-primary btn-sm active" role="button" aria-disabled="true">Read more</a>
            </div>
        </div>
</div>

    
<div class="container-fluid">
        <div class="container mb-5">
          <div class="row">
            @foreach($artist as $post)
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
          </div>
           

        </div>
</div>


<div class="container-fluid">
        <div class="container d-flex mt-5 mb-3">
            <div class="title-head">
                <h1>Lastest <a href="{{ route('category.single', ['id' =>$video1->id]) }}">{{ $video1->name }}</a></h1>
            </div>
            <div class="ml-auto align-self-center">
              <a href="{{ route('category.single', ['id' =>$video1->id]) }}" class="btn btn-primary btn-sm active" role="button" aria-disabled="true">Read more</a>
            </div>
        </div>
</div>

    
<div class="container-fluid">
        <div class="tes-tes container mb-5 py-5">
            <div class="row">
            @foreach($video as $post)
            <div class="col-6 mb-2 col-sm-6 mb-sm-2 col-md-4 mb-md-2 col-lg-2 d-flex  align-items-stretch">
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
          </div>

        </div>
</div>

<div class="container-fluid">
        <div class="container d-flex mt-5 mb-3">
            <div class="title-head">
                <h1>Lastest Add: <a href="{{ route('category.single', ['id' =>$a1->id]) }}">{{ $a1->name }}</a></h1>
            </div>
            <div class="ml-auto align-self-center">
              <a href="{{ route('category.single', ['id' =>$a1->id]) }}" class="btn btn-primary btn-sm active" role="button" aria-disabled="true">Read more</a>
            </div>
        </div>
</div>

<div class="container-fluid">
        <div class="tes-tes container mb-5 py-5">
            <div class="row">
            @if($a->count() > 0)
            @foreach($a as $post)
            <div class="col-6 mb-2 col-sm-6 mb-sm-2 col-md-4 mb-md-2 col-lg-2 d-flex  align-items-stretch">
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
            <h3>No Post yet</h3>
              
            
            
            @endif
          </div>

        </div>
</div>

</div>

@stop



@section('custom')

 <style>
 /*.tes-tes{
  background-image: url("{{ asset('uploads/avatars/xiyeon.jpg') }}"); 
 }*/
 /*.body-wrap {
  background: rgb(238,238,238);
 }*/
 



  #tesimage {
  width: 100%;
  height: 35.625rem;  
  -webkit-filter: blur(5px);
  -moz-filter: blur(5px);
  -o-filter: blur(5px);
  -ms-filter: blur(5px);
  filter: blur(5px);

  }

  .paket img {
      width: 100%;
      height: 9.07rem;
  }


  .footer-card {

    color: #212121;
    display: block;
    font-size: 1rem;
    line-height: 1rem;

  }



    
  
  </style>


@stop