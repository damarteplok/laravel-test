@extends('master.master')
@section('content')


<div class="body-wrap">  
  <div class="corosel my-5 pt-md-3">
    <div id="demo" class="carousel slide" data-ride="carousel">    
      
      <div class="carousel-inner">
        <div class="carousel-item active">
          <a href="{{ route('post.single', ['slug' =>$first_post->slug]) }}"><img id="tesimage" src="{{ $first_post->featured }}" alt="{{ $first_post->title }}"></a>
            <div class="carousel-caption d-flex mb-lg-5 h-75">
              <div class="row">
                <div class="col col-sm-12 col-lg-8 align-self-lg-center " style="color: rgb(82,82,82);">
                    <h1 class="text-lg-center">{{ $first_post->title }}</h1>
                    {!! mb_substr($first_post->content,0,500) !!}<br>
                    <p class="text-lg-center">{{ $first_post->created_at->toFormattedDateString() }}</p>
                  
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
        </div>
        
        @foreach($second_post as $post)
          <div class="carousel-item">
            <a href="{{ route('post.single', ['slug' =>$post->slug]) }}"><img id="tesimage" src="{{ $post->featured }}" alt="{{ $post->title }}" ></a>
            

            <div class="carousel-caption d-flex mb-lg-5 h-75">
              <div class="row">
                <div class="col col-sm-12 col-lg-8 align-self-lg-center " style="color: rgb(82,82,82);">
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
            <div class="ml-auto align-self-center">
              <a href="{{ route('category.single', ['id' =>$news1->id]) }}" class="btn btn-primary btn-sm active" role="button" aria-disabled="true">Read more</a>
            </div>
        </div>
</div>

    
<div class="container-fluid">
        <div class="container" >
          <div class="row">
            @foreach($news as $post)
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
  height: 570px;  
  -webkit-filter: blur(5px);
  -moz-filter: blur(5px);
  -o-filter: blur(5px);
  -ms-filter: blur(5px);
  filter: blur(5px);

  }

  .paket img {
      width: 100%;
      height: 144.3px;
  }

  /*.carousel-inner {
    color:rgb(82,82,82);
  }*/

  .footer-card {

    color: #212121;
    display: block;
    font-size: 16px;
    line-height: 18px;
   /* max-height: 36px;
    min-height: 18px;*/

  }

  /*div { overflow-y: hidden; margin-bottom: 10px; background: cyan; width:200px; }*/
  
  </style>


@stop