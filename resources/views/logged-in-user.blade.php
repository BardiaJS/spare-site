<x-layout>
    <div class="dashboard-container">
        <div class="container">
            <!-- هدر داشبورد -->
            <div class="dashboard-header text-center mb-5">
                <div class="user-avatar mb-4">
                    <div class="avatar-wrapper">
                        @if(Auth::user()->avatar_url)
                            <img src="{{ Auth::user()->avatar_url }}" alt="{{ Auth::user()->first_name }}" class="avatar-img">
                        @else
                            <div class="avatar-placeholder">
                                <i class="fas fa-user"></i>
                            </div>
                        @endif
                        @if(Auth::user()->role == "admin" && Auth::user()->admin)
                            <div class="admin-badge">
                                <i class="fas fa-crown"></i>
                            </div>
                        @endif
                    </div>
                </div>
                
                <h1 class="welcome-title">
                    سلام <span class="user-name">{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</span> 👋
                </h1>
                
                <div class="welcome-subtitle">
                    @if(Auth::user()->role == "admin" && Auth::user()->admin)
                        <div class="admin-welcome">
                            <i class="fas fa-shield-alt me-2"></i>
                            به پنل مدیریت خوش آمدید 
                            <strong class="admin-name">{{ Auth::user()->first_name }}</strong>
                        </div>
                    @else
                        <p>به داشبورد شخصی شما خوش آمدید</p>
                    @endif
                </div>
            </div>

            <!-- کارت‌های اقدامات سریع -->
            @if(Auth::user()->role == "admin" && Auth::user()->admin)
            <div class="quick-actions-section mb-5">
                <div class="section-header mb-4">
                    <h3 class="section-title">
                        <i class="fas fa-bolt me-2"></i>
                        اقدامات سریع مدیریت
                    </h3>
                    <p class="section-subtitle">دسترسی سریع به امکانات مدیریتی</p>
                </div>
                
                <div class="quick-actions-grid">
                    <!-- مدیریت کاربران بن شده -->
                    <a href="/ban-list" class="action-card">
                        <div class="card">
                            <div class="card-body text-center">
                                <div class="action-icon ban">
                                    <i class="fas fa-user-slash"></i>
                                </div>
                                <h4 class="action-title">مدیریت کاربران مسدود</h4>
                                <p class="action-description">مدیریت کاربران محدود شده</p>
                                <div class="action-badge">
                                    <i class="fas fa-list me-1"></i>
                                    مشاهده لیست
                                </div>
                            </div>
                        </div>
                    </a>

                    <!-- مدیریت دسته‌بندی‌ها -->
                    <a href="/add-category" class="action-card">
                        <div class="card">
                            <div class="card-body text-center">
                                <div class="action-icon category">
                                    <i class="fas fa-folder-plus"></i>
                                </div>
                                <h4 class="action-title">افزودن دسته‌بندی</h4>
                                <p class="action-description">ایجاد دسته‌بندی جدید</p>
                                <div class="action-badge">
                                    <i class="fas fa-plus me-1"></i>
                                    ایجاد جدید
                                </div>
                            </div>
                        </div>
                    </a>

                    <!-- مدیریت برندها -->
                    <a href="/add-brand" class="action-card">
                        <div class="card">
                            <div class="card-body text-center">
                                <div class="action-icon brand">
                                    <i class="fas fa-copyright"></i>
                                </div>
                                <h4 class="action-title">افزودن برند</h4>
                                <p class="action-description">ثبت برند جدید</p>
                                <div class="action-badge">
                                    <i class="fas fa-plus me-1"></i>
                                    ایجاد جدید
                                </div>
                            </div>
                        </div>
                    </a>

                    <!-- مدیریت محصولات -->
                    <a href="/add-product" class="action-card">
                        <div class="card">
                            <div class="card-body text-center">
                                <div class="action-icon product">
                                    <i class="fas fa-cube"></i>
                                </div>
                                <h4 class="action-title">افزودن محصول</h4>
                                <p class="action-description">ثبت محصول جدید</p>
                                <div class="action-badge">
                                    <i class="fas fa-plus me-1"></i>
                                    ایجاد جدید
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            @endif

            <!-- بخش راهنمای کاربر -->
            <div class="user-guide-section">
                <div class="guide-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h4 class="guide-title">
                                        @if(Auth::user()->customer or Auth::user()->admin)
                                            <i class="fas fa-shopping-bag me-2 text-primary"></i>
                                            مشاهده محصولات
                                        @else
                                            <i class="fas fa-user-edit me-2 text-primary"></i>
                                            تکمیل پروفایل
                                        @endif
                                    </h4>
                                    <p class="guide-description">
                                        @if(Auth::user()->customer or Auth::user()->admin)
                                            می‌توانید لیست کامل محصولات را مشاهده و خریداری کنید
                                        @else
                                            برای دسترسی به محصولات، ابتدا باید پروفایل خود را تکمیل کنید
                                        @endif
                                    </p>
                                </div>
                                <div class="col-md-4 text-center">
                                    @if(Auth::user()->customer or Auth::user()->admin)
                                        <a href="/all-productions" class="btn btn-primary btn-lg">
                                            <i class="fas fa-eye me-2"></i>
                                            مشاهده محصولات
                                        </a>
                                    @else
                                        <a href="/complete-profile-user/{{Auth::user()->id}}" class="btn btn-primary btn-lg">
                                            <i class="fas fa-edit me-2"></i>
                                            تکمیل پروفایل
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- آمار و اطلاعات -->
            <div class="stats-section mt-5">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <div class="stat-card">
                            <div class="stat-icon">
                                <i class="fas fa-calendar-day"></i>
                            </div>
                            <div class="stat-content">
                                <h3 class="stat-number">{{ Auth::user()->created_at->format('Y/m/d') }}</h3>
                                <p class="stat-label">تاریخ عضویت</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="stat-card">
                            <div class="stat-icon">
                                <i class="fas fa-user-tag"></i>
                            </div>
                            <div class="stat-content">
                                <h3 class="stat-number">
                                    @if(Auth::user()->role == "admin")
                                        مدیر سیستم
                                    @else
                                        کاربر عادی
                                    @endif
                                </h3>
                                <p class="stat-label">سطح دسترسی</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="stat-card">
                            <div class="stat-icon">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div class="stat-content">
                                <h3 class="stat-number">{{ Auth::user()->created_at->diffForHumans() }}</h3>
                                <p class="stat-label">مدت عضویت</p>
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

        .dashboard-container {
            padding: 2rem 0;
        }

        /* هدر داشبورد */
        .dashboard-header {
            position: relative;
        }

        .user-avatar {
            display: flex;
            justify-content: center;
        }

        .avatar-wrapper {
            position: relative;
            width: 120px;
            height: 120px;
        }

        .avatar-img {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid var(--primary-color);
            box-shadow: 0 10px 25px rgba(67, 97, 238, 0.3);
        }

        .avatar-placeholder {
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 3rem;
            border: 4px solid var(--primary-color);
            box-shadow: 0 10px 25px rgba(67, 97, 238, 0.3);
        }

        .admin-badge {
            position: absolute;
            bottom: 5px;
            right: 5px;
            width: 30px;
            height: 30px;
            background: linear-gradient(135deg, #ffd700, #ffed4e);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #8b6914;
            font-size: 0.8rem;
            border: 2px solid white;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2);
        }

        .welcome-title {
            color: var(--dark-color);
            font-weight: 700;
            margin-bottom: 1rem;
            font-size: 2.5rem;
        }

        .user-name {
            color: var(--primary-color);
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .welcome-subtitle {
            font-size: 1.3rem;
            color: #6c757d;
        }

        .admin-welcome {
            background: linear-gradient(135deg, #fff3cd, #ffeaa7);
            padding: 1rem 1.5rem;
            border-radius: 15px;
            border-right: 4px solid var(--warning-color);
            display: inline-block;
        }

        .admin-name {
            color: #856404;
        }

        /* اقدامات سریع */
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

        .quick-actions-grid {
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

        .action-icon.ban {
            background: linear-gradient(135deg, var(--danger-color), #c82333);
        }

        .action-icon.category {
            background: linear-gradient(135deg, var(--success-color), #1e7e34);
        }

        .action-icon.brand {
            background: linear-gradient(135deg, var(--info-color), #138496);
        }

        .action-icon.product {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
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

        /* راهنمای کاربر */
        .guide-card .card {
            border-radius: 20px;
            border: none;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            background: linear-gradient(135deg, #ffffff, #f8f9fa);
        }

        .guide-title {
            color: var(--dark-color);
            font-weight: 600;
            margin-bottom: 0.5rem;
            font-size: 1.4rem;
        }

        .guide-description {
            color: #6c757d;
            font-size: 1.1rem;
            margin-bottom: 0;
        }

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

        /* آمار و اطلاعات */
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
            font-size: 1.3rem;
        }

        .stat-label {
            color: #6c757d;
            margin: 0;
            font-size: 0.9rem;
        }

        /* رسپانسیو */
        @media (max-width: 768px) {
            .dashboard-container {
                padding: 1rem 0;
            }

            .welcome-title {
                font-size: 2rem;
            }

            .quick-actions-grid {
                grid-template-columns: 1fr;
            }

            .guide-card .card-body .row {
                text-align: center;
            }

            .guide-card .card-body .col-md-4 {
                margin-top: 1rem;
            }

            .avatar-wrapper {
                width: 100px;
                height: 100px;
            }

            .avatar-placeholder {
                font-size: 2.5rem;
            }
        }

        @media (max-width: 576px) {
            .container {
                padding-left: 15px;
                padding-right: 15px;
            }

            .welcome-title {
                font-size: 1.8rem;
            }

            .stats-section .row > div {
                margin-bottom: 1rem;
            }

            .stat-card {
                padding: 1rem;
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

        .dashboard-header {
            animation: fadeInUp 0.8s ease-out;
        }

        .quick-actions-section {
            animation: fadeInUp 0.6s ease-out 0.2s both;
        }

        .user-guide-section {
            animation: fadeInUp 0.6s ease-out 0.4s both;
        }

        .stats-section {
            animation: fadeInUp 0.6s ease-out 0.6s both;
        }
    </style>
</x-layout>