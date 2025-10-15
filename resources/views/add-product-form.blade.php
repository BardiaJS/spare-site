<x-layout>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <!-- هدر صفحه -->
                <div class="page-header mb-5 text-center">
                    <div class="header-icon mb-4">
                        <div class="icon-wrapper">
                            <i class="fas fa-cube"></i>
                        </div>
                    </div>
                    <h1 class="display-5 mb-3 text-primary fw-bold">افزودن محصول جدید</h1>
                    <p class="lead text-muted">اطلاعات محصول جدید را در فرم زیر وارد کنید</p>
                </div>

                <!-- فرم افزودن محصول -->
                <div class="add-product-section">
                    <div class="card shadow border-0">
                        <div class="card-header bg-gradient-primary text-white py-4">
                            <h4 class="mb-0">
                                <i class="fas fa-plus-circle me-2"></i>اطلاعات محصول
                            </h4>
                        </div>
                        <div class="card-body p-4">
                            <form action="/add-product" method="POST" id="registration-form">
                                @csrf
                                
                                <!-- بخش دسته‌بندی -->
                                <div class="form-section mb-4">
                                    <div class="section-header mb-3">
                                        <h5 class="text-dark mb-2">
                                            <i class="fas fa-folder me-2 text-primary"></i>دسته‌بندی
                                        </h5>
                                    </div>
                                    <div class="category-selection">
                                        @if (count($categories) == 0)
                                            <div class="empty-state-alert alert alert-warning d-flex align-items-center">
                                                <i class="fas fa-exclamation-triangle me-3 fs-5"></i>
                                                <div>
                                                    <strong>هشدار!</strong> هیچ دسته‌بندی وجود ندارد. لطفاً ابتدا یک دسته‌بندی ایجاد کنید.
                                                </div>
                                            </div>
                                        @else
                                            <div class="row">
                                                @foreach ($categories as $category)
                                                <div class="col-md-6 mb-2">
                                                    <div class="form-check card-radio">
                                                        <input class="form-check-input" type="radio" id="category-{{ $category->id }}" name="category" value="{{ $category->name }}" {{ $loop->first ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="category-{{ $category->id }}">
                                                            <div class="radio-card">
                                                                <div class="radio-icon">
                                                                    <i class="fas fa-folder"></i>
                                                                </div>
                                                                <span class="radio-text">{{ $category->name }}</span>
                                                            </div>
                                                        </label>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <!-- بخش برند -->
                                <div class="form-section mb-4">
                                    <div class="section-header mb-3">
                                        <h5 class="text-dark mb-2">
                                            <i class="fas fa-copyright me-2 text-primary"></i>برند
                                        </h5>
                                    </div>
                                    <div class="brand-selection">
                                        @if(count($brands) == 0)
                                            <div class="empty-state-alert alert alert-warning d-flex align-items-center">
                                                <i class="fas fa-exclamation-triangle me-3 fs-5"></i>
                                                <div>
                                                    <strong>هشدار!</strong> هیچ برندی وجود ندارد. لطفاً ابتدا یک برند ایجاد کنید.
                                                </div>
                                            </div>
                                        @else
                                            <div class="row">
                                                @foreach ($brands as $brand)
                                                <div class="col-md-6 mb-2">
                                                    <div class="form-check card-radio">
                                                        <input class="form-check-input" type="radio" id="brand-{{ $brand->id }}" name="brand" value="{{ $brand->name }}" {{ $loop->first ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="brand-{{ $brand->id }}">
                                                            <div class="radio-card">
                                                                <div class="radio-icon">
                                                                    <i class="fas fa-tag"></i>
                                                                </div>
                                                                <span class="radio-text">{{ $brand->name }}</span>
                                                            </div>
                                                        </label>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <!-- اطلاعات اصلی محصول -->
                                <div class="form-section mb-4">
                                    <div class="section-header mb-3">
                                        <h5 class="text-dark mb-2">
                                            <i class="fas fa-info-circle me-2 text-primary"></i>اطلاعات اصلی محصول
                                        </h5>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="title-register" class="form-label fw-bold text-dark">تایتل محصول</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light">
                                                    <i class="fas fa-heading text-primary"></i>
                                                </span>
                                                <input value="{{ old('title') }}" name="title" id="title-register" class="form-control" type="text" placeholder="عنوان محصول را وارد کنید" autocomplete="off" />
                                            </div>
                                            @error('title')
                                            <div class="alert alert-danger mt-2 py-2 d-flex align-items-center" role="alert">
                                                <i class="fas fa-exclamation-circle me-2"></i>
                                                <span>{{ $message }}</span>
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="value-register" class="form-label fw-bold text-dark">قیمت (تومان)</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light">
                                                    <i class="fas fa-tag text-primary"></i>
                                                </span>
                                                <input value="{{ old('value') }}" name="value" id="value-register" class="form-control" type="number" min="0" placeholder="قیمت محصول" autocomplete="off" />
                                            </div>
                                            @error('value')
                                            <div class="alert alert-danger mt-2 py-2 d-flex align-items-center" role="alert">
                                                <i class="fas fa-exclamation-circle me-2"></i>
                                                <span>{{ $message }}</span>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="information-register" class="form-label fw-bold text-dark">اطلاعات محصول</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light">
                                                    <i class="fas fa-info text-primary"></i>
                                                </span>
                                                <input value="{{ old('information') }}" name="information" id="information-register" class="form-control" type="text" placeholder="اطلاعات تکمیلی محصول" autocomplete="off" />
                                            </div>
                                            @error('information')
                                            <div class="alert alert-danger mt-2 py-2 d-flex align-items-center" role="alert">
                                                <i class="fas fa-exclamation-circle me-2"></i>
                                                <span>{{ $message }}</span>
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="vehicle-register" class="form-label fw-bold text-dark">وسیله نقلیه</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light">
                                                    <i class="fas fa-car text-primary"></i>
                                                </span>
                                                <input value="{{ old('vehicle') }}" name="vehicle" id="vehicle-register" class="form-control" type="text" placeholder="وسیله نقلیه مرتبط" autocomplete="off" />
                                            </div>
                                            @error('vehicle')
                                            <div class="alert alert-danger mt-2 py-2 d-flex align-items-center" role="alert">
                                                <i class="fas fa-exclamation-circle me-2"></i>
                                                <span>{{ $message }}</span>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- دکمه ارسال -->
                                <div class="form-section text-center mt-4">
                                    @if (count($brands) > 0 and count($categories) > 0)
                                        <button type="submit" class="btn btn-primary btn-lg px-5 py-2">
                                            <i class="fas fa-plus me-2"></i>افزودن محصول
                                        </button>
                                    @else
                                        <button disabled type="submit" class="btn btn-secondary btn-lg px-5 py-2">
                                            <i class="fas fa-exclamation-triangle me-2"></i>افزودن محصول
                                        </button>
                                        <p class="text-muted mt-2 small">برای افزودن محصول، ابتدا باید دسته‌بندی و برند ایجاد کنید</p>
                                    @endif
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
        
        .form-section {
            padding: 20px 0;
            border-bottom: 1px solid #e9ecef;
        }
        
        .form-section:last-of-type {
            border-bottom: none;
        }
        
        .section-header {
            border-right: 4px solid var(--primary-color);
            padding-right: 15px;
        }
        
        /* رادیو کارت‌های زیبا */
        .card-radio {
            margin-bottom: 10px;
        }
        
        .card-radio .form-check-input {
            display: none;
        }
        
        .radio-card {
            border: 2px solid #e9ecef;
            border-radius: 10px;
            padding: 15px;
            text-align: center;
            transition: all 0.3s ease;
            cursor: pointer;
            background: white;
        }
        
        .card-radio .form-check-input:checked + .radio-card {
            border-color: var(--primary-color);
            background: linear-gradient(135deg, rgba(67, 97, 238, 0.1), rgba(63, 55, 201, 0.05));
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(67, 97, 238, 0.2);
        }
        
        .radio-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 10px;
            color: white;
        }
        
        .radio-text {
            font-weight: 600;
            color: var(--dark-color);
        }
        
        /* فرم کنترل‌ها */
        .form-control {
            border-radius: 10px;
            padding: 12px 15px;
            transition: all 0.3s ease;
            border: 2px solid #e9ecef;
        }
        
        .form-control:focus {
            box-shadow: 0 0 0 0.25rem rgba(67, 97, 238, 0.15);
            border-color: var(--primary-color);
            transform: translateY(-2px);
        }
        
        .input-group-text {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            border: 2px solid #e9ecef;
            border-right: none;
        }
        
        .input-group .form-control {
            border-right: none;
            border-left: 2px solid #e9ecef;
        }
        
        /* دکمه‌ها */
        .btn {
            border-radius: 10px;
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
        
        .btn-secondary {
            background: linear-gradient(135deg, #6c757d, #5a6268);
            box-shadow: 0 5px 15px rgba(108, 117, 125, 0.3);
        }
        
        /* آلرت‌ها */
        .alert {
            border-radius: 10px;
            border: none;
            border-right: 4px solid;
        }
        
        .alert-danger {
            background: linear-gradient(135deg, rgba(247, 37, 133, 0.1), rgba(220, 53, 69, 0.1));
            color: var(--danger-color);
            border-right-color: var(--danger-color);
        }
        
        .alert-warning {
            background: linear-gradient(135deg, rgba(248, 150, 30, 0.1), rgba(255, 193, 7, 0.1));
            color: #856404;
            border-right-color: var(--warning-color);
        }
        
        .empty-state-alert {
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
            
            .radio-card {
                padding: 12px;
            }
            
            .btn-lg {
                padding: 12px 30px;
                font-size: 1rem;
            }
        }
        
        @media (max-width: 576px) {
            .container {
                padding-left: 15px;
                padding-right: 15px;
            }
            
            .row .col-md-6 {
                margin-bottom: 15px;
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
    </style>
</x-layout>