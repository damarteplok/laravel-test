@extends('master.master2')

@section('content')


<div class="container mt-5">
    <div class="row">
        <div class="col col-md-6 offset-md-3">
            <div class="card my-5">
                <div class="card-header">Customer Login</div>
                <div class="card-body mx-3">
                    <div class="card-text">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('customer.login.submit2') }}">
                            {{ csrf_field() }}
                            

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" >E-Mail Address</label>

                                
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                               
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" >Password</label>

                                
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                               
                            </div>

                            <div class="form-group">
                                
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                        </label>
                                    </div>
                                
                            </div>

                            <div class="form-group">
                                
                                    <button type="submit" class="btn btn-primary">
                                        Login
                                    </button>

                                    <a class="btn btn-link" href="{{ route('customer.password.request') }}">
                                        Forgot Your Password?
                                    </a>
                                
                            </div>
                        </form>
                            <div class="form-group">
                                <div >
                                    <a class="btn btn-primary btn-lg btn-block" href="{{ route('regis.customer2') }}">
                                                    register
                                                </a>
                                </div>
                            </div>

                            
                       {{--  </form> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection