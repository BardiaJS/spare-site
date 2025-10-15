<x-layout>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap');
    
    .password-change-container {
      font-family: 'Nunito', sans-serif;
      background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
      min-height: 100vh;
      padding: 40px 0;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    
    .password-card {
      background: white;
      border-radius: 20px;
      box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      max-width: 480px;
      width: 100%;
      margin: 0 20px;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    
    .password-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 20px 45px rgba(0, 0, 0, 0.15);
    }
    
    .password-header {
      background: linear-gradient(135deg, #113F67 0%, #1e5a8a 100%);
      color: white;
      padding: 35px 30px;
      text-align: center;
      position: relative;
      overflow: hidden;
    }
    
    .password-header::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 4px;
      background: linear-gradient(90deg, #58A0C8, #FDF5AA);
    }
    
    .password-header::after {
      content: '';
      position: absolute;
      top: -50%;
      right: -50%;
      width: 100%;
      height: 200%;
      background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
    }
    
    .password-icon {
      width: 80px;
      height: 80px;
      background: rgba(255, 255, 255, 0.15);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 20px;
      border: 3px solid rgba(255, 255, 255, 0.2);
      backdrop-filter: blur(10px);
    }
    
    .password-title {
      font-size: 26px;
      font-weight: 800;
      margin: 0 0 8px;
      position: relative;
      z-index: 1;
    }
    
    .password-subtitle {
      font-size: 14px;
      opacity: 0.9;
      margin: 0;
      position: relative;
      z-index: 1;
    }
    
    .password-form {
      padding: 35px 30px;
    }
    
    .form-group {
      margin-bottom: 28px;
      position: relative;
    }
    
    .form-label {
      display: block;
      margin-bottom: 10px;
      font-weight: 700;
      color: #113F67;
      font-size: 14px;
      transition: color 0.3s ease;
      display: flex;
      align-items: center;
      gap: 8px;
    }
    
    .form-control {
      width: 100%;
      padding: 14px 50px 14px 16px;
      border: 2px solid #e1e8ed;
      border-radius: 12px;
      font-size: 16px;
      font-family: 'Nunito', sans-serif;
      transition: all 0.3s ease;
      background: #f8f9fa;
      color: #2c3e50;
    }
    
    .form-control:focus {
      outline: none;
      border-color: #58A0C8;
      background: white;
      box-shadow: 0 0 0 4px rgba(88, 160, 200, 0.15);
      transform: translateY(-1px);
    }
    
    .form-control::placeholder {
      color: #a0a4a8;
    }
    
    .password-toggle {
      position: absolute;
      left: 15px;
      top: 50%;
      transform: translateY(-50%);
      background: none;
      border: none;
      color: #6c757d;
      cursor: pointer;
      padding: 5px;
      border-radius: 4px;
      transition: all 0.3s ease;
    }
    
    .password-toggle:hover {
      color: #58A0C8;
      background: rgba(88, 160, 200, 0.1);
    }
    
    .password-strength {
      margin-top: 8px;
      height: 4px;
      background: #e9ecef;
      border-radius: 2px;
      overflow: hidden;
      position: relative;
    }
    
    .password-strength-bar {
      height: 100%;
      width: 0%;
      border-radius: 2px;
      transition: all 0.3s ease;
    }
    
    .strength-weak { background: #e74c3c; width: 33%; }
    .strength-medium { background: #f39c12; width: 66%; }
    .strength-strong { background: #27ae60; width: 100%; }
    
    .strength-text {
      font-size: 11px;
      margin-top: 4px;
      text-align: left;
      font-weight: 600;
    }
    
    .strength-weak-text { color: #e74c3c; }
    .strength-medium-text { color: #f39c12; }
    .strength-strong-text { color: #27ae60; }
    
    .form-group:focus-within .form-label {
      color: #58A0C8;
    }
    
    .error-message {
      color: #e74c3c;
      font-size: 12px;
      margin-top: 6px;
      display: flex;
      align-items: center;
      gap: 6px;
      font-weight: 600;
      background: rgba(231, 76, 60, 0.08);
      padding: 8px 12px;
      border-radius: 6px;
      border-right: 3px solid #e74c3c;
    }
    
    .error-message::before {
      content: '⚠';
      font-size: 14px;
    }
    
    .btn-submit {
      background: linear-gradient(135deg, #27ae60 0%, #2ecc71 100%);
      color: white;
      border: none;
      border-radius: 12px;
      padding: 16px 30px;
      font-size: 16px;
      font-weight: 700;
      font-family: 'Nunito', sans-serif;
      cursor: pointer;
      transition: all 0.3s ease;
      width: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
      box-shadow: 0 4px 15px rgba(39, 174, 96, 0.3);
      margin-top: 10px;
    }
    
    .btn-submit:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 25px rgba(39, 174, 96, 0.4);
      background: linear-gradient(135deg, #229954 0%, #27ae60 100%);
    }
    
    .btn-submit:active {
      transform: translateY(0);
    }
    
    .security-tips {
      background: #f8f9fa;
      border-radius: 12px;
      padding: 20px;
      margin-top: 25px;
      border-right: 4px solid #58A0C8;
    }
    
    .security-title {
      font-weight: 700;
      color: #113F67;
      margin-bottom: 12px;
      display: flex;
      align-items: center;
      gap: 8px;
      font-size: 14px;
    }
    
    .security-list {
      list-style: none;
      padding: 0;
      margin: 0;
    }
    
    .security-list li {
      font-size: 12px;
      color: #6c757d;
      margin-bottom: 6px;
      display: flex;
      align-items: center;
      gap: 6px;
    }
    
    .security-list li::before {
      content: '✓';
      color: #27ae60;
      font-weight: bold;
      font-size: 10px;
    }
    
    /* Responsive adjustments */
    @media (max-width: 576px) {
      .password-change-container {
        padding: 20px 15px;
      }
      
      .password-header {
        padding: 25px 20px;
      }
      
      .password-form {
        padding: 25px 20px;
      }
      
      .password-icon {
        width: 60px;
        height: 60px;
      }
      
      .password-title {
        font-size: 22px;
      }
    }
    
    /* Animation for form elements */
    @keyframes slideInUp {
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
      animation: slideInUp 0.5s ease forwards;
    }
    
    .form-group:nth-child(1) { animation-delay: 0.1s; }
    .form-group:nth-child(2) { animation-delay: 0.2s; }
  </style>
  
  <div class="password-change-container">
    <div class="password-card">
      <!-- Header Section -->
      <div class="password-header">
        <div class="password-icon">
          <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
          </svg>
        </div>
        <h1 class="password-title">تغییر رمز عبور</h1>
        <p class="password-subtitle">رمز عبور خود را با دقت تغییر دهید</p>
      </div>
      
      <!-- Form Section -->
      <form action="/user-password/user/{{Auth::user()->id}}" method="POST" id="registration-form" class="password-form">
        @csrf
        @method('PUT')
        
        <div class="form-group">
          <label for="current-password-register" class="form-label">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
              <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
            </svg>
            رمز عبور فعلی
          </label>
          <div style="position: relative;">
            <input name="current_password" id="current-password-register" class="form-control" type="password" placeholder="رمز عبور فعلی خود را وارد کنید" autocomplete="current-password" />
            <button type="button" class="password-toggle" onclick="togglePassword('current-password-register')">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
              </svg>
            </button>
          </div>
          @error('current_password')
            <p class="error-message">{{$message}}</p>
          @enderror
        </div>
        
        <div class="form-group">
          <label for="new-password-register" class="form-label">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
              <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
            </svg>
            رمز عبور جدید
          </label>
          <div style="position: relative;">
            <input name="new_password" id="new-password-register" class="form-control" type="password" placeholder="رمز عبور جدید خود را وارد کنید" autocomplete="new-password" oninput="checkPasswordStrength(this.value)" />
            <button type="button" class="password-toggle" onclick="togglePassword('new-password-register')">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
              </svg>
            </button>
          </div>
          <div class="password-strength">
            <div class="password-strength-bar" id="password-strength-bar"></div>
          </div>
          <div class="strength-text" id="password-strength-text"></div>
          @error('new_password')
            <p class="error-message">{{$message}}</p>
          @enderror
        </div>
        
        <button type="submit" class="btn-submit">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16">
            <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.5.5 0 0 1-.933.008L5.12 9.56l-4.898-.003a.5.5 0 0 1-.353-.854L13.626.146a.5.5 0 0 1 .54-.11l1.688.688z"/>
          </svg>
          ذخیره تغییرات
        </button>
        
        <div class="security-tips">
          <div class="security-title">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
              <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
            </svg>
            نکات امنیتی رمز عبور
          </div>
          <ul class="security-list">
            <li>حداقل ۸ کاراکتر داشته باشد</li>
            <li>از حروف بزرگ و کوچک استفاده شود</li>
            <li>شامل اعداد و کاراکترهای ویژه باشد</li>
            <li>از رمزهای قابل حدس استفاده نکنید</li>
          </ul>
        </div>
      </form>
    </div>
  </div>

  <script>
    function togglePassword(inputId) {
      const input = document.getElementById(inputId);
      const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
      input.setAttribute('type', type);
    }
    
    function checkPasswordStrength(password) {
      const strengthBar = document.getElementById('password-strength-bar');
      const strengthText = document.getElementById('password-strength-text');
      
      let strength = 0;
      let tips = '';
      
      if (password.length >= 8) strength++;
      if (password.match(/[a-z]/) && password.match(/[A-Z]/)) strength++;
      if (password.match(/\d/)) strength++;
      if (password.match(/[^a-zA-Z\d]/)) strength++;
      
      strengthBar.className = 'password-strength-bar';
      strengthText.className = 'strength-text';
      
      if (password.length === 0) {
        strengthBar.style.width = '0%';
        strengthText.textContent = '';
        return;
      }
      
      switch(strength) {
        case 1:
          strengthBar.classList.add('strength-weak');
          strengthText.classList.add('strength-weak-text');
          strengthText.textContent = 'رمز عبور ضعیف';
          break;
        case 2:
          strengthBar.classList.add('strength-weak');
          strengthText.classList.add('strength-weak-text');
          strengthText.textContent = 'رمز عبور ضعیف';
          break;
        case 3:
          strengthBar.classList.add('strength-medium');
          strengthText.classList.add('strength-medium-text');
          strengthText.textContent = 'رمز عبور متوسط';
          break;
        case 4:
          strengthBar.classList.add('strength-strong');
          strengthText.classList.add('strength-strong-text');
          strengthText.textContent = 'رمز عبور قوی';
          break;
        default:
          strengthBar.classList.add('strength-weak');
          strengthText.classList.add('strength-weak-text');
          strengthText.textContent = 'رمز عبور بسیار ضعیف';
      }
    }
  </script>
</x-layout>