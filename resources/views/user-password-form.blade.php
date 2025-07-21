<x-layout>
    <div class="container py-md-5">
      <div class="row align-items-center">
        <div class="col-lg-3 py-3 py-md-5">
        </div>
        <div class="col-lg-5 pl-lg-5 pb-3 py-lg-5">
          <form action="/user-password/user/{{Auth::user()->id}}" method="POST" id="registration-form">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="current-password-register" class="text-muted mb-1"><small>Current Password</small></label>
              <input name="current_password" id="current-password-register" class="form-control" type="password" placeholder="Current Password" autocomplete="off" />
              @error('current_password')
                <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
              @enderror
            </div>
            <div class="form-group">
              <label for="new-password-register" class="text-muted mb-1"><small>New Password</small></label>
              <input name="new_password" id="new-password-register" class="form-control" type="password" placeholder="New Password" autocomplete="off" />
              @error('new_password')
                <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
              @enderror
            </div>
            <button type="submit" class="btn btn-sm btn-animated mr-2">Change Password</button>
          </form>
        </div>
        <div class="col-lg-3 py-3 py-md-5">
        </div>
      </div>
    </div>
  </x-layout>

