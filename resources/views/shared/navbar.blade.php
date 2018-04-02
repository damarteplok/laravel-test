<nav class="navbar fixed-top navbar-expand-md navbar-light bg-white">
  <div class="container">
  <a class="navbar-brand" href="/"><img src="{{ asset('uploads/brands/absolutharam.jpeg') }}" width="30" height="30" class="d-inline-block align-top" alt="">
  {{ $settings->site_name }}</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">

        <li class="nav-item"><a class="nav-link py-3" href="/">Home</a>

        </li>
      
      @foreach($categories as $category)
      
        <li class="nav-item">

          <a class="nav-link py-3" href="{{ route('category.single', ['id' =>$category->id]) }}">{{ $category->name }}</a>
        </li>
      @endforeach

      <li class="nav-item"><a class="nav-link py-3" href="{{ route('gallery.index') }}">Gallery</a>

        </li>

        <li class="nav-item"><a class="nav-link py-3" href="{{ route('caritgl') }}">Book Studio</a>

        </li>



    </ul>
    
    <div class="bmd-form-group bmd-collapse-inline pull-xs-right">
      <button class="btn bmd-btn-icon" for="search" data-toggle="collapse" data-target="#collapse-search" aria-expanded="false" aria-controls="collapse-search">
        <i class="material-icons">search</i>
      </button>  
      <span id="collapse-search" class="collapse">
        <form method="GET" action="/results">
        <input class="form-control" type="text" id="search" placeholder="Enter your query..." name="query">
        </form>
      </span>
    </div>


    <div>
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        
                        @if (Auth::guard('customer')->check())
                              {{-- $user = Auth::user(); --}}
                            {{  Auth::shouldUse('customer')}} 
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                          
                        @endif
                      
                    </ul>
                </div>
  </div>
  </div>
</nav>


@section('script')
<script>
    // clear field value once closed
  $(function() {
    $('#collapse-search').on('hidden.bs.collapse', function() {
      $('#search').val('')
    })
  });
</script>
@stop