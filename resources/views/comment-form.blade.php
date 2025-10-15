<x-layout>
    <div class="add-comment-container">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-xl-6">
                    <!-- هدر صفحه -->
                    <div class="page-header text-center mb-5">
                        <div class="header-icon mb-4">
                            <div class="icon-wrapper">
                                <i class="fas fa-comment-medical"></i>
                            </div>
                        </div>
                        <h1 class="page-title">ثبت نظر جدید</h1>
                        <p class="page-subtitle">نظر خود را درباره این محصول به اشتراک بگذارید</p>
                        
                        <!-- اطلاعات محصول -->
                        <div class="product-info mt-4">
                            <div class="product-badge">
                                <i class="fas fa-cube me-2"></i>
                                محصول: <strong>{{ $product->name ?? 'محصول' }}</strong>
                            </div>
                        </div>
                    </div>

                    <!-- فرم ثبت نظر -->
                    <div class="comment-form-card">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">
                                    <i class="fas fa-edit me-2"></i>
                                    فرم ثبت نظر
                                </h4>
                            </div>
                            <div class="card-body">
                                <form action="/add-comment/product/{{$product->id}}" method="POST" id="registration-form">
                                    @csrf
                                    
                                    <!-- فیلد نظر -->
                                    <div class="form-section mb-4">
                                        <label for="comment-register" class="form-label fw-bold text-dark">نظر شما</label>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="fas fa-comment-dots text-primary"></i>
                                            </span>
                                            <textarea name="body" id="comment-register" class="form-control" rows="4" placeholder="نظر خود را درباره این محصول بنویسید..."></textarea>
                                        </div>
                                        @error('body')
                                        <div class="alert alert-danger mt-2 py-2 d-flex align-items-center" role="alert">
                                            <i class="fas fa-exclamation-circle me-2"></i>
                                            <span>{{ $message }}</span>
                                        </div>
                                        @enderror
                                        <div class="form-text text-muted mt-2">
                                            <i class="fas fa-info-circle me-1"></i>
                                            نظر شما پس از تأیید نمایش داده می‌شود.
                                        </div>
                                    </div>

                                    <!-- راهنمای نوشتن نظر خوب -->
                                    <div class="writing-guide mb-4">
                                        <div class="guide-card">
                                            <div class="card border-info">
                                                <div class="card-body py-3">
                                                    <h6 class="card-title text-info mb-2">
                                                        <i class="fas fa-lightbulb me-2"></i>راهنمای نوشتن نظر مفید
                                                    </h6>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <ul class="list-unstyled mb-0">
                                                                <li class="mb-1">
                                                                    <i class="fas fa-check text-success me-2 small"></i>
                                                                    تجربه شخصی خود را بنویسید
                                                                </li>
                                                                <li class="mb-1">
                                                                    <i class="fas fa-check text-success me-2 small"></i>
                                                                    نقاط قوت محصول را ذکر کنید
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <ul class="list-unstyled mb-0">
                                                                <li class="mb-1">
                                                                    <i class="fas fa-check text-success me-2 small"></i>
                                                                    از جملات واضح استفاده کنید
                                                                </li>
                                                                <li class="mb-1">
                                                                    <i class="fas fa-check text-success me-2 small"></i>
                                                                    از کلمات توهین‌آمیز پرهیز کنید
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- اطلاعات کاربر -->
                                    <div class="user-info-section mb-4">
                                        <div class="info-card">
                                            <div class="card border-success">
                                                <div class="card-body py-3">
                                                    <h6 class="card-title text-success mb-2">
                                                        <i class="fas fa-user me-2"></i>در حال ثبت نظر به نام
                                                    </h6>
                                                    <div class="user-details">
                                                        <div class="user-avatar me-3">
                                                            <img src="{{ Auth::user()->avatar_url ?? '/default-avatar.png' }}" alt="{{ Auth::user()->first_name }}" class="avatar-img">
                                                        </div>
                                                        <div class="user-info">
                                                            <h6 class="mb-1">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h6>
                                                            <small class="text-muted">{{ Auth::user()->email }}</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- دکمه‌های اقدام -->
                                    <div class="action-buttons d-flex justify-content-between align-items-center pt-3 border-top">
                                        <a href="javascript:history.back()" class="btn btn-outline-secondary">
                                            <i class="fas fa-arrow-right me-2"></i>بازگشت
                                        </a>
                                        <div class="d-flex gap-2">
                                            <button type="button" class="btn btn-outline-primary" onclick="clearForm()">
                                                <i class="fas fa-eraser me-2"></i>پاک کردن
                                            </button>
                                            <button type="submit" class="btn btn-primary px-4">
                                                <i class="fas fa-paper-plane me-2"></i>ثبت نظر
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
                                <i class="fas fa-exclamation-triangle me-2"></i>نکات مهم
                            </h6>
                            <ul class="mb-0 ps-3">
                                <li class="mb-1">نظرات پس از بررسی توسط مدیریت نمایش داده می‌شوند</li>
                                <li class="mb-1">از ثبت اطلاعات شخصی در نظرات خودداری کنید</li>
                                <li>نظرات توهین‌آمیز و غیرمرتبط حذف خواهند شد</li>
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
        
        .add-comment-container {
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
        
        /* اطلاعات محصول */
        .product-info {
            display: flex;
            justify-content: center;
        }
        
        .product-badge {
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
            resize: vertical;
            min-height: 120px;
            line-height: 1.6;
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
        
        /* راهنمای نوشتن */
        .guide-card .card {
            border: 2px solid var(--info-color);
            background: linear-gradient(135deg, rgba(23, 162, 184, 0.05), rgba(23, 162, 184, 0.02));
        }
        
        /* اطلاعات کاربر */
        .user-details {
            display: flex;
            align-items: center;
        }
        
        .user-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            overflow: hidden;
            border: 3px solid var(--success-color);
        }
        
        .avatar-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .user-info h6 {
            margin: 0;
            color: var(--dark-color);
            font-weight: 600;
        }
        
        .info-card .card {
            border: 2px solid var(--success-color);
            background: linear-gradient(135deg, rgba(40, 167, 69, 0.05), rgba(40, 167, 69, 0.02));
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
        
        .btn-outline-primary {
            border: 2px solid var(--primary-color);
            color: var(--primary-color);
            background: transparent;
        }
        
        .btn-outline-primary:hover {
            background: var(--primary-color);
            color: white;
            transform: translateY(-2px);
        }
        
        /* رسپانسیو */
        @media (max-width: 768px) {
            .add-comment-container {
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
        }
        
        @media (max-width: 576px) {
            .container {
                padding-left: 15px;
                padding-right: 15px;
            }
            
            .card-body {
                padding: 1.25rem;
            }
            
            .user-details {
                flex-direction: column;
                text-align: center;
                gap: 1rem;
            }
            
            .writing-guide .row > div {
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
        
        .comment-form-card {
            animation: fadeInUp 0.6s ease-out;
        }
        
        .important-notes {
            animation: fadeInUp 0.8s ease-out;
        }
    </style>

    <script>
        function clearForm() {
            document.getElementById('comment-register').value = '';
        }
        
        document.addEventListener('DOMContentLoaded', function() {
            const commentTextarea = document.getElementById('comment-register');
            
            // شمارنده کاراکتر
            commentTextarea.addEventListener('input', function(e) {
                const length = e.target.value.length;
                // می‌توانید یک شمارنده نمایش دهید
            });
            
            // اعتبارسنجی قبل از ارسال
            document.getElementById('registration-form').addEventListener('submit', function(e) {
                const comment = commentTextarea.value.trim();
                
                if (comment.length < 5) {
                    e.preventDefault();
                    alert('لطفاً نظر معتبری وارد کنید (حداقل ۵ کاراکتر)');
                    commentTextarea.focus();
                    return false;
                }
                
                if (comment.length > 1000) {
                    e.preventDefault();
                    alert('نظر شما نباید بیش از ۱۰۰۰ کاراکتر باشد');
                    commentTextarea.focus();
                    return false;
                }
            });
        });
    </script>
</x-layout>
