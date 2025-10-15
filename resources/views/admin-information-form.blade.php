<x-layout>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-xl-6">
                <!-- هدر صفحه -->
                <div class="page-header mb-5 text-center">
                    <div class="header-icon mb-4">
                        <div class="icon-wrapper">
                            <i class="fas fa-user-shield"></i>
                        </div>
                    </div>
                    <h1 class="display-5 mb-3 text-primary fw-bold">ویرایش اطلاعات ادمین</h1>
                    <p class="lead text-muted">اطلاعات پروفایل مدیریتی خود را به روزرسانی کنید</p>
                </div>

                <!-- فرم ویرایش اطلاعات -->
                <div class="edit-admin-section">
                    <div class="card shadow border-0">
                        <div class="card-header bg-gradient-primary text-white py-4">
                            <div class="d-flex align-items-center">
                                <div class="admin-avatar me-3">
                                    <i class="fas fa-crown fs-4"></i>
                                </div>
                                <div>
                                    <h4 class="mb-1">پنل مدیریت</h4>
                                    <p class="mb-0 opacity-75">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <form action="/admin-information/admin/{{ Auth::user()->admin->id }}" method="POST" id="registration-form">
                                @csrf
                                @method('PUT')
                                
                                <div class="form-section">
                                    <div class="section-header mb-4">
                                        <h5 class="text-dark mb-2">
                                            <i class="fas fa-briefcase me-2 text-primary"></i>اطلاعات حرفه‌ای
                                        </h5>
                                        <p class="text-muted small">سابقه کار و تجربیات مدیریتی خود را وارد کنید</p>
                                    </div>
                                    
                                    <div class="mb-4">
                                        <label for="information-register" class="form-label fw-bold text-dark">سابقه کار</label>
                                        <div class="input-group input-group-lg">
                                            <span class="input-group-text bg-light">
                                                <i class="fas fa-history text-primary"></i>
                                            </span>
                                            <textarea name="information" id="information-register" class="form-control" rows="4" placeholder="سوابق کاری، تجربیات و تخصص‌های خود را در این قسمت وارد کنید..." autocomplete="off">{{ Auth::user()->admin->information }}</textarea>
                                        </div>
                                        @error('information')
                                        <div class="alert alert-danger mt-2 py-2 d-flex align-items-center" role="alert">
                                            <i class="fas fa-exclamation-circle me-2"></i>
                                            <span>{{ $message }}</span>
                                        </div>
                                        @enderror
                                        <div class="form-text text-muted mt-2">
                                            <i class="fas fa-info-circle me-1"></i>
                                            این اطلاعات در پروفایل مدیریتی شما نمایش داده می‌شود.
                                        </div>
                                    </div>
                                </div>

                                <!-- آمار و اطلاعات -->
                                <div class="info-cards mb-4">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <div class="stat-card text-center p-3">
                                                <div class="stat-icon mb-2">
                                                    <i class="fas fa-user-check text-success"></i>
                                                </div>
                                                <h4 class="stat-number mb-1">{{ Auth::user()->created_at->diffForHumans() }}</h4>
                                                <p class="stat-label text-muted small">عضو since</p>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="stat-card text-center p-3">
                                                <div class="stat-icon mb-2">
                                                    <i class="fas fa-shield-alt text-primary"></i>
                                                </div>
                                                <h4 class="stat-number mb-1">Admin</h4>
                                                <p class="stat-label text-muted small">سطح دسترسی</p>
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
                                        <i class="fas fa-save me-2"></i>ذخیره تغییرات
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- نکات مهم -->
                <div class="important-notes mt-4">
                    <div class="card border-warning">
                        <div class="card-body">
                            <h6 class="card-title text-warning mb-3">
                                <i class="fas fa-lightbulb me-2"></i>نکات مهم
                            </h6>
                            <ul class="list-unstyled mb-0">
                                <li class="mb-2">
                                    <i class="fas fa-check-circle text-success me-2 small"></i>
                                    اطلاعات وارد شده باید دقیق و به روز باشد
                                </li>
                                <li class="mb-2">
                                    <i class="fas fa-check-circle text-success me-2 small"></i>
                                    سوابق کاری مرتبط با مدیریت را ذکر کنید
                                </li>
                                <li>
                                    <i class="fas fa-check-circle text-success me-2 small"></i>
                                    پس از ذخیره، تغییرات بلافاصله اعمال می‌شود
                                </li>
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
            --danger-color: #dc3545;
            --light-bg: #f8f9fa;
            --dark-color: #2d3748;
        }
        
        body {
            font-family: "Noto Sans Arabic", "Nunito", sans-serif;
            background: linear-gradient(135deg, #f5f7fb 0%, #e4e8f0 100%);
            min-height: 100vh;
        }
        
        .page-header {
            position: relative;
            padding-bottom: 20px;
        }
        
        .page-header:after {
            content: '';
            display: block;
            width: 80px;
            height: 4px;
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            margin: 20px auto 0;
            border-radius: 2px;
        }
        
        .header-icon {
            display: flex;
            justify-content: center;
        }
        
        .icon-wrapper {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 10px 25px rgba(67, 97, 238, 0.3);
        }
        
        .icon-wrapper i {
            font-size: 2rem;
            color: white;
        }
        
        .card {
            border-radius: 15px;
            overflow: hidden;
            border: none;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        }
        
        .card-header {
            border-bottom: none;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        }
        
        .admin-avatar {
            width: 50px;
            height: 50px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            backdrop-filter: blur(10px);
        }
        
        .form-section {
            padding: 20px 0;
        }
        
        .section-header {
            border-right: 4px solid var(--primary-color);
            padding-right: 15px;
        }
        
        /* فرم کنترل‌ها */
        .form-control {
            border-radius: 10px;
            padding: 15px 20px;
            transition: all 0.3s ease;
            border: 2px solid #e9ecef;
            font-size: 1rem;
            resize: vertical;
            min-height: 120px;
        }
        
        .form-control:focus {
            box-shadow: 0 0 0 0.25rem rgba(67, 97, 238, 0.15);
            border-color: var(--primary-color);
            transform: translateY(-2px);
        }
        
        textarea.form-control {
            line-height: 1.6;
        }
        
        .input-group-text {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            border: 2px solid #e9ecef;
            border-left: none;
            border-radius: 10px 0 0 10px;
        }
        
        .input-group .form-control {
            border-right: none;
            border-left: 2px solid #e9ecef;
            border-radius: 0 10px 10px 0;
        }
        
        /* کارت‌های آمار */
        .stat-card {
            background: var(--light-bg);
            border-radius: 10px;
            border: 1px solid #e9ecef;
            transition: all 0.3s ease;
        }
        
        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .stat-icon {
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        }
        
        .stat-number {
            font-weight: 700;
            color: var(--dark-color);
        }
        
        .stat-label {
            font-size: 0.85rem;
        }
        
        /* دکمه‌ها */
        .btn {
            border-radius: 10px;
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
        
        /* آلرت‌ها */
        .alert {
            border-radius: 10px;
            border: none;
            border-right: 4px solid;
        }
        
        .alert-danger {
            background: linear-gradient(135deg, rgba(220, 53, 69, 0.1), rgba(220, 53, 69, 0.05));
            color: var(--danger-color);
            border-right-color: var(--danger-color);
        }
        
        /* کارت نکات مهم */
        .important-notes .card {
            border: 2px solid var(--warning-color);
            background: linear-gradient(135deg, rgba(255, 193, 7, 0.05), rgba(255, 193, 7, 0.02));
        }
        
        .important-notes .card-body {
            padding: 20px;
        }
        
        /* رسپانسیو */
        @media (max-width: 768px) {
            .page-header h1 {
                font-size: 2rem;
            }
            
            .card-body {
                padding: 20px;
            }
            
            .action-buttons {
                flex-direction: column;
                gap: 15px;
            }
            
            .action-buttons .btn {
                width: 100%;
                text-align: center;
            }
            
            .admin-avatar {
                width: 40px;
                height: 40px;
            }
        }
        
        @media (max-width: 576px) {
            .container {
                padding-left: 15px;
                padding-right: 15px;
            }
            
            .info-cards .col-md-6 {
                margin-bottom: 15px;
            }
            
            .stat-card {
                padding: 15px;
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
        
        .card {
            animation: fadeInUp 0.6s ease-out;
        }
        
        .important-notes {
            animation: fadeInUp 0.8s ease-out;
        }
        
        /* افکت‌های ویژه */
        .form-text {
            font-size: 0.85rem;
        }
    </style>
</x-layout>

