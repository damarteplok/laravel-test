
<div class="container mt-2">
  <div class="row">
    <div class="col-10 offset-1">
                        @if(Session::has('success'))
               
                        <div class="alert alert-success alert-dismissible fade show mb-2" role="alert">
                          {{ Session::get('success') }}
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        
                        @endif
      <div class="card text-white bg-warning text-md-center">
        <div class="card-header">
          Subscribe
        </div>
        <div class="card-body">
          <div class="card-title">
            Newslatter
          </div>
          <div class="card-text">
            Join the weekly newsletter never miss out, and more.
            <form  method="post" action="/subscribe">
            {{ csrf_field() }}
            <input class="form-control col-md-8 offset-md-2 text-md-center" type="email" placeholder="Email Address" required="required" name="email">
                    
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



