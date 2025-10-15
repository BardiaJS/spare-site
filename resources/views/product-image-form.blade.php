<x-layout>
    <div class="upload-product-image-container">
        <div class="container container--narrow">
            <!-- هدر صفحه -->
            <div class="page-header text-center mb-5">
                <div class="header-icon mb-4">
                    <div class="icon-wrapper">
                        <i class="fas fa-camera"></i>
                    </div>
                </div>
                <h1 class="page-title">آپلود عکس محصول</h1>
                <p class="page-subtitle">تصویر جدیدی برای محصول آپلود کنید</p>
                
                <!-- اطلاعات محصول -->
                <div class="product-info mt-4">
                    <div class="info-badge">
                        <i class="fas fa-cube me-2"></i>
                        محصول: <strong>{{ $product->title }}</strong>
                    </div>
                </div>
            </div>

            <!-- فرم آپلود -->
            <div class="upload-form-card">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            <i class="fas fa-cloud-upload-alt me-2"></i>
                            انتخاب تصویر جدید
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="/set-image-for-product-frorm/{{$product->id}}" method="POST" enctype="multipart/form-data" id="uploadForm">
                            @csrf
                            
                            <!-- پیش‌نمایش تصویر -->
                            <div class="image-preview-section text-center mb-4">
                                <div class="preview-wrapper">
                                    <div class="image-preview" id="imagePreview">
                                        <div class="preview-placeholder">
                                            <i class="fas fa-image"></i>
                                            <p class="preview-text">پیش‌نمایش تصویر</p>
                                        </div>
                                        <img id="previewImage" class="preview-image" style="display: none;">
                                    </div>
                                    <div class="current-image mt-3">
                                        <small class="text-muted">
                                            <i class="fas fa-info-circle me-1"></i>
                                            تصویر فعلی: 
                                            @if($product->image_url)
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
                                    <input type="file" name="image_product" id="imageInput" required accept="image/*" class="file-input">
                                    <label for="imageInput" class="file-input-label">
                                        <div class="file-input-content">
                                            <i class="fas fa-folder-open me-2"></i>
                                            <span class="file-input-text">انتخاب فایل تصویر</span>
                                        </div>
                                        <div class="file-input-hint">
                                            <small>فرم‌های مجاز: JPG, PNG, GIF, WEBP - حداکثر سایز: 5MB</small>
                                        </div>
                                    </label>
                                </div>
                                @error('image_product')
                                <div class="alert alert-danger mt-3 d-flex align-items-center" role="alert">
                                    <i class="fas fa-exclamation-triangle me-2"></i>
                                    <span>{{ $message }}</span>
                                </div>
                                @enderror
                            </div>

                            <!-- اطلاعات فایل انتخاب شده -->
                            <div class="file-info-section mb-4" id="fileInfo" style="display: none;">
                                <div class="file-info-card">
                                    <div class="card border-success">
                                        <div class="card-body py-3">
                                            <h6 class="card-title text-success mb-2">
                                                <i class="fas fa-file-image me-2"></i>اطلاعات فایل انتخاب شده
                                            </h6>
                                            <div class="file-details">
                                                <div class="file-detail">
                                                    <i class="fas fa-font me-2"></i>
                                                    <strong>نام فایل:</strong> <span id="fileName">-</span>
                                                </div>
                                                <div class="file-detail">
                                                    <i class="fas fa-weight me-2"></i>
                                                    <strong>حجم فایل:</strong> <span id="fileSize">-</span>
                                                </div>
                                                <div class="file-detail">
                                                    <i class="fas fa-expand me-2"></i>
                                                    <strong>ابعاد:</strong> <span id="fileDimensions">-</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- راهنمای آپلود -->
                            <div class="upload-guide mb-4">
                                <div class="guide-card">
                                    <div class="card border-info">
                                        <div class="card-body py-3">
                                            <h6 class="card-title text-info mb-3">
                                                <i class="fas fa-lightbulb me-2"></i>راهنمای آپلود تصویر مناسب
                                            </h6>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <ul class="list-unstyled mb-0">
                                                        <li class="mb-2">
                                                            <i class="fas fa-check text-success me-2"></i>
                                                            کیفیت بالا و واضح
                                                        </li>
                                                        <li class="mb-2">
                                                            <i class="fas fa-check text-success me-2"></i>
                                                            پس‌زمینه ساده و تمیز
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-6">
                                                    <ul class="list-unstyled mb-0">
                                                        <li class="mb-2">
                                                            <i class="fas fa-check text-success me-2"></i>
                                                            نورپردازی مناسب
                                                        </li>
                                                        <li class="mb-2">
                                                            <i class="fas fa-check text-success me-2"></i>
                                                            زاویه‌ی نمایش مناسب
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
                                    <button type="button" class="btn btn-outline-danger" onclick="clearForm()">
                                        <i class="fas fa-eraser me-2"></i>پاک کردن
                                    </button>
                                    <button type="submit" class="btn btn-primary px-4">
                                        <i class="fas fa-save me-2"></i>ذخیره تصویر
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
                        <li class="mb-1">تصویر جدید جایگزین تصویر قبلی خواهد شد</li>
                        <li class="mb-1">از تصاویر با کیفیت و مرتبط با محصول استفاده کنید</li>
                        <li>تصویر آپلود شده بلافاصله در سایت نمایش داده می‌شود</li>
                    </ul>
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
        
        .upload-product-image-container {
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
        
        /* پیش‌نمایش تصویر */
        .preview-wrapper {
            display: inline-block;
            position: relative;
        }
        
        .image-preview {
            width: 300px;
            height: 250px;
            border-radius: 15px;
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            border: 3px dashed #dee2e6;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
            overflow: hidden;
            position: relative;
            transition: all 0.3s ease;
        }
        
        .image-preview.has-image {
            border: 3px solid var(--primary-color);
        }
        
        .preview-placeholder {
            text-align: center;
            color: #6c757d;
        }
        
        .preview-placeholder i {
            font-size: 3rem;
            margin-bottom: 1rem;
            opacity: 0.5;
        }
        
        .preview-text {
            margin: 0;
            font-weight: 600;
        }
        
        .preview-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 12px;
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
        
        /* اطلاعات فایل */
        .file-info-card .card {
            border: 2px solid var(--success-color);
            background: linear-gradient(135deg, rgba(40, 167, 69, 0.05), rgba(40, 167, 69, 0.02));
        }
        
        .file-details {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }
        
        .file-detail {
            display: flex;
            align-items: center;
            color: var(--dark-color);
        }
        
        /* راهنمای آپلود */
        .guide-card .card {
            border: 2px solid var(--info-color);
            background: linear-gradient(135deg, rgba(23, 162, 184, 0.05), rgba(23, 162, 184, 0.02));
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
            .upload-product-image-container {
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
            
            .image-preview {
                width: 250px;
                height: 200px;
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
            
            .file-input-label {
                padding: 2rem 1rem;
            }
            
            .upload-guide .row > div {
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
        
        .upload-form-card {
            animation: fadeInUp 0.6s ease-out;
        }
        
        .important-notes {
            animation: fadeInUp 0.8s ease-out;
        }
    </style>

    <script>
        function clearForm() {
            document.getElementById('imageInput').value = '';
            document.getElementById('imagePreview').classList.remove('has-image');
            document.getElementById('previewImage').style.display = 'none';
            document.querySelector('.preview-placeholder').style.display = 'block';
            document.getElementById('fileInfo').style.display = 'none';
        }
        
        document.addEventListener('DOMContentLoaded', function() {
            const imageInput = document.getElementById('imageInput');
            const imagePreview = document.getElementById('imagePreview');
            const previewImage = document.getElementById('previewImage');
            const previewPlaceholder = document.querySelector('.preview-placeholder');
            const fileInfo = document.getElementById('fileInfo');
            const fileName = document.getElementById('fileName');
            const fileSize = document.getElementById('fileSize');
            const fileDimensions = document.getElementById('fileDimensions');
            
            imageInput.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    // بررسی نوع فایل
                    if (!file.type.startsWith('image/')) {
                        alert('لطفاً فقط فایل تصویر انتخاب کنید');
                        clearForm();
                        return;
                    }
                    
                    // بررسی سایز فایل (5MB)
                    if (file.size > 5 * 1024 * 1024) {
                        alert('حجم فایل باید کمتر از ۵ مگابایت باشد');
                        clearForm();
                        return;
                    }
                    
                    const reader = new FileReader();
                    
                    reader.onload = function(e) {
                        previewImage.src = e.target.result;
                        previewImage.style.display = 'block';
                        previewPlaceholder.style.display = 'none';
                        imagePreview.classList.add('has-image');
                        
                        // نمایش اطلاعات فایل
                        fileName.textContent = file.name;
                        fileSize.textContent = formatFileSize(file.size);
                        
                        // گرفتن ابعاد تصویر
                        const img = new Image();
                        img.onload = function() {
                            fileDimensions.textContent = `${this.width} × ${this.height} پیکسل`;
                        };
                        img.src = e.target.result;
                        
                        fileInfo.style.display = 'block';
                    }
                    
                    reader.readAsDataURL(file);
                }
            });
            
            // اعتبارسنجی قبل از ارسال
            document.getElementById('uploadForm').addEventListener('submit', function(e) {
                const file = imageInput.files[0];
                
                if (!file) {
                    e.preventDefault();
                    alert('لطفاً یک فایل تصویر انتخاب کنید');
                    return false;
                }
                
                if (!file.type.startsWith('image/')) {
                    e.preventDefault();
                    alert('فایل انتخاب شده باید یک تصویر باشد');
                    return false;
                }
                
                if (file.size > 5 * 1024 * 1024) {
                    e.preventDefault();
                    alert('حجم فایل باید کمتر از ۵ مگابایت باشد');
                    return false;
                }
            });
            
            // فرمت کردن سایز فایل
            function formatFileSize(bytes) {
                if (bytes === 0) return '0 Bytes';
                const k = 1024;
                const sizes = ['Bytes', 'KB', 'MB', 'GB'];
                const i = Math.floor(Math.log(bytes) / Math.log(k));
                return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
            }
        });
    </script>
</x-layout>