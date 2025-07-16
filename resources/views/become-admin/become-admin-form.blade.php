<x-layout>
    <div class="container py-md-5">
      <div class="row align-items-center">
        <div class="col-lg-3 py-3 py-md-5">
        </div>
        <div class="col-lg-5 pl-lg-5 pb-3 py-lg-5">
          <form action="/become-admin/{{Auth::user()->id}}" method="POST" id="registration-form">
            @csrf
            <div class="form-group">
              <label for="national-code-register" class="text-muted mb-1"><small>National Code</small></label>
              <input value="{{old('national_code')}}" name="national_code" id="national-code-register" class="form-control" type="text" placeholder="National Code" autocomplete="off" />
              @error('national_code')
                <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
              @enderror
            </div>
            <div class="information">
              <label style="text-align: left" for="information" class="text-muted mb-1"><small>information(Work Experience)</small></label>
              <input style="text-align: left;" value="{{old('information')}}" name="information"  class="form-control" type="text" placeholder="Information" autocomplete="off" />
            </div>
            <div class="form-group">
              <label for="age-register" class="text-muted mb-1"><small>Age</small></label>
              <input name="age" id="age-register" class="form-control" type="number" min="0" max="100" placeholder="Age" />
            </div>
            <button type="submit" class="py-3 mt-4 btn btn-lg btn-block" style="background-color: #34699A; color: #FDF5AA; ">Set me seller</button>
          </form>
        </div>
        <div class="col-lg-3 py-3 py-md-5">
        </div>
      </div>
    </div>
  </x-layout>


