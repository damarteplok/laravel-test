
@foreach($recents as $recent)
<div class="col-6 col-md-4 col-lg-8 offset-lg-2  mb-lg-2 mb-2">
    <div class="d-flex flex-row">
        <div class="card">
            <a href="{{ route('post.single', ['slug' =>$recent->slug]) }}"><img class="card-img-top" src="{{ $recent->featured }}" alt="{{ $recent->title }}"></a>
                <div class="card-body">
                    <div class="card-text">
                        <a href="{{ route('post.single', ['slug' =>$recent->slug]) }}"><p>
                            {{  $recent->title }}
                        </p></a>
                    </div>
                </div>
        </div>    
    </div>
</div>
                        
                        
@endforeach