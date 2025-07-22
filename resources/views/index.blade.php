<x-layout>
    <div class="container py-md-5">
      <div class="row align-items-center">
        <div class="col-lg-7 py-3 py-md-5">
          <img src="welcome.gif">
        </div>
        <div class="col-lg-5 pl-lg-5 pb-3 py-lg-5">
          <form action="/register" method="POST" id="registration-form">
            @csrf
            <div class="form-group">
              <label for="first-name-register" class="text-muted mb-1"><small>نام</small></label>
              <input value="{{old('first_name')  }}" name="first_name" id="first-name-register" class="form-control" type="text" placeholder="نام" autocomplete="off" />
              @error('first_name')
                <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
              @enderror
            </div>
            <div class="form-group">
              <label for="last-name-register" class="text-muted mb-1"><small>نام خانوادگی</small></label>
              <input value="{{old('last_name')  }}" name="last_name" id="last-name-register" class="form-control" type="text" placeholder="نام خانوادگی" autocomplete="off" />
              @error('last_name')
                <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
              @enderror
            </div>
            <div class="form-group">
              <label for="email-register" class="text-muted mb-1"><small>ایمیل</small></label>
              <input value="{{old('email')  }}" name="email" id="email-register" class="form-control" type="text" placeholder="you@example.com" autocomplete="off" />
              @error('email')
                <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
              @enderror
            </div>

            <div class="form-group">
              <label for="password-register" class="text-muted mb-1"><small>رمز عبور</small></label>
              <input name="password" id="password-register" class="form-control" type="password" placeholder="رمز عبور" />
              @error('password')
                <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
              @enderror
            </div>
            <button type="submit" class="btn btn-sm btn-animated mr-2">ثبت نام</button>
          </form>
        </div>
      </div>
    </div>
  </x-layout>
