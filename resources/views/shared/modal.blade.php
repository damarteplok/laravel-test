<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Setting</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">
        
          @include('admin.include.error')

          <form action="{{ route('customer.profile.update') }}" method="post">
          {{ csrf_field() }}

          <div class="form-group">
            <label for="name">Username</label>
            <input type="text" name="name" value="{{ $member->name }}" class="form-control">
          </div>

          <input type="hidden" name="id" value="{{ $member->id }}">

          <div class="form-group">
            <label for="name">Email</label>
            <input type="email" name="email" value="{{ $member->email }}" class="form-control">
          </div>

          <div class="form-group">
            <label for="name">New Password</label>
            <input type="password" name="password" class="form-control" placeholder="Enter new password">
          </div>
          
          <div class="form-group">
            <label for="nohp">Nohp</label>
            <input type="text" name="nohp" value="{{ $member->nohp }}" class="form-control">
          </div>

          <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" value="{{ $member->alamat }}" class="form-control">
          </div>

          

          <div class="form-group">
            <div class="text-center">
              <button class="btn btn-success" type="submit">Update profile</button>
            </div>
          </div>
        </form>
        
      </div>
     {{--  <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> --}}
      
    </div>
  </div>
</div>