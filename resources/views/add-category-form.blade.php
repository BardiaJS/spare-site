<x-layout>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <!-- هدر صفحه -->
                <div class="page-header mb-5 text-center">
                    <div class="header-icon mb-4">
                        <div class="icon-wrapper">
                            <i class="fas fa-folder-tree"></i>
                        </div>
                    </div>
                    <h1 class="display-5 mb-3 text-primary fw-bold">مدیریت دسته‌بندی‌ها</h1>
                    <p class="lead text-muted">در این بخش می‌توانید دسته‌بندی‌های محصولات را مدیریت کنید</p>
                </div>

                <!-- بخش نمایش دسته‌بندی‌ها -->
                <div class="categories-section mb-5">
                    <div class="section-header d-flex justify-content-between align-items-center mb-4">
                        <h3 class="h4 mb-0 text-dark">
                            <i class="fas fa-list me-2"></i>دسته‌بندی‌های موجود
                        </h3>
                        <span class="badge bg-primary rounded-pill">{{ count($categories) }} دسته‌بندی</span>
                    </div>
                    
                    <div class="categories-list">
                        @foreach ($categories as $category)
                        <div class="category-card card shadow-sm border-0 mb-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <div class="category-icon bg-gradient-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3">
                                            <i class="fas fa-folder"></i>
                                        </div>
                                        <div>
                                            <h5 class="mb-1 fw-bold text-dark">{{ $category->name }}</h5>
                                            <small class="text-muted">
                                                @if($category->products->count() > 0)
                                                {{ $category->products->count() }} محصول
                                                @else
                                                بدون محصول
                                                @endif
                                            </small>
                                        </div>
                                    </div>
                                    <div class="action-buttons d-flex">
                                        <a href="/edit-category/category/{{ $category->id }}" class="btn btn-outline-primary btn-sm me-2 edit-btn" title="ویرایش">
                                            <i class="fas fa-edit me-1"></i>
                                            <span class="btn-text">ویرایش</span>
                                        </a>
                                        @if($category->products->count() === 0)
                                        <form action="/delete-category/category/{{ $category->id }}" method="POST" class="delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-outline-danger btn-sm delete-btn" title="حذف" 
                                                    onclick="return confirm('آیا از حذف این دسته‌بندی اطمینان دارید؟')">
                                                <i class="fas fa-trash me-1"></i>
                                                <span class="btn-text">حذف</span>
                                            </button>
                                        </form>
                                        @else
                                        <button class="btn btn-outline-secondary btn-sm" disabled title="این دسته‌بندی قابل حذف نیست">
                                            <i class="fas fa-trash me-1"></i>
                                            <span class="btn-text">حذف</span>
                                        </button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        
                        @if(count($categories) === 0)
                        <div class="empty-state text-center py-5">
                            <div class="empty-icon mb-4">
                                <i class="fas fa-folder-open fa-4x text-muted opacity-50"></i>
                            </div>
                            <h5 class="text-muted mb-2">هنوز دسته‌بندی‌ای ایجاد نکرده‌اید</h5>
                            <p class="text-muted">با استفاده از فرم زیر اولین دسته‌بندی را ایجاد کنید</p>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- فرم ایجاد دسته‌بندی جدید -->
                <div class="add-category-section">
                    <div class="card shadow border-0">
                        <div class="card-header bg-gradient-primary text-white py-3">
                            <h4 class="mb-0">
                                <i class="fas fa-plus-circle me-2"></i>افزودن دسته‌بندی جدید
                            </h4>
                        </div>
                        <div class="card-body p-4">
                            <form action="/add-category" method="POST" id="registration-form">
                                @csrf
                                <div class="mb-4">
                                    <label for="category-code-register" class="form-label fw-bold text-dark">اسم دسته‌بندی</label>
                                    <div class="input-group input-group-lg">
                                        <span class="input-group-text bg-light border-end-0">
                                            <i class="fas fa-tag text-primary"></i>
                                        </span>
                                        <input name="name" id="category-code-register" class="form-control border-start-0" type="text" 
                                               placeholder="اسم دسته‌بندی را وارد کنید" autocomplete="off" />
                                    </div>
                                    @error('name')
                                    <div class="alert alert-danger mt-2 py-2 d-flex align-items-center" role="alert">
                                        <i class="fas fa-exclamation-circle me-2"></i>
                                        <span>{{ $message }}</span>
                                    </div>
                                    @enderror
                                </div>
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary btn-lg py-2">
                                        <i class="fas fa-plus me-2"></i>اضافه کردن دسته‌بندی
                                    </button>
                                </div>
                            </form>
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
            --success-color: #4cc9f0;
            --danger-color: #f72585;
            --warning-color: #f8961e;
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
            background: linear-gradient(to right, var(--primary-color), var(--success-color));
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
        
        .category-card {
            transition: all 0.3s ease;
            border-radius: 12px;
            overflow: hidden;
            border: 1px solid rgba(0,0,0,0.05);
        }
        
        .category-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.1) !important;
        }
        
        .category-icon {
            width: 50px;
            height: 50px;
            font-size: 1.2rem;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            box-shadow: 0 5px 15px rgba(67, 97, 238, 0.3);
        }
        
        .section-header {
            position: relative;
            padding-bottom: 15px;
        }
        
        .section-header:after {
            content: '';
            position: absolute;
            bottom: 0;
            right: 0;
            width: 50px;
            height: 3px;
            background: linear-gradient(to right, var(--primary-color), var(--success-color));
            border-radius: 3px;
        }
        
        .empty-state {
            background-color: var(--light-bg);
            border-radius: 15px;
            border: 2px dashed #dee2e6;
        }
        
        .btn {
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border: none;
            box-shadow: 0 5px 15px rgba(67, 97, 238, 0.3);
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(67, 97, 238, 0.4);
        }
        
        .btn-outline-primary {
            border-color: var(--primary-color);
            color: var(--primary-color);
        }
        
        .btn-outline-primary:hover {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border-color: transparent;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(67, 97, 238, 0.3);
        }
        
        .btn-outline-danger {
            border-color: var(--danger-color);
            color: var(--danger-color);
        }
        
        .btn-outline-danger:hover {
            background: linear-gradient(135deg, var(--danger-color), #b5179e);
            border-color: transparent;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(247, 37, 133, 0.3);
        }
        
        .form-control {
            border-radius: 10px;
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
            border-radius: 10px 0 0 10px;
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            border: 2px solid #e9ecef;
            border-left: none;
        }
        
        .input-group .form-control {
            border-right: none;
        }
        
        .card {
            border-radius: 15px;
            overflow: hidden;
            border: none;
        }
        
        .card-header {
            border-bottom: none;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        }
        
        .alert-danger {
            border-radius: 10px;
            border: none;
            background: linear-gradient(135deg, rgba(247, 37, 133, 0.1), rgba(220, 53, 69, 0.1));
            color: var(--danger-color);
            border-left: 4px solid var(--danger-color);
        }
        
        .badge {
            font-size: 0.8rem;
            padding: 8px 12px;
        }
        
        .bg-gradient-primary {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color)) !important;
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
        
        .category-card {
            animation: fadeInUp 0.5s ease-out;
        }
        
        .category-card:nth-child(odd) {
            animation-delay: 0.1s;
        }
        
        .category-card:nth-child(even) {
            animation-delay: 0.2s;
        }
        
        /* رسپانسیو */
        @media (max-width: 768px) {
            .action-buttons {
                flex-direction: column;
                width: 100%;
                margin-top: 15px;
            }
            
            .action-buttons .btn {
                width: 100%;
                margin-bottom: 8px;
                justify-content: center;
            }
            
            .action-buttons form {
                width: 100%;
            }
            
            .category-card .d-flex {
                flex-direction: column;
                align-items: flex-start !important;
            }
            
            .category-card .d-flex > div:first-child {
                margin-bottom: 15px;
                width: 100%;
            }
            
            .btn-text {
                display: inline-block;
            }
            
            .page-header h1 {
                font-size: 2rem;
            }
        }
        
        @media (max-width: 576px) {
            .container {
                padding-left: 15px;
                padding-right: 15px;
            }
            
            .btn-text {
                display: none;
            }
            
            .btn i {
                margin: 0 !important;
            }
        }
        
        /* افکت‌های ویژه */
        .delete-form, .edit-btn {
            transition: all 0.3s ease;
        }
        
        .delete-btn:hover, .edit-btn:hover {
            transform: scale(1.05);
        }
        
        .empty-icon {
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }
    </style>
</x-layout>