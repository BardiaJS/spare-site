<!DOCTYPE html>
<html lang="fa" dir="rtl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>سایت یدکی سم - فروشگاه قطعات یدکی</title>
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
    <style>
        :root {
            --primary: #2c5aa0;
            --primary-dark: #1e3d72;
            --secondary: #ff6b35;
            --accent: #00a8cc;
            --light: #f8f9fa;
            --dark: #2d3748;
            --success: #28a745;
            --danger: #dc3545;
            --warning: #ffc107;
            --info: #17a2b8;
        }
        
        * {
            box-sizing: border-box;
        }
        
        body {
            font-family: "Noto Sans Arabic", "Nunito", sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #e4e8f0 100%);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        
        /* هدر بهبود یافته */
        .header-bar {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            border-bottom: none;
            position: relative;
            overflow: hidden;
        }
        
        .header-bar::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 100%;
            height: 100%;
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none"><path d="M0,0 L100,0 L100,100 Z" fill="rgba(255,255,255,0.1)"/></svg>');
            background-size: cover;
        }
        
        .header-bar .container {
            position: relative;
            z-index: 1;
        }
        
        .header-bar h4 a {
            font-weight: 700;
            font-size: 1.5rem;
            text-decoration: none;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
        }
        
        .header-bar h4 a:hover {
            transform: translateY(-2px);
            text-shadow: 0 2px 10px rgba(255, 255, 255, 0.3);
        }
        
        .header-bar h4 a::before {
            content: "⚙️";
            margin-left: 10px;
            font-size: 1.3rem;
        }
        
        /* دکمه‌های هدر */
        .btn-animated {
            background: linear-gradient(135deg, var(--secondary) 0%, #ff8c42 100%);
            border: none;
            border-radius: 50px;
            color: white;
            font-weight: 600;
            padding: 8px 20px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(255, 107, 53, 0.3);
            position: relative;
            overflow: hidden;
        }
        
        .btn-animated::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #ff8c42 0%, var(--secondary) 100%);
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: -1;
        }
        
        .btn-animated:hover {
            transform: translateY(-3px);
            box-shadow: 0 7px 20px rgba(255, 107, 53, 0.4);
            color: white;
        }
        
        .btn-animated:hover::before {
            opacity: 1;
        }
        
        .btn-animated:active {
            transform: translateY(-1px);
        }
        
        .btn-animated.disabled {
            background: linear-gradient(135deg, #6c757d 0%, #5a6268 100%);
            box-shadow: 0 4px 15px rgba(108, 117, 125, 0.3);
            cursor: not-allowed;
        }
        
        .btn-animated.disabled:hover {
            transform: none;
            box-shadow: 0 4px 15px rgba(108, 117, 125, 0.3);
        }
        
        /* آیکون‌های هدر */
        .header-search-icon {
            background: rgba(255, 255, 255, 0.2);
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
        }
        
        .header-search-icon:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: scale(1.1);
        }
        
        /* تصویر پروفایل */
        .profile-image {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border: 2px solid rgba(255, 255, 255, 0.5);
            transition: all 0.3s ease;
            object-fit: cover;
        }
        
        .profile-image:hover {
            border-color: white;
            transform: scale(1.1);
            box-shadow: 0 0 15px rgba(255, 255, 255, 0.5);
        }
        
        /* فرم لاگین */
        .input-dark {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 50px;
            color: white;
            padding: 10px 20px;
            transition: all 0.3s ease;
        }
        
        .input-dark::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }
        
        .input-dark:focus {
            background: rgba(255, 255, 255, 0.2);
            border-color: rgba(255, 255, 255, 0.5);
            box-shadow: 0 0 0 0.2rem rgba(255, 255, 255, 0.25);
            color: white;
        }
        
        /* پیام‌های سیستم */
        .success-message, .error-message {
            padding: 15px 20px;
            border-radius: 10px;
            margin: 20px auto;
            font-weight: 600;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            border: none;
            text-align: center;
            max-width: 600px;
        }
        
        .success-message {
            background: linear-gradient(135deg, var(--success) 0%, #20c997 100%);
            color: white;
        }
        
        .error-message {
            background: linear-gradient(135deg, var(--danger) 0%, #c82333 100%);
            color: white;
        }
        
        /* محتوای اصلی */
        .main-content {
            flex: 1;
            padding: 30px 0;
        }
        
        /* فوتر */
        footer {
            background: linear-gradient(135deg, var(--dark) 0%, #1a202c 100%);
            color: rgba(255, 255, 255, 0.8);
            margin-top: auto;
            border-top: none;
            box-shadow: 0 -5px 15px rgba(0, 0, 0, 0.1);
        }
        
        footer a {
            color: var(--secondary);
            transition: all 0.3s ease;
            text-decoration: none;
            font-weight: 600;
        }
        
        footer a:hover {
            color: white;
            text-decoration: none;
        }
        
        /* آیکون سبد خرید */
        .bi-bag {
            transition: all 0.3s ease;
        }
        
        .btn-animated:hover .bi-bag {
            transform: scale(1.2);
        }
        
        /* رسپانسیو */
        @media (max-width: 768px) {
            .header-bar .container {
                flex-direction: column;
                text-align: center;
            }
            
            .header-bar h4 {
                margin-bottom: 15px;
            }
            
            .flex-row {
                justify-content: center;
                flex-wrap: wrap;
            }
            
            .flex-row a, .flex-row form, .flex-row button {
                margin-bottom: 10px;
            }
            
            .input-dark {
                margin-bottom: 10px;
            }
        }
        
        /* انیمیشن‌های ظریف */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .header-bar, .main-content, footer {
            animation: fadeIn 0.8s ease-out;
        }
        
        /* افکت‌های ویژه برای المان‌های تعاملی */
        .tooltip {
            font-family: "Noto Sans Arabic", "Nunito", sans-serif;
        }
        
        /* بهبود فرم‌ها */
        form.d-inline {
            display: inline-block;
        }
        
        /* استایل برای دکمه‌های غیرفعال */
        .btn-animated:disabled {
            opacity: 0.6;
            cursor: not-allowed;
        }
        
        /* افکت‌های بصری اضافی */
        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 10px;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
    </style>
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
    
    <div class="main-content">
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
    </div>
    
    <!-- footer begins -->
    <footer class="border-top text-center small text-muted py-3">
      <p class="m-0">Copyright &copy; {{date('Y/m/d')  }} <a href="/" class="text-muted">Sam Project</a>. All rights reserved.</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script>
      $('[data-toggle="tooltip"]').tooltip()
      
      // افزودن انیمیشن‌های اضافی
      document.addEventListener('DOMContentLoaded', function() {
          // افکت اسکرول نرم
          document.querySelectorAll('a[href^="#"]').forEach(anchor => {
              anchor.addEventListener('click', function (e) {
                  e.preventDefault();
                  document.querySelector(this.getAttribute('href')).scrollIntoView({
                      behavior: 'smooth'
                  });
              });
          });
          
          // افکت hover پیشرفته برای دکمه‌ها
          document.querySelectorAll('.btn-animated').forEach(button => {
              button.addEventListener('mouseenter', function() {
                  if (!this.disabled) {
                      this.style.transform = 'translateY(-3px)';
                  }
              });
              
              button.addEventListener('mouseleave', function() {
                  if (!this.disabled) {
                      this.style.transform = 'translateY(0)';
                  }
              });
          });
      });
    </script>
  </body>
</html>