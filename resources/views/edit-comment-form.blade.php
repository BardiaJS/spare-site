<x-layout>
    <div class="edit-comment-container">
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
                        <h1 class="page-title">ویرایش نظر</h1>
                        <p class="page-subtitle">نظر خود را به روزرسانی کنید</p>
                        
                        <!-- اطلاعات نظر فعلی -->
                        <div class="current-info mt-4">
                            <div class="info-badge">
                                <i class="fas fa-comment me-2"></i>
                                در حال ویرایش نظر
                            </div>
                        </div>
                    </div>

                    <!-- فرم ویرایش نظر -->
                    <div class="edit-comment-card">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">
                                    <i class="fas fa-comment-dots me-2"></i>
                                    فرم ویرایش نظر
                                </h4>
                            </div>
                            <div class="card-body">
                                <form action="/edit-comment/comment/{{ $comment->id }}" method="POST" id="registration-form">
                                    @csrf
                                    @method('PUT')
                                    
                                    <!-- فیلد نظر -->
                                    <div class="form-section mb-4">
                                        <label for="comment-body" class="form-label fw-bold text-dark">متن نظر</label>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="fas fa-pen text-primary"></i>
                                            </span>
                                            <textarea name="body" id="comment-body" class="form-control" rows="4" 
                                                      placeholder="نظر جدید خود را اینجا بنویسید...">{{ $comment->body }}</textarea>
                                        </div>
                                        @error('body')
                                        <div class="alert alert-danger mt-2 py-2 d-flex align-items-center" role="alert">
                                            <i class="fas fa-exclamation-circle me-2"></i>
                                            <span>{{ $message }}</span>
                                        </div>
                                        @enderror
                                        <div class="d-flex justify-content-between align-items-center mt-2">
                                            <div class="form-text text-muted">
                                                <i class="fas fa-info-circle me-1"></i>
                                                نظر شما پس از تأیید نمایش داده می‌شود
                                            </div>
                                            <div class="character-count">
                                                <small class="text-muted">
                                                    <span id="charCount">{{ strlen($comment->body) }}</span>/500
                                                </small>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- اطلاعات نظر فعلی -->
                                    <div class="current-comment-info mb-4">
                                        <div class="info-card">
                                            <div class="card border-info">
                                                <div class="card-body py-3">
                                                    <h6 class="card-title text-info mb-2">
                                                        <i class="fas fa-history me-2"></i>نظر فعلی
                                                    </h6>
                                                    <div class="current-comment">
                                                        <div class="comment-text">
                                                            <i class="fas fa-quote-left text-muted me-2"></i>
                                                            <span class="comment-content">{{ $comment->body }}</span>
                                                            <i class="fas fa-quote-right text-muted ms-2"></i>
                                                        </div>
                                                        <div class="comment-meta mt-2">
                                                            <small class="text-muted">
                                                                <i class="fas fa-calendar me-1"></i>
                                                                تاریخ ثبت: {{ $comment->created_at->diffForHumans() }}
                                                            </small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- راهنمای نوشتن نظر خوب -->
                                    <div class="writing-guide mb-4">
                                        <div class="guide-card">
                                            <div class="card border-warning">
                                                <div class="card-body py-3">
                                                    <h6 class="card-title text-warning mb-2">
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
                                                                    از جملات واضح استفاده کنید
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <ul class="list-unstyled mb-0">
                                                                <li class="mb-1">
                                                                    <i class="fas fa-check text-success me-2 small"></i>
                                                                    نقاط قوت و ضعف را ذکر کنید
                                                                </li>
                                                                <li class="mb-1">
                                                                    <i class="fas fa-check text-success me-2 small"></i>
                                                                    از کلمات محترمانه استفاده کنید
                                                                </li>
                                                            </ul>
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
                                <li class="mb-1">نظر ویرایش شده مجدداً توسط مدیریت بررسی خواهد شد</li>
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
        
        .edit-comment-container {
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
        
        /* شمارنده کاراکتر */
        .character-count {
            background: var(--light-bg);
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-weight: 600;
        }
        
        /* نظر فعلی */
        .current-comment-info .card {
            border: 2px solid var(--info-color);
            background: linear-gradient(135deg, rgba(23, 162, 184, 0.05), rgba(23, 162, 184, 0.02));
        }
        
        .comment-text {
            background: white;
            padding: 1.5rem;
            border-radius: 12px;
            border-right: 4px solid var(--info-color);
            font-style: italic;
            line-height: 1.6;
            position: relative;
        }
        
        .comment-content {
            color: var(--dark-color);
        }
        
        .comment-meta {
            text-align: left;
        }
        
        /* راهنمای نوشتن */
        .guide-card .card {
            border: 2px solid var(--warning-color);
            background: linear-gradient(135deg, rgba(255, 193, 7, 0.05), rgba(255, 193, 7, 0.02));
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
            .edit-comment-container {
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
            
            .writing-guide .row > div {
                margin-bottom: 0.5rem;
            }
            
            .d-flex.justify-content-between {
                flex-direction: column;
                gap: 0.5rem;
                align-items: flex-start;
            }
            
            .character-count {
                align-self: flex-end;
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
        
        .edit-comment-card {
            animation: fadeInUp 0.6s ease-out;
        }
        
        .important-notes {
            animation: fadeInUp 0.8s ease-out;
        }
    </style>

    <script>
        function resetForm() {
            document.getElementById('comment-body').value = '{{ $comment->body }}';
            updateCharCount();
        }
        
        function updateCharCount() {
            const textarea = document.getElementById('comment-body');
            const charCount = document.getElementById('charCount');
            const count = textarea.value.length;
            
            charCount.textContent = count;
            
            // تغییر رنگ شمارنده در صورت نزدیک شدن به حد مجاز
            if (count > 450) {
                charCount.style.color = '#dc3545';
            } else if (count > 400) {
                charCount.style.color = '#ffc107';
            } else {
                charCount.style.color = '#6c757d';
            }
        }
        
        document.addEventListener('DOMContentLoaded', function() {
            const commentTextarea = document.getElementById('comment-body');
            
            // شمارنده کاراکتر
            commentTextarea.addEventListener('input', updateCharCount);
            
            // مقداردهی اولیه شمارنده
            updateCharCount();
            
            // اعتبارسنجی قبل از ارسال
            document.getElementById('registration-form').addEventListener('submit', function(e) {
                const comment = commentTextarea.value.trim();
                
                if (comment.length < 5) {
                    e.preventDefault();
                    alert('نظر باید حداقل ۵ کاراکتر باشد');
                    commentTextarea.focus();
                    return false;
                }
                
                if (comment.length > 500) {
                    e.preventDefault();
                    alert('نظر نباید بیش از ۵۰۰ کاراکتر باشد');
                    commentTextarea.focus();
                    return false;
                }
                
                if (comment === '{{ $comment->body }}') {
                    e.preventDefault();
                    alert('تغییری در نظر ایجاد نکرده‌اید');
                    commentTextarea.focus();
                    return false;
                }
            });
        });
    </script>
</x-layout>