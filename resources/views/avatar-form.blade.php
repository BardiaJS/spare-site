<x-layout>
    <div class="upload-avatar-container">
        <div class="container container--narrow">
            <!-- هدر صفحه -->
            <div class="upload-header text-center mb-5">
                <div class="header-icon mb-4">
                    <div class="icon-wrapper">
                        <i class="fas fa-user-circle"></i>
                    </div>
                </div>
                <h2 class="page-title">آپلود آواتار</h2>
                <p class="page-subtitle">عکس پروفایل خود را آپلود کنید</p>
            </div>

            <!-- فرم آپلود -->
            <div class="upload-card">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            <i class="fas fa-cloud-upload-alt me-2"></i>
                            انتخاب تصویر
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="/set-profile/user/{{Auth::user()->id}}" method="POST" enctype="multipart/form-data" id="avatarForm">
                            @csrf
                            
                            <!-- پیش‌نمایش آواتار -->
                            <div class="avatar-preview-section text-center mb-4">
                                <div class="avatar-preview-wrapper">
                                    <div class="avatar-preview" id="avatarPreview">
                                        <i class="fas fa-user default-avatar"></i>
                                        <img id="previewImage" class="preview-image" style="display: none;">
                                    </div>
                                    <div class="avatar-current mt-3">
                                        <small class="text-muted">
                                            <i class="fas fa-info-circle me-1"></i>
                                            آواتار فعلی: 
                                            @if(Auth::user()->avatar_url)
                                                <span class="text-success">تنظیم شده</span>
                                            @else
                                                <span class="text-warning">تنظیم نشده</span>
                                            @endif
                                        </small>
                                    </div>
                                </div>
                            </div>

                            <!-- فایل اینپوت -->
                            <div class="file-input-section mb-4">
                                <div class="file-input-wrapper">
                                    <input type="file" name="avatar" id="avatarInput" required accept="image/*" class="file-input">
                                    <label for="avatarInput" class="file-input-label">
                                        <div class="file-input-content">
                                            <i class="fas fa-folder-open me-2"></i>
                                            <span class="file-input-text">انتخاب فایل تصویر</span>
                                        </div>
                                        <div class="file-input-hint">
                                            <small>فرم‌های مجاز: JPG, PNG, GIF - حداکثر سایز: 5MB</small>
                                        </div>
                                    </label>
                                </div>
                                @error('avatar')
                                <div class="alert alert-danger mt-3 d-flex align-items-center" role="alert">
                                    <i class="fas fa-exclamation-triangle me-2"></i>
                                    <span>{{ $message }}</span>
                                </div>
                                @enderror
                            </div>

                            <!-- اطلاعات کاربر -->
                            <div class="user-info-section mb-4">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="info-item">
                                            <i class="fas fa-user me-2 text-primary"></i>
                                            <strong>نام:</strong> {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="info-item">
                                            <i class="fas fa-envelope me-2 text-primary"></i>
                                            <strong>ایمیل:</strong> {{ Auth::user()->email }}
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
                                    <i class="fas fa-save me-2"></i>ذخیره آواتار
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- راهنما -->
            <div class="upload-guide mt-4">
                <div class="guide-card">
                    <div class="card border-info">
                        <div class="card-body">
                            <h6 class="card-title text-info mb-3">
                                <i class="fas fa-lightbulb me-2"></i>راهنمای آپلود
                            </h6>
                            <div class="row">
                                <div class="col-md-6">
                                    <ul class="list-unstyled">
                                        <li class="mb-2">
                                            <i class="fas fa-check-circle text-success me-2"></i>
                                            از تصاویر با کیفیت استفاده کنید
                                        </li>
                                        <li class="mb-2">
                                            <i class="fas fa-check-circle text-success me-2"></i>
                                            نسبت تصویر ۱:۱ مناسب‌تر است
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <ul class="list-unstyled">
                                        <li class="mb-2">
                                            <i class="fas fa-check-circle text-success me-2"></i>
                                            حجم فایل کمتر از ۵ مگابایت
                                        </li>
                                        <li class="mb-2">
                                            <i class="fas fa-check-circle text-success me-2"></i>
                                            فرمت‌های JPG, PNG, GIF
                                        </li>
                                    </ul>
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
            --info-color: #17a2b8;
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
        
        .upload-avatar-container {
            padding: 2rem 0;
        }
        
        .upload-header {
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
        }
        
        .card-body {
            padding: 2.5rem;
        }
        
        /* پیش‌نمایش آواتار */
        .avatar-preview-wrapper {
            display: inline-block;
            position: relative;
        }
        
        .avatar-preview {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            border: 4px solid var(--primary-color);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
            overflow: hidden;
            position: relative;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }
        
        .default-avatar {
            font-size: 4rem;
            color: var(--primary-color);
            opacity: 0.7;
        }
        
        .preview-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
        }
        
        /* فایل اینپوت */
        .file-input-wrapper {
            position: relative;
        }
        
        .file-input {
            position: absolute;
            opacity: 0;
            width: 0;
            height: 0;
        }
        
        .file-input-label {
            display: block;
            padding: 2.5rem;
            border: 3px dashed #dee2e6;
            border-radius: 15px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            background: var(--light-bg);
        }
        
        .file-input-label:hover {
            border-color: var(--primary-color);
            background: rgba(67, 97, 238, 0.05);
            transform: translateY(-2px);
        }
        
        .file-input-content {
            margin-bottom: 1rem;
        }
        
        .file-input-label i {
            font-size: 2.5rem;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }
        
        .file-input-text {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--dark-color);
            display: block;
        }
        
        .file-input-hint {
            color: #6c757d;
        }
        
        /* اطلاعات کاربر */
        .info-item {
            padding: 1rem;
            background: var(--light-bg);
            border-radius: 10px;
            border-right: 4px solid var(--primary-color);
        }
        
        /* دکمه‌ها */
        .btn {
            border-radius: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
            padding: 12px 30px;
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
        
        /* آلرت */
        .alert {
            border-radius: 12px;
            border: none;
            border-right: 4px solid;
            padding: 1rem 1.5rem;
        }
        
        .alert-danger {
            background: linear-gradient(135deg, rgba(220, 53, 69, 0.1), rgba(220, 53, 69, 0.05));
            color: var(--danger-color);
            border-right-color: var(--danger-color);
        }
        
        /* راهنما */
        .guide-card .card {
            border: 2px solid var(--info-color);
            background: linear-gradient(135deg, rgba(23, 162, 184, 0.05), rgba(23, 162, 184, 0.02));
        }
        
        /* رسپانسیو */
        @media (max-width: 768px) {
            .card-body {
                padding: 1.5rem;
            }
            
            .page-title {
                font-size: 1.8rem;
            }
            
            .avatar-preview {
                width: 120px;
                height: 120px;
            }
            
            .action-buttons {
                flex-direction: column;
                gap: 1rem;
            }
            
            .action-buttons .btn {
                width: 100%;
                text-align: center;
            }
            
            .file-input-label {
                padding: 2rem 1rem;
            }
        }
        
        @media (max-width: 576px) {
            .upload-avatar-container {
                padding: 1rem 0;
            }
            
            .icon-wrapper {
                width: 80px;
                height: 80px;
            }
            
            .icon-wrapper i {
                font-size: 2.5rem;
            }
            
            .user-info-section .row > div {
                margin-bottom: 1rem;
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
        
        .upload-card {
            animation: fadeInUp 0.6s ease-out;
        }
        
        .upload-guide {
            animation: fadeInUp 0.8s ease-out;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const avatarInput = document.getElementById('avatarInput');
            const avatarPreview = document.getElementById('avatarPreview');
            const previewImage = document.getElementById('previewImage');
            const defaultAvatar = document.querySelector('.default-avatar');
            
            avatarInput.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    
                    reader.onload = function(e) {
                        previewImage.src = e.target.result;
                        previewImage.style.display = 'block';
                        defaultAvatar.style.display = 'none';
                    }
                    
                    reader.readAsDataURL(file);
                }
            });
            
            // اعتبارسنجی سایز فایل
            document.getElementById('avatarForm').addEventListener('submit', function(e) {
                const fileInput = document.getElementById('avatarInput');
                if (fileInput.files.length > 0) {
                    const fileSize = fileInput.files[0].size / 1024 / 1024; // MB
                    if (fileSize > 5) {
                        e.preventDefault();
                        alert('حجم فایل باید کمتر از ۵ مگابایت باشد.');
                    }
                }
            });
        });
    </script>
</x-layout>