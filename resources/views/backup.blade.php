<div class="showblog mb-5">
    <div class="container" style="margin-top: 144px">

        @if(strlen($post->youtube_url) > 0)
        <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="{{ $post->youtube_url }}" allowfullscreen></iframe>
        </div>

    	
        <div class="card">
            
            
            
            <div class="row">
                <div class="col col-md-12 col-lg-9">

                    <div class="card-body mt-5">
                    	<span class="label">
                    		
                            <a href="{{ route('category.single', ['id' =>$post->category->id]) }}"> 

                            {{ $post->category->name }}
                            
                            </a>
                    		<span>/</span>
                    		
                            <span>
                                {{ $post->created_at->toFormattedDateString() }}
                            </span>
                            
                    	</span>
                        <h1 class="card-ttile">
                            {{  $title }}
                        </h1>
                        
                         {!! $post->content !!}
                        
                    </div>

                    

                    <div class="card-footer text-muted ">

                        <span class="mr-5">
                            <img src="{{ asset($post->user->profile->avatar) }}" class="rounded-circle" alt="{{ $post->user->name }}" style="height: 50px; width: 50px">
                        </span>
                        
                        By : {{ $post->user->name }} <span class="ml-5">
                            {{ $post->user->profile->about }}
                        </span>
                        <span class="ml-5"><a target="_blank" href="{{  $post->user->profile->facebook}}"><i class="fa fa-facebook"></i></a>
                            
                        </span>
                        <span class="ml-5"><a target="_blank" href="{{  $post->user->profile->youtube}}"><i class="fa fa-youtube-play"></i></a>
                            
                        </span>
                    </div>

                    <div class="card-footer mb-5 text-muted" style="border-top: 0px">
                    
                        <i class="material-icons" style="font-size: 24px;">label_outline</i>	
                        @foreach($post->tags as $tag)

                            <span class="mx-2 mb-2">{{ $tag->tag }}</span>


                        @endforeach
                    
                    </div>
                    
                </div>

                <div class="col col-md-0 col-lg-3 ">
                        
                        {{-- <div class="addthis_inline_share_toolbox mx-5 my-5"></div> --}}
                        @include('shared.recent')
                        
                    
                    </div>

            </div>
        </div>

        @else
            <div class="card">
            
                <img class="card-img-top" src="{{ $post->featured }}" alt="{{ $post->title }}">
                
                <div class="row">
                    <div class="col col-md-12 col-lg-9">

                        <div class="card-body mt-5">
                            <span class="label">
                                
                                <a href="{{ route('category.single', ['id' =>$post->category->id]) }}"> 

                                {{ $post->category->name }}
                                
                                </a>
                                <span>/</span>
                                
                                <span>
                                    {{ $post->created_at->toFormattedDateString() }}
                                </span>
                                
                            </span>
                            <h1 class="card-ttile">
                                {{  $title }}
                            </h1>
                            
                             {!! $post->content !!}
                            
                        </div>

                        

                        <div class="card-footer text-muted ">

                            <span class="mr-5">
                                <img src="{{ asset($post->user->profile->avatar) }}" class="rounded-circle" alt="{{ $post->user->name }}" style="height: 50px; width: 50px">
                            </span>
                            
                            By : {{ $post->user->name }} <span class="ml-5">
                                {{ $post->user->profile->about }}
                            </span>
                            <span class="ml-5"><a target="_blank" href="{{  $post->user->profile->facebook}}"><i class="fa fa-facebook"></i></a>
                                
                            </span>
                            <span class="ml-5"><a target="_blank" href="{{  $post->user->profile->youtube}}"><i class="fa fa-youtube-play"></i></a>
                                
                            </span>
                        </div>

                        <div class="card-footer mb-5 text-muted" style="border-top: 0px">
                        
                            <i class="material-icons" style="font-size: 24px;">label_outline</i>    
                            @foreach($post->tags as $tag)

                                <span class="mx-2 mb-2">{{ $tag->tag }}</span>


                            @endforeach
                        
                        </div>
                        
                    </div>

                    <div class="col col-md-0 col-lg-3 ">
                        
                        {{-- <div class="addthis_inline_share_toolbox mx-5 my-5"></div> --}}
                        @include('shared.recent')
                        
                    
                    </div>

                </div>
            </div>
        @endif
 
    </div>

    <div class="pag-single my-3">

    	<div class="container">
    		<div class="row">
    		@if($prev)
    		<div class="col-6"><a href="{{ route('post.single', ['slug' => $prev->slug]) }}">  
    			<img src="{{ asset('open-iconic/svg/caret-left.svg') }}"> <span>{{ $prev->title }}</span></a>
    		</div>
    		@endif
    		@if($next)
    		<div class="col-6  text-right">
    			<a href="{{ route('post.single', ['slug' => $next->slug]) }}"><span>{{ $next->title }}</span>
    			<img src="{{ asset('open-iconic/svg/caret-right.svg') }}" class="pl-auto"></a>
    		</div>
    		@endif
    		</div>
    	</div>
    </div>

    <div class="container my-3">
        
                    @include('shared.disqus')            
            
    </div>

    <div class="alltag">
        <div class="container mx-auto">
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
    


</div>