<x-layout>
    <div class="container py-md-5">
      <div class="row align-items-center">
        <div class="col-lg-3 py-3 py-md-5">
        </div>
        <div class="col-lg-5 pl-lg-5 pb-3 py-lg-5">
          <form action="/user-information/user/{{Auth::user()->id}}" method="POST" id="registration-form">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="first-name-register" class="text-muted mb-1"><small>First name</small></label>
              <input value="{{Auth::user()->first_name}}" name="first_name" id="first-name-register" class="form-control" type="text" placeholder="First Name" autocomplete="off" />
              @error('first_name')
                <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
              @enderror
            </div>
            <div class="form-group">
              <label for="last-name-register" class="text-muted mb-1"><small>Last name</small></label>
              <input value="{{Auth::user()->last_name}}" name="last_name" id="last-name-register" class="form-control" type="text" placeholder="Last Name" autocomplete="off" />
              @error('last_name')
                <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
              @enderror
            </div>

            <div class="form-group">
              <label for="address-register" class="text-muted mb-1"><small>address</small></label>
              <input value="{{Auth::user()->profile->address}}" name="address" id="address-register" class="form-control" type="text" placeholder="Address" autocomplete="off" />
              @error('address')
                <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
              @enderror
            </div>
            <div class="form-group">
              <label for="postal-code-register" class="text-muted mb-1"><small>Postal Code</small></label>
              <input value="{{Auth::user()->profile->postal_code  }}" name="postal_code" id="postal-code-register" class="form-control" type="text" placeholder="Postal Code" />
              @error('postal_code')
                <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
              @enderror
            </div>
            <button type="submit" class="py-3 mt-4 btn btn-lg btn-block" style="background-color: #34699A; color: #FDF5AA; ">Save Changes</button>
          </form>
        </div>
        <div class="col-lg-3 py-3 py-md-5">
        </div>
      </div>
    </div>
  </x-layout>

