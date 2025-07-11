<x-layout>
    <div class="container py-md-5">
      <div class="row align-items-center">
        <div class="col-lg-3 py-3 py-md-5">
        </div>
        <div class="col-lg-5 pl-lg-5 pb-3 py-lg-5">
          <form action="/become-admin/{{Auth::user()->id}}" method="POST" id="registration-form">
            @csrf
            <div class="form-group">
              <label for="phone-register" class="text-muted mb-1"><small>Phone Number</small></label>
              <input value="{{old('phone')  }}" name="phone" id="phone-register" class="form-control" type="text" placeholder="Phone Number" autocomplete="off" />
              @error('phone')
                <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
              @enderror
            </div>
            <div class="form-group">
              <label for="address-register" class="text-muted mb-1"><small>address</small></label>
              <input value="{{old('address')  }}" name="address" id="address-register" class="form-control" type="text" placeholder="Address" autocomplete="off" />
              @error('address')
                <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
              @enderror
            </div>
            <div class="form-group">
              <label for="postal-code-register" class="text-muted mb-1"><small>Postal Code</small></label>
              <input name="postal_code" id="postal-code-register" class="form-control" type="text" placeholder="Postal Code" />
              @error('postal_code')
                <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
              @enderror
            </div>
            <div class="form-group" style="height: 500px;">
              <label for="information-register" class="text-muted mb-1"><small>information(Work Experience)</small></label>
              <input value="{{old('information')}}" name="information" id="information-register" class="form-control" type="text" placeholder="Information" style="height: 400px; text-align:left;" autocomplete="off" />

            </div>
            <div class="form-group">
              <label for="age-register" class="text-muted mb-1"><small>Age</small></label>
              <input name="age" id="age-register" class="form-control" type="number" min="0" max="100" placeholder="Age" />
            </div>
            <button type="submit" class="py-3 mt-4 btn btn-lg btn-block" style="background-color: #0ef5b0; ">Set me seller</button>
          </form>
        </div>
        <div class="col-lg-3 py-3 py-md-5">
        </div>
      </div>
    </div>
  </x-layout>


