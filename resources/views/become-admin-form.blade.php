

<x-layout>
    <div class="admin-info-container">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-xl-6">
                    <!-- هدر صفحه -->
                    <div class="page-header text-center mb-5">
                        <div class="header-icon mb-4">
                            <div class="icon-wrapper">
                                <i class="fas fa-user-shield"></i>
                            </div>
                        </div>
                        <h1 class="page-title">تکمیل اطلاعات مدیریت</h1>
                        <p class="page-subtitle">لطفاً اطلاعات هویتی و سوابق کاری خود را وارد کنید</p>
                    </div>

                    <!-- فرم اطلاعات -->
                    <div class="admin-form-card">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">
                                    <i class="fas fa-id-card me-2"></i>
                                    اطلاعات هویتی و سوابق
                                </h4>
                            </div>
                            <div class="card-body">
                                <form action="/become-admin/{{Auth::user()->id}}" method="POST" id="registration-form">
                                    @csrf
                                    
                                    <!-- اطلاعات هویتی -->
                                    <div class="form-section mb-4">
                                        <h5 class="section-title">
                                            <i class="fas fa-user me-2 text-primary"></i>
                                            اطلاعات هویتی
                                        </h5>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="national-code-register" class="form-label fw-bold text-dark">کد ملی</label>
                                                <div class="input-group">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-id-card text-primary"></i>
                                                    </span>
                                                    <input value="{{old('national_code')}}" name="national_code" id="national-code-register" class="form-control" type="text" placeholder="کد ملی ۱۰ رقمی" autocomplete="off" maxlength="10" />
                                                </div>
                                                @error('national_code')
                                                <div class="alert alert-danger mt-2 py-2 d-flex align-items-center" role="alert">
                                                    <i class="fas fa-exclamation-circle me-2"></i>
                                                    <span>{{ $message }}</span>
                                                </div>
                                                @enderror
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="age-register" class="form-label fw-bold text-dark">سن</label>
                                                <div class="input-group">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-birthday-cake text-primary"></i>
                                                    </span>
                                                    <input value="{{old('age')}}" name="age" id="age-register" class="form-control" type="number" min="18" max="100" placeholder="سن شما" />
                                                </div>
                                                <div class="form-text text-muted mt-1">حداقل سن: ۱۸ سال</div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- سوابق کاری -->
                                    <div class="form-section mb-4">
                                        <h5 class="section-title">
                                            <i class="fas fa-briefcase me-2 text-primary"></i>
                                            سوابق کاری
                                        </h5>
                                        <div class="mb-3">
                                            <label for="information" class="form-label fw-bold text-dark">سابقه کاری و تخصص‌ها</label>
                                            <div class="input-group">
                                                <span class="input-group-text">
                                                    <i class="fas fa-history text-primary"></i>
                                                </span>
                                                <textarea name="information" id="information" class="form-control" rows="4" placeholder="سوابق کاری، تجربیات مدیریتی و تخصص‌های خود را شرح دهید...">{{old('information')}}</textarea>
                                            </div>
                                            @error('information')
                                            <div class="alert alert-danger mt-2 py-2 d-flex align-items-center" role="alert">
                                                <i class="fas fa-exclamation-circle me-2"></i>
                                                <span>{{ $message }}</span>
                                            </div>
                                            @enderror
                                            <div class="form-text text-muted mt-1">
                                                <i class="fas fa-info-circle me-1"></i>
                                                این اطلاعات برای بررسی صلاحیت مدیریتی شما استفاده می‌شود.
                                            </div>
                                        </div>
                                    </div>

                                    <!-- اطلاعات کاربر -->
                                    <div class="user-info-section mb-4">
                                        <div class="info-card">
                                            <div class="card border-info">
                                                <div class="card-body">
                                                    <h6 class="card-title text-info mb-3">
                                                        <i class="fas fa-user me-2"></i>اطلاعات کاربری فعلی
                                                    </h6>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="info-item">
                                                                <i class="fas fa-user me-2"></i>
                                                                <strong>نام:</strong> {{ Auth::user()->first_name }}
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="info-item">
                                                                <i class="fas fa-user me-2"></i>
                                                                <strong>نام خانوادگی:</strong> {{ Auth::user()->last_name }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="info-item mt-2">
                                                        <i class="fas fa-envelope me-2"></i>
                                                        <strong>ایمیل:</strong> {{ Auth::user()->email }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- نکات مهم -->
                                    <div class="important-notes mb-4">
                                        <div class="alert alert-warning">
                                            <h6 class="alert-heading mb-2">
                                                <i class="fas fa-exclamation-triangle me-2"></i>نکات مهم
                                            </h6>
                                            <ul class="mb-0 ps-3">
                                                <li class="mb-1">اطلاعات وارد شده باید واقعی و معتبر باشد</li>
                                                <li class="mb-1">پس از ثبت، اطلاعات توسط تیم مدیریت بررسی خواهد شد</li>
                                                <li>در صورت تأیید، دسترسی مدیریتی برای شما فعال می‌شود</li>
                                            </ul>
                                        </div>
                                    </div>

                                    <!-- دکمه‌های اقدام -->
                                    <div class="action-buttons d-flex justify-content-between align-items-center pt-3 border-top">
                                        <a href="/" class="btn btn-outline-secondary">
                                            <i class="fas fa-arrow-right me-2"></i>بازگشت
                                        </a>
                                        <button type="submit" class="btn btn-primary px-4">
                                            <i class="fas fa-check-circle me-2"></i>تکمیل اطلاعات
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
        
        .admin-info-container {
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
            min-height: 120px;
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
            border: 2px solid var(--info-color);
            background: linear-gradient(135deg, rgba(23, 162, 184, 0.05), rgba(23, 162, 184, 0.02));
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
        
        .alert-warning {
            background: linear-gradient(135deg, rgba(255, 193, 7, 0.1), rgba(255, 193, 7, 0.05));
            color: #856404;
            border-right-color: var(--warning-color);
        }
        
        .alert-heading {
            font-weight: 600;
            font-size: 1rem;
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
        
        /* متن راهنما */
        .form-text {
            font-size: 0.85rem;
        }
        
        /* رسپانسیو */
        @media (max-width: 768px) {
            .admin-info-container {
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
            
            .section-title {
                font-size: 1.1rem;
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
        
        .admin-form-card {
            animation: fadeInUp 0.6s ease-out;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // اعتبارسنجی کد ملی
            const nationalCodeInput = document.getElementById('national-code-register');
            
            nationalCodeInput.addEventListener('input', function(e) {
                // فقط اعداد مجاز هستند
                e.target.value = e.target.value.replace(/[^0-9]/g, '');
                
                // محدودیت ۱۰ رقم
                if (e.target.value.length > 10) {
                    e.target.value = e.target.value.slice(0, 10);
                }
            });
            
            // اعتبارسنجی سن
            const ageInput = document.getElementById('age-register');
            
            ageInput.addEventListener('change', function(e) {
                const age = parseInt(e.target.value);
                if (age < 18) {
                    alert('حداقل سن برای مدیریت ۱۸ سال می‌باشد.');
                    e.target.value = 18;
                }
                if (age > 100) {
                    alert('سن وارد شده معتبر نمی‌باشد.');
                    e.target.value = 100;
                }
            });
            
            // نمایش تعداد کاراکترهای سابقه کاری
            const informationTextarea = document.getElementById('information');
            
            informationTextarea.addEventListener('input', function(e) {
                const length = e.target.value.length;
                // می‌توانید یک شمارنده اضافه کنید اگر نیاز باشد
            });
        });
    </script>
</x-layout>