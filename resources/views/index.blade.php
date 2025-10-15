<x-layout>
    <div class="register-container">
        <div class="container">
            <div class="row align-items-center min-vh-100">
                <!-- بخش تصویر و گرافیک -->
                <div class="col-lg-7 py-5">
                    <div class="welcome-section">
                        <div class="welcome-content text-center text-lg-start">
                            <div class="welcome-header mb-5">
                                <h1 class="welcome-title">به خانواده ما بپیوندید</h1>
                                <p class="welcome-subtitle">ثبت نام کنید و از امکانات ویژه بهره‌مند شوید</p>
                            </div>
                            
                            <div class="welcome-graphic mb-4">
                                <div class="graphic-wrapper">
                                    <img src="welcome.gif" alt="خوش آمدید" class="welcome-image">
                                </div>
                            </div>

                            <!-- مزایای ثبت نام -->
                            <div class="benefits-section">
                                <div class="benefits-grid">
                                    <div class="benefit-item">
                                        <div class="benefit-icon">
                                            <i class="fas fa-shipping-fast"></i>
                                        </div>
                                        <div class="benefit-content">
                                            <h5>تحویل سریع</h5>
                                            <p>ارسال سریع به تمام نقاط</p>
                                        </div>
                                    </div>
                                    <div class="benefit-item">
                                        <div class="benefit-icon">
                                            <i class="fas fa-shield-alt"></i>
                                        </div>
                                        <div class="benefit-content">
                                            <h5>امنیت بالا</h5>
                                            <p>اطلاعات شما در امان است</p>
                                        </div>
                                    </div>
                                    <div class="benefit-item">
                                        <div class="benefit-icon">
                                            <i class="fas fa-gift"></i>
                                        </div>
                                        <div class="benefit-content">
                                            <h5>تخفیف ویژه</h5>
                                            <p>جشنواره‌های تخفیف دائمی</p>
                                        </div>
                                    </div>
                                    <div class="benefit-item">
                                        <div class="benefit-icon">
                                            <i class="fas fa-headset"></i>
                                        </div>
                                        <div class="benefit-content">
                                            <h5>پشتیبانی 24/7</h5>
                                            <p>همیشه در کنار شما هستیم</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- بخش فرم ثبت نام -->
                <div class="col-lg-5 py-5">
                    <div class="register-form-section">
                        <div class="form-card">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="fas fa-user-plus me-2"></i>
                                        ایجاد حساب کاربری
                                    </h3>
                                    <p class="card-subtitle">اطلاعات خود را وارد کنید</p>
                                </div>
                                <div class="card-body">
                                    <form action="/register" method="POST" id="registration-form">
                                        @csrf
                                        
                                        <!-- اطلاعات شخصی -->
                                        <div class="form-section mb-4">
                                            <h5 class="section-title">
                                                <i class="fas fa-user me-2 text-primary"></i>
                                                اطلاعات شخصی
                                            </h5>
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="first-name-register" class="form-label fw-bold text-dark">نام</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text">
                                                            <i class="fas fa-user text-primary"></i>
                                                        </span>
                                                        <input value="{{old('first_name')}}" name="first_name" id="first-name-register" class="form-control" type="text" placeholder="نام خود را وارد کنید" autocomplete="off" />
                                                    </div>
                                                    @error('first_name')
                                                    <div class="alert alert-danger mt-2 py-2 d-flex align-items-center" role="alert">
                                                        <i class="fas fa-exclamation-circle me-2"></i>
                                                        <span>{{ $message }}</span>
                                                    </div>
                                                    @enderror
                                                </div>

                                                <div class="col-md-6 mb-3">
                                                    <label for="last-name-register" class="form-label fw-bold text-dark">نام خانوادگی</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text">
                                                            <i class="fas fa-user text-primary"></i>
                                                        </span>
                                                        <input value="{{old('last_name')}}" name="last_name" id="last-name-register" class="form-control" type="text" placeholder="نام خانوادگی خود را وارد کنید" autocomplete="off" />
                                                    </div>
                                                    @error('last_name')
                                                    <div class="alert alert-danger mt-2 py-2 d-flex align-items-center" role="alert">
                                                        <i class="fas fa-exclamation-circle me-2"></i>
                                                        <span>{{ $message }}</span>
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <!-- اطلاعات حساب -->
                                        <div class="form-section mb-4">
                                            <h5 class="section-title">
                                                <i class="fas fa-lock me-2 text-primary"></i>
                                                اطلاعات حساب
                                            </h5>
                                            <div class="mb-3">
                                                <label for="email-register" class="form-label fw-bold text-dark">ایمیل</label>
                                                <div class="input-group">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-envelope text-primary"></i>
                                                    </span>
                                                    <input value="{{old('email')}}" name="email" id="email-register" class="form-control" type="text" placeholder="you@example.com" autocomplete="off" />
                                                </div>
                                                @error('email')
                                                <div class="alert alert-danger mt-2 py-2 d-flex align-items-center" role="alert">
                                                    <i class="fas fa-exclamation-circle me-2"></i>
                                                    <span>{{ $message }}</span>
                                                </div>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label for="password-register" class="form-label fw-bold text-dark">رمز عبور</label>
                                                <div class="input-group">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-key text-primary"></i>
                                                    </span>
                                                    <input name="password" id="password-register" class="form-control" type="password" placeholder="رمز عبور قوی انتخاب کنید" />
                                                    <button type="button" class="btn btn-outline-secondary" id="togglePassword">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                </div>
                                                @error('password')
                                                <div class="alert alert-danger mt-2 py-2 d-flex align-items-center" role="alert">
                                                    <i class="fas fa-exclamation-circle me-2"></i>
                                                    <span>{{ $message }}</span>
                                                </div>
                                                @enderror
                                                <div class="password-strength mt-2">
                                                    <div class="progress" style="height: 4px;">
                                                        <div class="progress-bar" id="passwordStrength" role="progressbar" style="width: 0%"></div>
                                                    </div>
                                                    <small class="text-muted" id="passwordHint">حداقل 6 کاراکتر شامل حروف و اعداد</small>
                                                </div>
                                            </div>
                                        </div>



                                        <!-- دکمه ثبت نام -->
                                        <div class="d-grid mb-3">
                                            <button type="submit" class="btn btn-primary btn-lg py-3">
                                                <i class="fas fa-user-plus me-2"></i>
                                                ایجاد حساب کاربری
                                            </button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3f37c9;
            --success-color: #28a745;
            --warning-color: #ffc107;
            --info-color: #17a2b8;
            --danger-color: #dc3545;
            --light-bg: #f8f9fa;
            --dark-color: #2d3748;
        }
        
        body {
            font-family: "Noto Sans Arabic", "Nunito", sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            margin: 0;
        }
        
        .register-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
        }
        
        /* بخش خوش آمدگویی */
        .welcome-section {
            color: white;
            padding: 2rem;
        }
        
        .welcome-title {
            font-weight: 800;
            font-size: 3rem;
            margin-bottom: 1rem;
            line-height: 1.2;
        }
        
        .welcome-subtitle {
            font-size: 1.3rem;
            opacity: 0.9;
            margin-bottom: 3rem;
        }
        
        .graphic-wrapper {
            max-width: 500px;
            margin: 0 auto;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }
        
        .welcome-image {
            width: 100%;
            height: auto;
            display: block;
        }
        
        /* مزایا */
        .benefits-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-top: 3rem;
        }
        
        .benefit-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1rem;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .benefit-icon {
            width: 50px;
            height: 50px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            flex-shrink: 0;
        }
        
        .benefit-content h5 {
            margin: 0 0 0.25rem 0;
            font-weight: 600;
        }
        
        .benefit-content p {
            margin: 0;
            opacity: 0.8;
            font-size: 0.9rem;
        }
        
        /* فرم ثبت نام */
        .register-form-section {
            padding: 1rem;
        }
        
        .form-card {
            max-width: 500px;
            margin: 0 auto;
        }
        
        .card {
            border-radius: 20px;
            overflow: hidden;
            border: none;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.2);
        }
        
        .card-header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border-bottom: none;
            padding: 2rem 2rem 1rem 2rem;
            color: white;
            text-align: center;
        }
        
        .card-title {
            margin: 0 0 0.5rem 0;
            font-weight: 700;
            font-size: 1.8rem;
        }
        
        .card-subtitle {
            margin: 0;
            opacity: 0.9;
        }
        
        .card-body {
            padding: 2.5rem;
        }
        
        /* بخش‌بندی فرم */
        .form-section {
            padding: 1.5rem 0;
            border-bottom: 1px solid #e9ecef;
        }
        
        .form-section:last-of-type {
            border-bottom: none;
        }
        
        .section-title {
            color: var(--dark-color);
            font-weight: 600;
            margin-bottom: 1.5rem;
            font-size: 1.1rem;
            border-right: 4px solid var(--primary-color);
            padding-right: 15px;
        }
        
        /* فرم کنترل‌ها */
        .form-control {
            border-radius: 12px;
            padding: 12px 15px;
            transition: all 0.3s ease;
            border: 2px solid #e9ecef;
            font-size: 1rem;
        }
        
        .form-control:focus {
            box-shadow: 0 0 0 0.25rem rgba(67, 97, 238, 0.15);
            border-color: var(--primary-color);
            transform: translateY(-2px);
        }
        
        .input-group-text {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            border: 2px solid #e9ecef;
            border-left: none;
            border-radius: 12px 0 0 12px;
        }
        
        .input-group .form-control {
            border-right: none;
            border-left: 2px solid #e9ecef;
            border-radius: 0 12px 12px 0;
        }
        
        /* قدرت رمز عبور */
        .password-strength .progress {
            background-color: #e9ecef;
            border-radius: 10px;
        }
        
        .password-strength .progress-bar {
            border-radius: 10px;
            transition: all 0.3s ease;
        }
        
        /* آلرت‌ها */
        .alert {
            border-radius: 10px;
            border: none;
            border-right: 4px solid;
            padding: 1rem 1.25rem;
        }
        
        .alert-danger {
            background: linear-gradient(135deg, rgba(220, 53, 69, 0.1), rgba(220, 53, 69, 0.05));
            color: var(--danger-color);
            border-right-color: var(--danger-color);
        }
        
        /* دکمه‌ها */
        .btn {
            border-radius: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            box-shadow: 0 5px 15px rgba(67, 97, 238, 0.3);
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(67, 97, 238, 0.4);
        }
        
        .btn-outline-secondary {
            border: 2px solid #6c757d;
            color: #6c757d;
            background: transparent;
        }
        
        .btn-outline-secondary:hover {
            background: #6c757d;
            color: white;
        }
        
        /* چک باکس */
        .form-check-input:checked {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        /* رسپانسیو */
        @media (max-width: 992px) {
            .register-container {
                padding: 2rem 0;
            }
            
            .welcome-section {
                text-align: center;
                padding: 1rem;
            }
            
            .welcome-title {
                font-size: 2.5rem;
            }
            
            .benefits-grid {
                grid-template-columns: 1fr;
                max-width: 400px;
                margin: 2rem auto 0;
            }
        }
        
        @media (max-width: 768px) {
            .welcome-title {
                font-size: 2rem;
            }
            
            .card-body {
                padding: 1.5rem;
            }
            
            .card-title {
                font-size: 1.5rem;
            }
        }
        
        @media (max-width: 576px) {
            .container {
                padding-left: 15px;
                padding-right: 15px;
            }
            
            .welcome-section {
                padding: 0.5rem;
            }
            
            .card-body {
                padding: 1.25rem;
            }
            
            .form-section {
                padding: 1rem 0;
            }
        }
        
        /* انیمیشن‌ها */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .welcome-section {
            animation: fadeInUp 0.8s ease-out;
        }
        
        .form-card {
            animation: fadeInUp 0.6s ease-out;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const togglePassword = document.getElementById('togglePassword');
            const passwordInput = document.getElementById('password-register');
            const passwordStrength = document.getElementById('passwordStrength');
            const passwordHint = document.getElementById('passwordHint');
            
            // نمایش/مخفی کردن رمز عبور
            togglePassword.addEventListener('click', function() {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
                this.innerHTML = type === 'password' ? '<i class="fas fa-eye"></i>' : '<i class="fas fa-eye-slash"></i>';
            });
            
            // بررسی قدرت رمز عبور
            passwordInput.addEventListener('input', function() {
                const password = this.value;
                let strength = 0;
                let hint = '';
                
                if (password.length >= 8) strength += 25;
                if (/[a-z]/.test(password)) strength += 25;
                if (/[A-Z]/.test(password)) strength += 25;
                if (/[0-9]/.test(password)) strength += 25;
                
                passwordStrength.style.width = strength + '%';
                
                if (strength < 25) {
                    passwordStrength.className = 'progress-bar bg-danger';
                    hint = 'رمز عبور بسیار ضعیف';
                } else if (strength < 50) {
                    passwordStrength.className = 'progress-bar bg-warning';
                    hint = 'رمز عبور ضعیف';
                } else if (strength < 75) {
                    passwordStrength.className = 'progress-bar bg-info';
                    hint = 'رمز عبور متوسط';
                } else {
                    passwordStrength.className = 'progress-bar bg-success';
                    hint = 'رمز عبور قوی';
                }
                
                passwordHint.textContent = hint;
            });
            
            // اعتبارسنجی فرم
            document.getElementById('registration-form').addEventListener('submit', function(e) {
                const agreeTerms = document.getElementById('agreeTerms');
                
                if (!agreeTerms.checked) {
                    e.preventDefault();
                    alert('لطفاً با قوانین و مقررات موافقت کنید');
                    agreeTerms.focus();
                    return false;
                }
            });
        });
    </script>
</x-layout>