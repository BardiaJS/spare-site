<x-layout>
    <div class="complete-profile-container">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-xl-6">
                    <!-- هدر صفحه -->
                    <div class="page-header text-center mb-5">
                        <div class="header-icon mb-4">
                            <div class="icon-wrapper">
                                <i class="fas fa-user-edit"></i>
                            </div>
                        </div>
                        <h1 class="page-title">تکمیل پروفایل کاربری</h1>
                        <p class="page-subtitle">لطفاً اطلاعات تکمیلی حساب کاربری خود را وارد کنید</p>
                        
                        <!-- پیشرفت تکمیل پروفایل -->
                        <div class="progress-section mt-4">
                            <div class="progress" style="height: 8px;">
                                <div class="progress-bar" role="progressbar" style="width: 60%;" 
                                     aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="progress-text mt-2">
                                <small class="text-muted">۶۰% تکمیل شده - ۳ مورد باقی مانده</small>
                            </div>
                        </div>
                    </div>

                    <!-- فرم تکمیل پروفایل -->
                    <div class="profile-form-card">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">
                                    <i class="fas fa-address-card me-2"></i>
                                    اطلاعات تماس و آدرس
                                </h4>
                            </div>
                            <div class="card-body">
                                <form action="/complete-profile-user/{{Auth::user()->id}}" method="POST" id="registration-form">
                                    @csrf
                                    
                                    <!-- اطلاعات تماس -->
                                    <div class="form-section mb-4">
                                        <h5 class="section-title">
                                            <i class="fas fa-mobile-alt me-2 text-primary"></i>
                                            اطلاعات تماس
                                        </h5>
                                        <div class="mb-3">
                                            <label for="phone-register" class="form-label fw-bold text-dark">شماره موبایل</label>
                                            <div class="input-group">
                                                <span class="input-group-text">
                                                    <i class="fas fa-phone text-primary"></i>
                                                </span>
                                                <input value="{{old('phone')}}" name="phone" id="phone-register" class="form-control" type="text" 
                                                       placeholder="09xxxxxxxxx" autocomplete="off" maxlength="11" />
                                            </div>
                                            @error('phone')
                                            <div class="alert alert-danger mt-2 py-2 d-flex align-items-center" role="alert">
                                                <i class="fas fa-exclamation-circle me-2"></i>
                                                <span>{{ $message }}</span>
                                            </div>
                                            @enderror
                                            <div class="form-text text-muted mt-1">
                                                <i class="fas fa-info-circle me-1"></i>
                                                شماره موبایل باید با 09 شروع شود و 11 رقمی باشد
                                            </div>
                                        </div>
                                    </div>

                                    <!-- اطلاعات آدرس -->
                                    <div class="form-section mb-4">
                                        <h5 class="section-title">
                                            <i class="fas fa-map-marker-alt me-2 text-primary"></i>
                                            اطلاعات آدرس
                                        </h5>
                                        <div class="mb-3">
                                            <label for="address-register" class="form-label fw-bold text-dark">آدرس کامل</label>
                                            <div class="input-group">
                                                <span class="input-group-text">
                                                    <i class="fas fa-home text-primary"></i>
                                                </span>
                                                <textarea name="address" id="address-register" class="form-control" rows="3" 
                                                          placeholder="آدرس کامل پستی خود را وارد کنید...">{{old('address')}}</textarea>
                                            </div>
                                            @error('address')
                                            <div class="alert alert-danger mt-2 py-2 d-flex align-items-center" role="alert">
                                                <i class="fas fa-exclamation-circle me-2"></i>
                                                <span>{{ $message }}</span>
                                            </div>
                                            @enderror
                                            <div class="form-text text-muted mt-1">
                                                <i class="fas fa-info-circle me-1"></i>
                                                آدرس باید شامل استان، شهر، خیابان و پلاک باشد
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="postal-code-register" class="form-label fw-bold text-dark">کد پستی</label>
                                            <div class="input-group">
                                                <span class="input-group-text">
                                                    <i class="fas fa-envelope text-primary"></i>
                                                </span>
                                                <input value="{{old('postal_code')}}" name="postal_code" id="postal-code-register" class="form-control" 
                                                       type="text" placeholder="۱۰ رقمی" maxlength="10" />
                                            </div>
                                            @error('postal_code')
                                            <div class="alert alert-danger mt-2 py-2 d-flex align-items-center" role="alert">
                                                <i class="fas fa-exclamation-circle me-2"></i>
                                                <span>{{ $message }}</span>
                                            </div>
                                            @enderror
                                            <div class="form-text text-muted mt-1">
                                                <i class="fas fa-info-circle me-1"></i>
                                                کد پستی باید ۱۰ رقمی و معتبر باشد
                                            </div>
                                        </div>
                                    </div>

                                    <!-- اطلاعات کاربر فعلی -->
                                    <div class="user-info-section mb-4">
                                        <div class="info-card">
                                            <div class="card border-success">
                                                <div class="card-body py-3">
                                                    <h6 class="card-title text-success mb-3">
                                                        <i class="fas fa-user-check me-2"></i>اطلاعات کاربری شما
                                                    </h6>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="info-item">
                                                                <i class="fas fa-user me-2 text-primary"></i>
                                                                <strong>نام:</strong> {{ Auth::user()->first_name }}
                                                            </div>
                                                            <div class="info-item">
                                                                <i class="fas fa-user me-2 text-primary"></i>
                                                                <strong>نام خانوادگی:</strong> {{ Auth::user()->last_name }}
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="info-item">
                                                                <i class="fas fa-envelope me-2 text-primary"></i>
                                                                <strong>ایمیل:</strong> {{ Auth::user()->email }}
                                                            </div>
                                                            <div class="info-item">
                                                                <i class="fas fa-calendar me-2 text-primary"></i>
                                                                <strong>عضو since:</strong> {{ Auth::user()->created_at->diffForHumans() }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- مزایای تکمیل پروفایل -->
                                    <div class="benefits-section mb-4">
                                        <div class="alert alert-info">
                                            <h6 class="alert-heading mb-3">
                                                <i class="fas fa-gift me-2"></i>مزایای تکمیل پروفایل
                                            </h6>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <ul class="mb-0">
                                                        <li class="mb-1">
                                                            <i class="fas fa-shipping-fast me-2 text-success"></i>
                                                            تحویل سریع‌تر سفارشات
                                                        </li>
                                                        <li class="mb-1">
                                                            <i class="fas fa-percentage me-2 text-success"></i>
                                                            دریافت تخفیف‌های ویژه
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-6">
                                                    <ul class="mb-0">
                                                        <li class="mb-1">
                                                            <i class="fas fa-history me-2 text-success"></i>
                                                            پیگیری آسان سفارشات
                                                        </li>
                                                        <li class="mb-1">
                                                            <i class="fas fa-award me-2 text-success"></i>
                                                            کسب امتیاز وفاداری
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- دکمه‌های اقدام -->
                                    <div class="action-buttons d-flex justify-content-between align-items-center pt-3 border-top">
                                        <a href="/" class="btn btn-outline-secondary">
                                            <i class="fas fa-arrow-right me-2"></i>بازگشت
                                        </a>
                                        <button type="submit" class="btn btn-primary px-4">
                                            <i class="fas fa-check-circle me-2"></i>تکمیل پروفایل
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- نکات مهم -->
                    <div class="important-notes mt-4">
                        <div class="alert alert-warning">
                            <h6 class="alert-heading mb-2">
                                <i class="fas fa-shield-alt me-2"></i>امنیت اطلاعات
                            </h6>
                            <ul class="mb-0 ps-3">
                                <li class="mb-1">اطلاعات شما نزد ما کاملاً محفوظ خواهد بود</li>
                                <li class="mb-1">این اطلاعات فقط برای ارسال سفارشات استفاده می‌شود</li>
                                <li>می‌توانید در هر زمان اطلاعات خود را به روزرسانی کنید</li>
                            </ul>
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
            background: linear-gradient(135deg, #f5f7fb 0%, #e4e8f0 100%);
            min-height: 100vh;
        }
        
        .complete-profile-container {
            padding: 2rem 0;
        }
        
        .page-header {
            position: relative;
        }
        
        .header-icon {
            display: flex;
            justify-content: center;
        }
        
        .icon-wrapper {
            width: 100px;
            height: 100px;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 15px 35px rgba(67, 97, 238, 0.3);
        }
        
        .icon-wrapper i {
            font-size: 3rem;
            color: white;
        }
        
        .page-title {
            color: var(--dark-color);
            font-weight: 700;
            margin-bottom: 0.5rem;
            font-size: 2.2rem;
        }
        
        .page-subtitle {
            color: #6c757d;
            font-size: 1.1rem;
        }
        
        /* نوار پیشرفت */
        .progress {
            background-color: #e9ecef;
            border-radius: 10px;
            overflow: hidden;
        }
        
        .progress-bar {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border-radius: 10px;
            transition: width 0.6s ease;
        }
        
        .progress-text {
            text-align: center;
        }
        
        .card {
            border-radius: 20px;
            overflow: hidden;
            border: none;
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
        }
        
        .card-header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border-bottom: none;
            padding: 1.5rem 2rem;
            color: white;
        }
        
        .card-title {
            margin: 0;
            font-weight: 600;
            font-size: 1.3rem;
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
            font-size: 1.2rem;
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
        
        textarea.form-control {
            resize: vertical;
            min-height: 100px;
            line-height: 1.6;
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
        
        /* اطلاعات کاربر */
        .info-card .card {
            border: 2px solid var(--success-color);
            background: linear-gradient(135deg, rgba(40, 167, 69, 0.05), rgba(40, 167, 69, 0.02));
        }
        
        .info-item {
            padding: 0.5rem 0;
            color: var(--dark-color);
        }
        
        /* آلرت‌ها */
        .alert {
            border-radius: 12px;
            border: none;
            border-right: 4px solid;
            padding: 1.25rem 1.5rem;
        }
        
        .alert-danger {
            background: linear-gradient(135deg, rgba(220, 53, 69, 0.1), rgba(220, 53, 69, 0.05));
            color: var(--danger-color);
            border-right-color: var(--danger-color);
        }
        
        .alert-info {
            background: linear-gradient(135deg, rgba(23, 162, 184, 0.1), rgba(23, 162, 184, 0.05));
            color: #055160;
            border-right-color: var(--info-color);
        }
        
        .alert-warning {
            background: linear-gradient(135deg, rgba(255, 193, 7, 0.1), rgba(255, 193, 7, 0.05));
            color: #664d03;
            border-right-color: var(--warning-color);
        }
        
        /* دکمه‌ها */
        .btn {
            border-radius: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
            padding: 12px 25px;
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
            transform: translateY(-2px);
        }
        
        /* رسپانسیو */
        @media (max-width: 768px) {
            .complete-profile-container {
                padding: 1rem 0;
            }
            
            .page-title {
                font-size: 1.8rem;
            }
            
            .card-body {
                padding: 1.5rem;
            }
            
            .action-buttons {
                flex-direction: column;
                gap: 1rem;
            }
            
            .action-buttons .btn {
                width: 100%;
                text-align: center;
            }
            
            .icon-wrapper {
                width: 80px;
                height: 80px;
            }
            
            .icon-wrapper i {
                font-size: 2.5rem;
            }
        }
        
        @media (max-width: 576px) {
            .container {
                padding-left: 15px;
                padding-right: 15px;
            }
            
            .card-body {
                padding: 1.25rem;
            }
            
            .form-section {
                padding: 1rem 0;
            }
            
            .user-info-section .row > div {
                margin-bottom: 0.5rem;
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
        
        .profile-form-card {
            animation: fadeInUp 0.6s ease-out;
        }
        
        .important-notes {
            animation: fadeInUp 0.8s ease-out;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // اعتبارسنجی شماره موبایل
            const phoneInput = document.getElementById('phone-register');
            
            phoneInput.addEventListener('input', function(e) {
                // فقط اعداد مجاز هستند
                e.target.value = e.target.value.replace(/[^0-9]/g, '');
                
                // محدودیت 11 رقم
                if (e.target.value.length > 11) {
                    e.target.value = e.target.value.slice(0, 11);
                }
            });
            
            // اعتبارسنجی کد پستی
            const postalCodeInput = document.getElementById('postal-code-register');
            
            postalCodeInput.addEventListener('input', function(e) {
                // فقط اعداد مجاز هستند
                e.target.value = e.target.value.replace(/[^0-9]/g, '');
                
                // محدودیت 10 رقم
                if (e.target.value.length > 10) {
                    e.target.value = e.target.value.slice(0, 10);
                }
            });
            
            // اعتبارسنجی قبل از ارسال
            document.getElementById('registration-form').addEventListener('submit', function(e) {
                const phone = phoneInput.value.trim();
                const address = document.getElementById('address-register').value.trim();
                const postalCode = postalCodeInput.value.trim();
                
                if (phone && !phone.startsWith('09')) {
                    e.preventDefault();
                    alert('شماره موبایل باید با 09 شروع شود');
                    phoneInput.focus();
                    return false;
                }
                
                if (phone && phone.length !== 11) {
                    e.preventDefault();
                    alert('شماره موبایل باید 11 رقمی باشد');
                    phoneInput.focus();
                    return false;
                }
                
                if (postalCode && postalCode.length !== 10) {
                    e.preventDefault();
                    alert('کد پستی باید 10 رقمی باشد');
                    postalCodeInput.focus();
                    return false;
                }
            });
        });
    </script>
</x-layout>