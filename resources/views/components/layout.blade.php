<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Spare Site Sam</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />
    <script defer src="https://use.fontawesome.com/releases/v5.5.0/js/all.js" integrity="sha384-GqVMZRt5Gn7tB9D9q7ONtcp4gtHIUEW/yG7h98J7IpE3kpi+srfFyyB/04OV6pG0" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Winky+Rough:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Winky+Rough:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Arabic:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('main.css') }}" />
  </head>
  <body>
    <header class="header-bar mb-3">
      <div class="container d-flex flex-column flex-md-row align-items-center p-3">
        
        <h4 class="my-0 mr-md-auto font-weight-normal"><a href="/" class="text-white">سایت یدکی سم</a></h4>
        @auth
          <div class="flex-row my-3 my-md-0">
            <a href="/search" class="text-white mr-2 header-search-icon"  title="جست و جو" data-toggle="tooltip" data-placement="bottom"><i class="fas fa-search"></i></a>
            @if((bool)Auth::user()->profile)
              <a href="/single-profile/user/{{Auth::user()->id}}" class="mr-2"><img class="profile-image" title="پروفایل" data-toggle="tooltip" data-placement="bottom"  src="{{auth()->user()->avatar_url}}" /></a>
            @endif
            <a href="/"class="btn btn-sm btn-animated mr-2">داشبورد </a> 
            @if(Auth::user()->profile)
              @if(Auth::user()->role == "admin")
                @if(!(Auth::user()->admin))
                  <a class="btn btn-sm btn-animated mr-2" href="/become-admin/{{Auth::user()->id}}">اطلاعات ادمین</a>
                @elseif(Auth::user()->admin)
                  <a class="btn btn-sm btn-animated mr-2 disabled" ><strong>ادمین:</strong><span> {{Auth::user()->first_name}} </span></a>
                @endif
              @endif
              <a class="btn btn-sm btn-animated mr-2 disabled">پروفایل تکمیل شده است</a>
            @else
              <a class="btn btn-sm btn-animated mr-2"  href="/complete-profile-user/{{Auth::user()->id}}">کامل کردن پروفایل</a>
            @endif
            <form action="/logout" method="POST" class="d-inline">
              @csrf
              <button class="btn btn-sm btn-animated mr-2">خروج</button>
            </form>
            @php
              $isBanned = \App\Models\Ban::where('user_id', Auth::user()->id)->exists();
            @endphp
            @if (Auth::user()->customer)
              @if($isBanned)
                <form action="/shopping-cart" method="GET" class="d-inline">
                  <button disabled class="btn btn-sm btn-animated mr-2" >
                    {{count(Auth::user()->customer->orders)  }}
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag" viewBox="0 0 16 16">
                      <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z"/>
                    </svg>               
                  </button>
                </form>
              @else
                <form action="/shopping-cart" method="GET" class="d-inline">
                  <button class="btn btn-sm btn-animated mr-2" >
                    {{count(Auth::user()->customer->orders)  }}
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag" viewBox="0 0 16 16">
                      <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z"/>
                    </svg>               

                  </button>
                </form>
              @endif
            @endif
          </div>
        @else
          <form action="/login" method="POST" class="mb-0 pt-2 pt-md-0">
            @csrf
              <div class="row align-items-center">
                <div class="col-md mr-0 pr-md-0 mb-3 mb-md-0">
                  <input name="email" class="form-control form-control-sm input-dark" type="text" placeholder="ایمیل" autocomplete="off" />
                                    
                </div>
                <div class="col-md mr-0 pr-md-0 mb-3 mb-md-0">
                  <input name="password" class="form-control form-control-sm input-dark" type="password" placeholder="رمز عبور" />
                </div>
                <div class="col-md-auto">
                  <button class="btn btn-sm btn-animated mr-2" >ورود</button>
                </div>
              </div>
          </form>
        @endauth
 
      </div>
    </header>
    <!-- header ends here -->
    @if(session()->has('success'))
    <div x-data="{ show: true }" 
        x-init="setTimeout(() => show = false, 3000)"
        x-show="show"
        x-transition
        class="container container--narrow">
        <div class="success-message">
            {{ session('success') }}
        </div>
    </div>
    @endif

    @if(session()->has('error'))
      <div x-data="{ show: true }" 
        x-init="setTimeout(() => show = false, 3000)"
        x-show="show"
        x-transition
        class="container container--narrow">
        <div class="error-message">
          {{ session('error') }}
        </div>
      </div>
    @endif



    {{$slot}}
    <!-- footer begins -->
    <footer class="border-top text-center small text-muted py-3">
      <p class="m-0">Copyright &copy; {{date('Y/m/d')  }} <a href="/" class="text-muted">Sam Project</a>. All rights reserved.</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script>
      $('[data-toggle="tooltip"]').tooltip()
    </script>
  </body>
</html>