<x-layout>
    <div class="container py-md-5">
      <div class="row align-items-center">
        <div class="col-lg-3 py-3 py-md-5">
        </div>
        <div class="col-lg-5 pl-lg-5 pb-3 py-lg-5">
          <form action="/admin-information/admin/{{Auth::user()->admin->id}}" method="POST" id="registration-form">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="information-register" class="text-muted mb-1"><small>Information</small></label>
              <input value="{{Auth::user()->admin->information}}" name="information" id="information-register" class="form-control" type="text" placeholder="Information" autocomplete="off" />
              @error('information')
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

