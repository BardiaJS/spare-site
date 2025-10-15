
<x-layout>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap');
    
    .user-profile-container {
      font-family: 'Nunito', sans-serif;
      background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
      min-height: 100vh;
      padding: 40px 0;
    }
    
    .profile-card {
      background: white;
      border-radius: 16px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      max-width: 500px;
      margin: 0 auto;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    
    .profile-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
    }
    
    .profile-header {
      background: linear-gradient(135deg, #113F67 0%, #34699A 100%);
      color: white;
      padding: 30px;
      text-align: center;
      position: relative;
    }
    
    .profile-header::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 4px;
      background: linear-gradient(90deg, #58A0C8, #FDF5AA);
    }
    
    .profile-icon {
      width: 80px;
      height: 80px;
      background: rgba(255, 255, 255, 0.2);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 15px;
      border: 3px solid rgba(255, 255, 255, 0.3);
    }
    
    .profile-title {
      font-size: 24px;
      font-weight: 700;
      margin: 0;
    }
    
    .profile-subtitle {
      font-size: 14px;
      opacity: 0.9;
      margin: 5px 0 0;
    }
    
    .profile-form {
      padding: 30px;
    }
    
    .form-group {
      margin-bottom: 25px;
      position: relative;
    }
    
    .form-label {
      display: block;
      margin-bottom: 8px;
      font-weight: 600;
      color: #113F67;
      font-size: 14px;
      transition: color 0.3s ease;
    }
    
    .form-control {
      width: 100%;
      padding: 12px 16px;
      border: 2px solid #e1e5eb;
      border-radius: 8px;
      font-size: 16px;
      font-family: 'Nunito', sans-serif;
      transition: all 0.3s ease;
      background: #f8f9fa;
    }
    
    .form-control:focus {
      outline: none;
      border-color: #58A0C8;
      background: white;
      box-shadow: 0 0 0 3px rgba(88, 160, 200, 0.1);
    }
    
    .form-control::placeholder {
      color: #a0a4a8;
    }
    
    .input-icon {
      position: absolute;
      left: 12px;
      top: 38px;
      color: #58A0C8;
    }
    
    .form-group:focus-within .form-label {
      color: #58A0C8;
    }
    
    .error-message {
      color: #e74c3c;
      font-size: 12px;
      margin-top: 5px;
      display: flex;
      align-items: center;
      gap: 5px;
      font-weight: 600;
    }
    
    .error-message::before {
      content: '⚠';
      font-size: 14px;
    }
    
    .btn-submit {
      background: linear-gradient(135deg, #58A0C8 0%, #34699A 100%);
      color: white;
      border: none;
      border-radius: 8px;
      padding: 14px 30px;
      font-size: 16px;
      font-weight: 700;
      font-family: 'Nunito', sans-serif;
      cursor: pointer;
      transition: all 0.3s ease;
      width: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
      box-shadow: 0 4px 15px rgba(88, 160, 200, 0.3);
    }
    
    .btn-submit:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(88, 160, 200, 0.4);
      background: linear-gradient(135deg, #4a8db3 0%, #2a5780 100%);
    }
    
    .btn-submit:active {
      transform: translateY(0);
    }
    
    .form-divider {
      height: 1px;
      background: linear-gradient(90deg, transparent, #e1e5eb, transparent);
      margin: 30px 0;
    }
    
    /* Responsive adjustments */
    @media (max-width: 576px) {
      .user-profile-container {
        padding: 20px 15px;
      }
      
      .profile-header {
        padding: 20px;
      }
      
      .profile-form {
        padding: 20px;
      }
      
      .profile-icon {
        width: 60px;
        height: 60px;
      }
      
      .profile-title {
        font-size: 20px;
      }
    }
    
    /* Animation for form elements */
    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
    
    .form-group {
      animation: fadeInUp 0.5s ease forwards;
    }
    
    .form-group:nth-child(1) { animation-delay: 0.1s; }
    .form-group:nth-child(2) { animation-delay: 0.2s; }
    .form-group:nth-child(3) { animation-delay: 0.3s; }
    .form-group:nth-child(4) { animation-delay: 0.4s; }
  </style>
  
  <div class="user-profile-container">
    <div class="container">
      <div class="profile-card">
        <!-- Header Section -->
        <div class="profile-header">
          <div class="profile-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" viewBox="0 0 16 16">
              <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
              <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
            </svg>
          </div>
          <h1 class="profile-title">اطلاعات کاربری</h1>
          <p class="profile-subtitle">اطلاعات شخصی خود را به روز رسانی کنید</p>
        </div>
        
        <!-- Form Section -->
        <form action="/user-information/user/{{Auth::user()->id}}" method="POST" id="registration-form" class="profile-form">
          @csrf
          @method('PUT')
          
          <div class="form-group">
            <label for="first-name-register" class="form-label">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="input-icon" viewBox="0 0 16 16">
                <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
              </svg>
              نام
            </label>
            <input value="{{Auth::user()->first_name}}" name="first_name" id="first-name-register" class="form-control" type="text" placeholder="نام خود را وارد کنید" autocomplete="off" />
            @error('first_name')
              <p class="error-message">{{$message}}</p>
            @enderror
          </div>
          
          <div class="form-group">
            <label for="last-name-register" class="form-label">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="input-icon" viewBox="0 0 16 16">
                <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
              </svg>
              نام خانوادگی
            </label>
            <input value="{{Auth::user()->last_name}}" name="last_name" id="last-name-register" class="form-control" type="text" placeholder="نام خانوادگی خود را وارد کنید" autocomplete="off" />
            @error('last_name')
              <p class="error-message">{{$message}}</p>
            @enderror
          </div>
          
          <div class="form-divider"></div>
          
          <div class="form-group">
            <label for="address-register" class="form-label">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="input-icon" viewBox="0 0 16 16">
                <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
              </svg>
              آدرس
            </label>
            <input value="{{Auth::user()->profile->address}}" name="address" id="address-register" class="form-control" type="text" placeholder="آدرس خود را وارد کنید" autocomplete="off" />
            @error('address')
              <p class="error-message">{{$message}}</p>
            @enderror
          </div>
          
          <div class="form-group">
            <label for="postal-code-register" class="form-label">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="input-icon" viewBox="0 0 16 16">
                <path d="M6.5 1A1.5 1.5 0 0 0 5 2.5V3H4a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1v4.5A1.5 1.5 0 0 0 5.5 12h5A1.5 1.5 0 0 0 12 10.5V6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1h-1v-.5A1.5 1.5 0 0 0 9.5 1h-3zM6.5 2h3a.5.5 0 0 1 .5.5V3H6v-.5a.5.5 0 0 1 .5-.5zM5 6h6v4.5a.5.5 0 0 1-.5.5h-5a.5.5 0 0 1-.5-.5V6z"/>
              </svg>
              کدپستی
            </label>
            <input value="{{Auth::user()->profile->postal_code}}" name="postal_code" id="postal-code-register" class="form-control" type="text" placeholder="کدپستی خود را وارد کنید" />
            @error('postal_code')
              <p class="error-message">{{$message}}</p>
            @enderror
          </div>
          
          <button type="submit" class="btn-submit">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
              <path d="M2 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H9.5a1 1 0 0 0-1 1v4.5h-4a.5.5 0 0 0-.354.854l4 4a.5.5 0 0 0 .708 0l4-4A.5.5 0 0 0 11.5 6.5h-4V2H2z"/>
            </svg>
            ذخیره تغییرات
          </button>
        </form>
      </div>
    </div>
  </div>
</x-layout>