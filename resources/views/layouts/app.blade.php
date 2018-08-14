<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('styles')
    
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Admin
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
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
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        

        <div class="container my-3">
            
            <div class="row">

                @if(Auth::check())

                <div class="col-lg-2">

                  <ul class="nav flex-lg-column flex-row" style="list-style-type: none;">

                    <li class="p-1">
                      <a href="{{ route('home') }}">Home</a>
                    </li>

                    @if(Auth::user()->admin)
                    

                    <li class="p-1">
                      <a data-toggle="collapse" href="#formsExamples" aria-expanded="true" class="">Users</a>
                      <div class="collapse in" id="formsExamples" aria-expanded="true" style="">
                          <ul >
                            <li><a href="{{ route('users') }}">All Users</a>
                            </li>
                            <li><a href="{{ route('user.create') }}">Create New Users</a>
                            </li>
                                                                                           
                          </ul>
                      </div>
                    </li>
                    @endif

                    <li class="p-1">
                      <a data-toggle="collapse" href="#formsExamples1" aria-expanded="true" class="">Categories</a>
                      <div class="collapse in" id="formsExamples1" aria-expanded="true" style="">
                          <ul >
                            <li><a href="{{ route('categories') }}">All Categories</a>
                            </li>
                            <li><a href="{{ route('category.create') }}">Create new category</a>
                            </li>
                                                                                           
                          </ul>
                      </div>
                    </li>

                


                    <li class="p-1">
                      <a data-toggle="collapse" href="#formsExamples2" aria-expanded="true" class="">Tags</a>
                      <div class="collapse in" id="formsExamples2" aria-expanded="true" style="">
                          <ul>
                            <li><a href="{{ route('tags') }}">All tags</a>
                            </li>
                            <li><a href="{{ route('tag.create') }}">Create new tag</a>
                            </li>
                                                                                           
                          </ul>
                      </div>
                    </li>

                  

                    <li class="p-1">
                      <a data-toggle="collapse" href="#formsExamples3" aria-expanded="true" class="">Posts</a>
                      <div class="collapse in" id="formsExamples3" aria-expanded="true" style="">
                          <ul>
                            <li><a href="{{ route('posts') }}">All Posts</a>
                            </li>
                            <li><a href="{{ route('post.create') }}">Create new posts</a>
                            </li>
                            <li><a href="{{ route('post.video') }}">Create video posts</a>
                            </li>
                            <li><a href="{{ route('post.trashed') }}">Trashed Post</a>
                            </li>
                                                                                           
                          </ul>
                      </div>
                    </li>

                    <li class="p-1">
                      <a data-toggle="collapse" href="#formsExamples61" aria-expanded="true" class="">Gallery</a>
                      <div class="collapse in" id="formsExamples61" aria-expanded="true" style="">
                          <ul >
                            
                            <li><a href="{{ route('gallery.index2') }}">Gallery</a>
                            </li>

                            <li><a href="{{ route('gallery') }}">Create Gallery</a>
                            </li>
                                                                                           
                          </ul>
                      </div>
                    </li>
                    
                    <li class="p-1">
                      <a data-toggle="collapse" href="#formsExamples4" aria-expanded="true" class="">Products</a>
                      <div class="collapse in" id="formsExamples4" aria-expanded="true" style="">
                          <ul >
                            <li><a href="{{ route('products') }}">All Product</a>
                            </li>
                            <li><a href="{{ route('product.create') }}">Create new posts</a>
                            </li>
                                                                                           
                          </ul>
                      </div>
                    </li>

                    <li class="p-1">
                      <a data-toggle="collapse" href="#formsExamples5" aria-expanded="true" class="">Booklist</a>
                      <div class="collapse in" id="formsExamples5" aria-expanded="true" style="">
                          <ul >
                            <li><a href="{{ route('books.admin') }}">All Booklist</a>
                            </li>
                            <li><a href="{{ route('books.rekapbln') }}">Rekap bln</a>
                            </li>
                            <li><a href="{{ route('books.rekapblnn') }}">Rekap thn</a>
                            </li>
                            
                            
                                                                                           
                          </ul>
                      </div>
                    </li>

                    <li class="p-1">
                      <a data-toggle="collapse" href="#formsExamples6" aria-expanded="true" class="">Member</a>
                      <div class="collapse in" id="formsExamples6" aria-expanded="true" style="">
                          <ul >
                            <li><a href="{{ route('member.admin') }}">All Member</a>
                            </li>
                            
                                                                                           
                          </ul>
                      </div>
                    </li>
               
                    <li class="p-1">
                      <a data-toggle="collapse" href="#formsExamples7" aria-expanded="true" class="">Settings</a>
                      <div class="collapse in" id="formsExamples7" aria-expanded="true" style="">
                          <ul >
                            <li><a href="{{ route('user.profile') }}">My Profile</a>
                            </li>
                            <li><a href="{{ route('todos') }}">Make Memo</a>
                            </li>
                            @if(Auth::user()->admin)
                            <li><a href="{{ route('settings') }}">Settings</a>
                            </li>
                            @endif                                                              
                          </ul>
                      </div>
                    </li>                
                    
                  </ul>
                    
                  

                </div>

                @endif
                
                
                <div class="col-lg-10">

                    
                        @if(Session::has('success'))
               
                        <div class="alert alert-success alert-dismissible fade show mb-2" role="alert">
                          {{ Session::get('success') }}
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        
                        @endif

                        @if(Session::has('info'))
               
                        <div class="alert alert-info alert-dismissible fade show mb-2" role="alert">
                          {{ Session::get('info') }}
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        
                        @endif


                    

                    @yield('content')
                </div>

            </div>

        </div>







    </div>

    <!-- Scripts -->
    
 
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')

</body>
</html>
