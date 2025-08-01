<x-layout>
    <div class="container py-md-5">
      <div class="row align-items-center">
        <div class="col-lg-3 py-3 py-md-5">
        </div>
        <div class="col-lg-5 pl-lg-5 pb-3 py-lg-5">
          <form action="/complete-profile-user/{{Auth::user()->id}}" method="POST" id="registration-form">
            @csrf

            <div class="form-group">
              <label for="phone-register" class="text-muted mb-1"><small>شماره موبایل</small></label>
              <input value="{{old('phone')  }}" name="phone" id="phone-register" class="form-control" type="text" placeholder="شماره موبایل" autocomplete="off" />
              @error('phone')
                <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
              @enderror
            </div>
            <div class="form-group">
              <label for="address-register" class="text-muted mb-1"><small>آدرس </small></label>
              <input value="{{old('address')  }}" name="address" id="address-register" class="form-control" type="text" placeholder="آدرس" autocomplete="off" />
              @error('address')
                <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
              @enderror
            </div>
            <div class="form-group">
              <label for="postal-code-register" class="text-muted mb-1"><small>کد پستی</small></label>
              <input name="postal_code" id="postal-code-register" class="form-control" type="text" placeholder="کد پستی" />
              @error('postal_code')
                <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
              @enderror
            </div>
            <button type="submit" class="btn btn-sm btn-animated mr-2">اتمام پروفایل</button>
          </form>
        </div>
        <div class="col-lg-3 py-3 py-md-5">
        </div>
      </div>
    </div>
  </x-layout>

