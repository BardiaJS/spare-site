<x-layout>
    <div class="edit-category-container">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-xl-6">
                    <!-- هدر صفحه -->
                    <div class="page-header text-center mb-5">
                        <div class="header-icon mb-4">
                            <div class="icon-wrapper">
                                <i class="fas fa-edit"></i>
                            </div>
                        </div>
                        <h1 class="page-title">ویرایش دسته‌بندی</h1>
                        <p class="page-subtitle">اطلاعات دسته‌بندی را به روزرسانی کنید</p>
                        
                        <!-- اطلاعات دسته‌بندی فعلی -->
                        <div class="current-info mt-4">
                            <div class="info-badge">
                                <i class="fas fa-folder me-2"></i>
                                در حال ویرایش: <strong>{{ $category->name }}</strong>
                            </div>
                        </div>
                    </div>

                    <!-- فرم ویرایش دسته‌بندی -->
                    <div class="edit-category-card">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">
                                    <i class="fas fa-folder-open me-2"></i>
                                    فرم ویرایش دسته‌بندی
                                </h4>
                            </div>
                            <div class="card-body">
                                <form action="/edit-category/category/{{$category->id}}" method="POST" id="registration-form">
                                    @csrf
                                    @method('PUT')
                                    
                                    <!-- فیلد نام دسته‌بندی -->
                                    <div class="form-section mb-4">
                                        <label for="category-code-register" class="form-label fw-bold text-dark">نام دسته‌بندی</label>
                                        <div class="input-group input-group-lg">
                                            <span class="input-group-text">
                                                <i class="fas fa-tag text-primary"></i>
                                            </span>
                                            <input name="name" id="category-code-register" class="form-control" type="text" 
                                                   placeholder="نام دسته‌بندی را وارد کنید" autocomplete="off" value="{{$category->name}}" />
                                        </div>
                                        @error('name')
                                        <div class="alert alert-danger mt-2 py-2 d-flex align-items-center" role="alert">
                                            <i class="fas fa-exclamation-circle me-2"></i>
                                            <span>{{ $message }}</span>
                                        </div>
                                        @enderror
                                        <div class="form-text text-muted mt-2">
                                            <i class="fas fa-info-circle me-1"></i>
                                            نام دسته‌بندی باید واضح و مرتبط با محصولات باشد
                                        </div>
                                    </div>

                                    <!-- آمار دسته‌بندی -->
                                    <div class="category-stats mb-4">
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <div class="stat-card">
                                                    <div class="stat-icon">
                                                        <i class="fas fa-cubes"></i>
                                                    </div>
                                                    <div class="stat-content">
                                                        <h3 class="stat-number">{{ $category->products->count() }}</h3>
                                                        <p class="stat-label">تعداد محصولات</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="stat-card">
                                                    <div class="stat-icon">
                                                        <i class="fas fa-calendar"></i>
                                                    </div>
                                                    <div class="stat-content">
                                                        <h3 class="stat-number">{{ $category->created_at->diffForHumans() }}</h3>
                                                        <p class="stat-label">تاریخ ایجاد</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- راهنمای نام گذاری -->
                                    <div class="naming-guide mb-4">
                                        <div class="guide-card">
                                            <div class="card border-info">
                                                <div class="card-body py-3">
                                                    <h6 class="card-title text-info mb-2">
                                                        <i class="fas fa-lightbulb me-2"></i>راهنمای انتخاب نام دسته‌بندی
                                                    </h6>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <ul class="list-unstyled mb-0">
                                                                <li class="mb-1">
                                                                    <i class="fas fa-check text-success me-2 small"></i>
                                                                    کوتاه و گویا باشد
                                                                </li>
                                                                <li class="mb-1">
                                                                    <i class="fas fa-check text-success me-2 small"></i>
                                                                    مرتبط با محتوا باشد
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <ul class="list-unstyled mb-0">
                                                                <li class="mb-1">
                                                                    <i class="fas fa-check text-success me-2 small"></i>
                                                                    برای کاربران قابل درک باشد
                                                                </li>
                                                                <li class="mb-1">
                                                                    <i class="fas fa-check text-success me-2 small"></i>
                                                                    منحصر به فرد باشد
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- وضعیت محصولات -->
                                    <div class="products-status mb-4">
                                        <div class="alert alert-info">
                                            <h6 class="alert-heading mb-2">
                                                <i class="fas fa-info-circle me-2"></i>وضعیت محصولات
                                            </h6>
                                            <p class="mb-0">
                                                این دسته‌بندی شامل 
                                                <strong>{{ $category->products->count() }} محصول</strong> 
                                                می‌باشد. تغییر نام دسته‌بندی بر روی تمام این محصولات تأثیر خواهد گذاشت.
                                            </p>
                                        </div>
                                    </div>

                                    <!-- دکمه‌های اقدام -->
                                    <div class="action-buttons d-flex justify-content-between align-items-center pt-3 border-top">
                                        <a href="javascript:history.back()" class="btn btn-outline-secondary">
                                            <i class="fas fa-arrow-right me-2"></i>بازگشت
                                        </a>
                                        <div class="d-flex gap-2">
                                            <button type="button" class="btn btn-outline-danger" onclick="resetForm()">
                                                <i class="fas fa-undo me-2"></i>بازنشانی
                                            </button>
                                            <button type="submit" class="btn btn-primary px-4">
                                                <i class="fas fa-save me-2"></i>ثبت تغییرات
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- نکات مهم -->
                    <div class="important-notes mt-4">
                        <div class="alert alert-warning">
                            <h6 class="alert-heading mb-2">
                                <i class="fas fa-exclamation-triangle me-2"></i>توجه مهم
                            </h6>
                            <ul class="mb-0 ps-3">
                                <li class="mb-1">تغییر نام دسته‌بندی بر روی تمام محصولات این دسته تأثیر می‌گذارد</li>
                                <li class="mb-1">نام جدید باید در کل سیستم یکتا باشد</li>
                                <li>پس از ذخیره، تغییرات بلافاصله اعمال می‌شود</li>
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
        
        .edit-category-container {
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
        
        /* اطلاعات فعلی */
        .current-info {
            display: flex;
            justify-content: center;
        }
        
        .info-badge {
            background: white;
            padding: 0.75rem 1.5rem;
            border-radius: 25px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            border: 2px solid var(--primary-color);
            color: var(--dark-color);
            font-weight: 500;
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
        
        /* فرم کنترل‌ها */
        .form-section {
            padding: 1rem 0;
        }
        
        .form-control {
            border-radius: 12px;
            padding: 15px 20px;
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
        
        /* آمار دسته‌بندی */
        .stat-card {
            background: white;
            border-radius: 15px;
            padding: 1.5rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            border: 1px solid #e9ecef;
            transition: all 0.3s ease;
        }
        
        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.12);
        }
        
        .stat-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5rem;
        }
        
        .stat-number {
            font-weight: 700;
            color: var(--dark-color);
            margin-bottom: 0.25rem;
            font-size: 1.8rem;
        }
        
        .stat-label {
            color: #6c757d;
            margin: 0;
            font-size: 0.9rem;
        }
        
        /* راهنمای نام گذاری */
        .guide-card .card {
            border: 2px solid var(--info-color);
            background: linear-gradient(135deg, rgba(23, 162, 184, 0.05), rgba(23, 162, 184, 0.02));
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
        
        .btn-outline-danger {
            border: 2px solid var(--danger-color);
            color: var(--danger-color);
            background: transparent;
        }
        
        .btn-outline-danger:hover {
            background: var(--danger-color);
            color: white;
            transform: translateY(-2px);
        }
        
        /* رسپانسیو */
        @media (max-width: 768px) {
            .edit-category-container {
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
            
            .action-buttons > div {
                width: 100%;
                justify-content: center;
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
            
            .stat-card {
                padding: 1rem;
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
            
            .category-stats .row > div {
                margin-bottom: 1rem;
            }
            
            .naming-guide .row > div {
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
        
        .edit-category-card {
            animation: fadeInUp 0.6s ease-out;
        }
        
        .important-notes {
            animation: fadeInUp 0.8s ease-out;
        }
    </style>

    <script>
        function resetForm() {
            document.getElementById('category-code-register').value = '{{ $category->name }}';
        }
        
        document.addEventListener('DOMContentLoaded', function() {
            const categoryNameInput = document.getElementById('category-code-register');
            
            // اعتبارسنجی قبل از ارسال
            document.getElementById('registration-form').addEventListener('submit', function(e) {
                const categoryName = categoryNameInput.value.trim();
                
                if (categoryName.length < 2) {
                    e.preventDefault();
                    alert('نام دسته‌بندی باید حداقل ۲ کاراکتر باشد');
                    categoryNameInput.focus();
                    return false;
                }
                
                if (categoryName.length > 50) {
                    e.preventDefault();
                    alert('نام دسته‌بندی نباید بیش از ۵۰ کاراکتر باشد');
                    categoryNameInput.focus();
                    return false;
                }
            });
            
            // نمایش تغییرات در لحظه
            categoryNameInput.addEventListener('input', function(e) {
                const newName = e.target.value;
                // می‌توانید پیش‌نمایشی از تغییرات نشان دهید
            });
        });
    </script>
</x-layout>