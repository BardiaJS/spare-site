<x-layout>
    <div class="profile-container">
        <div class="container">
            <!-- هدر پروفایل -->
            <div class="profile-header text-center mb-5">
                <div class="user-avatar-section mb-4">
                    <div class="avatar-wrapper">
                        <img class="avatar-large" src="{{ Auth::user()->avatar_url }}" alt="{{ Auth::user()->first_name }}" />
                        @if(Auth::user()->admin)
                        <div class="admin-badge">
                            <i class="fas fa-crown"></i>
                        </div>
                        @endif
                    </div>
                </div>
                
                <div class="user-info">
                    <h1 class="user-name">
                        {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                        @if(Auth::user()->admin)
                        <span class="verified-badge">
                            <i class="fas fa-check-circle"></i>
                        </span>
                        @endif
                    </h1>
                    <p class="user-role">
                        @if(Auth::user()->admin)
                            <i class="fas fa-shield-alt me-2"></i>
                            مدیر سیستم
                        @else
                            <i class="fas fa-user me-2"></i>
                            کاربر عادی
                        @endif
                    </p>
                </div>
            </div>

            <!-- بخش اقدامات سریع -->
            <div class="quick-actions-section mb-5">
                <div class="section-header mb-4">
                    <h3 class="section-title">
                        <i class="fas fa-cog me-2"></i>
                        مدیریت حساب کاربری
                    </h3>
                    <p class="section-subtitle">تنظیمات و اطلاعات حساب خود را مدیریت کنید</p>
                </div>

                <div class="actions-grid">
                    @if(Auth::user()->admin)
                    <!-- تغییر اطلاعات ادمین -->
                    <a href="/admin-information/admin/{{ Auth::user()->admin->id }}" class="action-card">
                        <div class="card">
                            <div class="card-body text-center">
                                <div class="action-icon admin">
                                    <i class="fas fa-user-shield"></i>
                                </div>
                                <h4 class="action-title">اطلاعات مدیریتی</h4>
                                <p class="action-description">ویرایش اطلاعات ادمین</p>
                                <div class="action-badge">
                                    <i class="fas fa-edit me-1"></i>
                                    ویرایش
                                </div>
                            </div>
                        </div>
                    </a>
                    @endif

                    <!-- تغییر اطلاعات کاربر -->
                    <a href="/user-information/user/{{Auth::user()->id}}" class="action-card">
                        <div class="card">
                            <div class="card-body text-center">
                                <div class="action-icon profile">
                                    <i class="fas fa-user-edit"></i>
                                </div>
                                <h4 class="action-title">اطلاعات شخصی</h4>
                                <p class="action-description">ویرایش اطلاعات کاربری</p>
                                <div class="action-badge">
                                    <i class="fas fa-edit me-1"></i>
                                    ویرایش
                                </div>
                            </div>
                        </div>
                    </a>

                    <!-- تغییر رمز عبور -->
                    <a href="/user-password/user/{{Auth::user()->id}}" class="action-card">
                        <div class="card">
                            <div class="card-body text-center">
                                <div class="action-icon security">
                                    <i class="fas fa-key"></i>
                                </div>
                                <h4 class="action-title">رمز عبور</h4>
                                <p class="action-description">تغییر رمز عبور حساب</p>
                                <div class="action-badge">
                                    <i class="fas fa-lock me-1"></i>
                                    امنیت
                                </div>
                            </div>
                        </div>
                    </a>

                    <!-- تغییر آواتار -->
                    <a href="/avatar-form" class="action-card">
                        <div class="card">
                            <div class="card-body text-center">
                                <div class="action-icon avatar">
                                    <i class="fas fa-camera"></i>
                                </div>
                                <h4 class="action-title">آواتار</h4>
                                <p class="action-description">تغییر تصویر پروفایل</p>
                                <div class="action-badge">
                                    <i class="fas fa-image me-1"></i>
                                    تغییر
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- بخش نظرات کاربر -->
            @if(Auth::user()->role != "admin")
            <div class="comments-section">
                <div class="section-header mb-4">
                    <h3 class="section-title">
                        <i class="fas fa-comments me-2"></i>
                        نظرات من
                    </h3>
                    <p class="section-subtitle">نظراتی که در سایت ثبت کرده‌اید</p>
                </div>

                @if(count($comments) == 0)
                <div class="empty-comments text-center">
                    <div class="empty-icon mb-3">
                        <i class="fas fa-comment-slash"></i>
                    </div>
                    <h4 class="empty-title">هنوز نظری ثبت نکرده‌اید</h4>
                    <p class="empty-subtitle">پس از ثبت نظر، آن‌ها در اینجا نمایش داده می‌شوند</p>
                    <a href="/all-productions" class="btn btn-primary mt-3">
                        <i class="fas fa-shopping-bag me-2"></i>
                        مشاهده محصولات
                    </a>
                </div>
                @else
                <div class="comments-list">
                    @foreach ($comments as $comment)
                    <div class="comment-item">
                        <div class="card">
                            <div class="card-body">
                                <div class="comment-header">
                                    <div class="product-info">
                                        <h5 class="product-name">
                                            <i class="fas fa-cube me-2 text-primary"></i>
                                            {{ $comment->product->title }}
                                        </h5>
                                        <span class="comment-date">
                                            <i class="fas fa-clock me-1"></i>
                                            {{ $comment->created_at->diffForHumans() }}
                                        </span>
                                    </div>
                                    <a href="/show-all-comments/product/{{ $comment->product->id }}" class="btn-view-comments">
                                        <i class="fas fa-eye me-1"></i>
                                        مشاهده نظرات
                                    </a>
                                </div>
                                <div class="comment-content">
                                    <div class="comment-text">
                                        <i class="fas fa-quote-right quote-icon"></i>
                                        <p>{{ $comment->body }}</p>
                                    </div>
                                </div>
                                <div class="comment-actions">
                                    <a href="/edit-comment/form/{{ $comment->id }}" class="btn btn-outline-primary btn-sm">
                                        <i class="fas fa-edit me-1"></i>
                                        ویرایش
                                    </a>
                                    <form action="/delete-comment/comment/{{ $comment->id }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm" 
                                                onclick="return confirm('آیا از حذف این نظر اطمینان دارید؟')">
                                            <i class="fas fa-trash me-1"></i>
                                            حذف
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif
            </div>
            @endif

            <!-- آمار کاربر -->
            <div class="user-stats-section mt-5">
                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-calendar-day"></i>
                        </div>
                        <div class="stat-content">
                            <h3 class="stat-number">{{ Auth::user()->created_at->format('Y/m/d') }}</h3>
                            <p class="stat-label">تاریخ عضویت</p>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-comments"></i>
                        </div>
                        <div class="stat-content">
                            <h3 class="stat-number">{{ count($comments) }}</h3>
                            <p class="stat-label">تعداد نظرات</p>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-user-tag"></i>
                        </div>
                        <div class="stat-content">
                            <h3 class="stat-number">
                                @if(Auth::user()->admin)
                                    مدیر
                                @else
                                    کاربر
                                @endif
                            </h3>
                            <p class="stat-label">نقش کاربری</p>
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

        .profile-container {
            padding: 2rem 0;
        }

        /* هدر پروفایل */
        .profile-header {
            position: relative;
        }

        .avatar-wrapper {
            position: relative;
            display: inline-block;
        }

        .avatar-large {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 5px solid white;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        }

        .admin-badge {
            position: absolute;
            bottom: 10px;
            right: 10px;
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #ffd700, #ffed4e);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #8b6914;
            font-size: 1rem;
            border: 3px solid white;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .user-name {
            color: var(--dark-color);
            font-weight: 700;
            margin-bottom: 0.5rem;
            font-size: 2.2rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .verified-badge {
            color: var(--primary-color);
            font-size: 1.5rem;
        }

        .user-role {
            color: #6c757d;
            font-size: 1.2rem;
            margin: 0;
        }

        /* بخش اقدامات سریع */
        .section-header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .section-title {
            color: var(--dark-color);
            font-weight: 600;
            margin-bottom: 0.5rem;
            font-size: 1.8rem;
        }

        .section-subtitle {
            color: #6c757d;
            font-size: 1.1rem;
        }

        .actions-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
        }

        .action-card {
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .action-card:hover {
            transform: translateY(-10px);
            text-decoration: none;
        }

        .action-card .card {
            border-radius: 20px;
            overflow: hidden;
            border: none;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            height: 100%;
        }

        .action-card:hover .card {
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .action-icon {
            width: 80px;
            height: 80px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            font-size: 2rem;
            color: white;
        }

        .action-icon.admin {
            background: linear-gradient(135deg, var(--warning-color), #e0a800);
        }

        .action-icon.profile {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        }

        .action-icon.security {
            background: linear-gradient(135deg, var(--success-color), #1e7e34);
        }

        .action-icon.avatar {
            background: linear-gradient(135deg, var(--info-color), #138496);
        }

        .action-title {
            color: var(--dark-color);
            font-weight: 600;
            margin-bottom: 0.5rem;
            font-size: 1.2rem;
        }

        .action-description {
            color: #6c757d;
            margin-bottom: 1rem;
            font-size: 0.9rem;
        }

        .action-badge {
            display: inline-block;
            background: var(--light-bg);
            padding: 0.5rem 1rem;
            border-radius: 20px;
            color: var(--dark-color);
            font-weight: 600;
            font-size: 0.85rem;
        }

        /* بخش نظرات */
        .empty-comments {
            background: white;
            border-radius: 20px;
            padding: 3rem 2rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            border: 2px dashed #dee2e6;
        }

        .empty-icon {
            font-size: 4rem;
            color: #6c757d;
            margin-bottom: 1.5rem;
            opacity: 0.5;
        }

        .empty-title {
            color: var(--dark-color);
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .empty-subtitle {
            color: #6c757d;
        }

        .comments-list {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .comment-item .card {
            border-radius: 15px;
            border: none;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
        }

        .comment-item .card:hover {
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.12);
        }

        .comment-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 1rem;
        }

        .product-name {
            color: var(--dark-color);
            font-weight: 600;
            margin-bottom: 0.25rem;
        }

        .comment-date {
            color: #6c757d;
            font-size: 0.85rem;
        }

        .btn-view-comments {
            background: var(--light-bg);
            color: var(--primary-color);
            padding: 0.5rem 1rem;
            border-radius: 20px;
            text-decoration: none;
            font-size: 0.85rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-view-comments:hover {
            background: var(--primary-color);
            color: white;
            text-decoration: none;
        }

        .comment-content {
            margin-bottom: 1rem;
        }

        .comment-text {
            position: relative;
            padding: 1rem 1.5rem;
            background: var(--light-bg);
            border-radius: 10px;
            border-right: 4px solid var(--primary-color);
        }

        .comment-text p {
            margin: 0;
            line-height: 1.6;
            color: var(--dark-color);
        }

        .quote-icon {
            position: absolute;
            top: -10px;
            left: 15px;
            font-size: 1.5rem;
            color: var(--primary-color);
            opacity: 0.3;
        }

        .comment-actions {
            display: flex;
            gap: 0.5rem;
        }

        .btn {
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
            padding: 0.5rem 1rem;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            box-shadow: 0 3px 10px rgba(67, 97, 238, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(67, 97, 238, 0.4);
        }

        .btn-outline-primary {
            border: 2px solid var(--primary-color);
            color: var(--primary-color);
            background: transparent;
        }

        .btn-outline-primary:hover {
            background: var(--primary-color);
            color: white;
        }

        .btn-outline-danger {
            border: 2px solid var(--danger-color);
            color: var(--danger-color);
            background: transparent;
        }

        .btn-outline-danger:hover {
            background: var(--danger-color);
            color: white;
        }

        /* آمار کاربر */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
        }

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
            font-size: 1.5rem;
        }

        .stat-label {
            color: #6c757d;
            margin: 0;
            font-size: 0.9rem;
        }

        /* رسپانسیو */
        @media (max-width: 768px) {
            .profile-container {
                padding: 1rem 0;
            }

            .user-name {
                font-size: 1.8rem;
            }

            .actions-grid {
                grid-template-columns: 1fr;
            }

            .comment-header {
                flex-direction: column;
                gap: 1rem;
                align-items: flex-start;
            }

            .avatar-large {
                width: 120px;
                height: 120px;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 576px) {
            .container {
                padding-left: 15px;
                padding-right: 15px;
            }

            .comment-actions {
                flex-direction: column;
            }

            .comment-actions .btn {
                width: 100%;
                text-align: center;
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

        .profile-header {
            animation: fadeInUp 0.8s ease-out;
        }

        .quick-actions-section {
            animation: fadeInUp 0.6s ease-out 0.2s both;
        }

        .comments-section {
            animation: fadeInUp 0.6s ease-out 0.4s both;
        }

        .user-stats-section {
            animation: fadeInUp 0.6s ease-out 0.6s both;
        }
    </style>
</x-layout>