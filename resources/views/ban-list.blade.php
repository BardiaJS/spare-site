<x-layout>
    <div class="banned-users-container">
        <div class="container">
            <!-- هدر صفحه -->
            <div class="page-header text-center mb-5">
                <div class="header-icon mb-4">
                    <div class="icon-wrapper">
                        <i class="fas fa-user-slash"></i>
                    </div>
                </div>
                <h1 class="page-title">مدیریت کاربران مسدود شده</h1>
                <p class="page-subtitle">لیست کاربرانی که دسترسی آن‌ها محدود شده است</p>
            </div>

            @if(count($bans) == 0)
                <!-- حالت خالی -->
                <div class="empty-state text-center">
                    <div class="empty-icon mb-4">
                        <i class="fas fa-user-check"></i>
                    </div>
                    <h3 class="empty-title">کاربر مسدود شده‌ای وجود ندارد</h3>
                    <p class="empty-subtitle">همه کاربران در حال حاضر دسترسی کامل دارند</p>
                    <div class="empty-actions mt-4">
                        <a href="/" class="btn btn-primary">
                            <i class="fas fa-home me-2"></i>بازگشت به صفحه اصلی
                        </a>
                    </div>
                </div>
            @else
                <!-- آمار کلی -->
                <div class="stats-section mb-4">
                    <div class="row">
                        <div class="col-md-6 col-lg-3 mb-3">
                            <div class="stat-card">
                                <div class="stat-icon">
                                    <i class="fas fa-users"></i>
                                </div>
                                <div class="stat-content">
                                    <h3 class="stat-number">{{ count($bans) }}</h3>
                                    <p class="stat-label">کاربر مسدود شده</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3 mb-3">
                            <div class="stat-card">
                                <div class="stat-icon">
                                    <i class="fas fa-clock"></i>
                                </div>
                                <div class="stat-content">
                                    <h3 class="stat-number">{{ $bans->total() }}</h3>
                                    <p class="stat-label">کل موارد</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- لیست کاربران بن شده -->
                <div class="banned-users-section">
                    <div class="section-header mb-4">
                        <h2 class="section-title">
                            <i class="fas fa-list me-2"></i>لیست کاربران مسدود شده
                        </h2>
                    </div>

                    <div class="banned-users-list">
                        @foreach ($bans as $ban)
                        <div class="banned-user-card">
                            <div class="user-info">
                                <div class="user-avatar">
                                    <i class="fas fa-user-circle"></i>
                                    <div class="user-status banned">
                                        <i class="fas fa-ban"></i>
                                    </div>
                                </div>
                                <div class="user-details">
                                    <h4 class="user-email">{{ $ban->email }}</h4>
                                    <div class="user-meta">
                                        <span class="meta-item">
                                            <i class="fas fa-id-card me-1"></i>
                                            شناسه کاربر: {{ $ban->user_id }}
                                        </span>
                                        <span class="meta-item">
                                            <i class="fas fa-calendar me-1"></i>
                                            تاریخ مسدودیت: {{ $ban->created_at->diffForHumans() }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="user-actions">
                                <form action="/unban-user/user/{{ $ban->user_id }}" method="POST" class="unban-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-success btn-unban" 
                                            onclick="return confirm('آیا از رفع مسدودیت کاربر {{ $ban->email }} اطمینان دارید؟')">
                                        <i class="fas fa-user-check me-2"></i>
                                        رفع مسدودیت
                                    </button>
                                </form>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <!-- صفحه‌بندی -->
                    @if($bans->hasPages())
                    <div class="pagination-section mt-5">
                        <div class="pagination-wrapper">
                            {{ $bans->links() }}
                        </div>
                    </div>
                    @endif
                </div>
            @endif
        </div>
    </div>

    <style>
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3f37c9;
            --success-color: #28a745;
            --danger-color: #dc3545;
            --warning-color: #ffc107;
            --info-color: #17a2b8;
            --light-bg: #f8f9fa;
            --dark-color: #2d3748;
            --text-muted: #6c757d;
        }

        body {
            font-family: "Noto Sans Arabic", "Nunito", sans-serif;
            background: linear-gradient(135deg, #f5f7fb 0%, #e4e8f0 100%);
            min-height: 100vh;
        }

        .banned-users-container {
            padding: 2rem 0;
        }

        /* هدر صفحه */
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
            background: linear-gradient(135deg, var(--danger-color), #c82333);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 15px 35px rgba(220, 53, 69, 0.3);
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
            color: var(--text-muted);
            font-size: 1.1rem;
        }

        /* حالت خالی */
        .empty-state {
            background: white;
            border-radius: 20px;
            padding: 4rem 2rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            border: 2px dashed #dee2e6;
        }

        .empty-icon {
            font-size: 4rem;
            color: var(--success-color);
            margin-bottom: 1.5rem;
            opacity: 0.7;
        }

        .empty-title {
            color: var(--dark-color);
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .empty-subtitle {
            color: var(--text-muted);
            margin-bottom: 1.5rem;
        }

        /* آمار */
        .stats-section {
            margin-top: 2rem;
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
            font-size: 1.8rem;
        }

        .stat-label {
            color: var(--text-muted);
            margin: 0;
            font-size: 0.9rem;
        }

        /* بخش لیست */
        .section-header {
            border-bottom: 3px solid var(--danger-color);
            padding-bottom: 0.5rem;
        }

        .section-title {
            color: var(--dark-color);
            font-weight: 600;
            margin: 0;
        }

        /* کارت کاربر بن شده */
        .banned-users-list {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .banned-user-card {
            background: white;
            border-radius: 15px;
            padding: 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            border: 1px solid #e9ecef;
            transition: all 0.3s ease;
            border-right: 4px solid var(--danger-color);
        }

        .banned-user-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 1rem;
            flex: 1;
        }

        .user-avatar {
            position: relative;
        }

        .user-avatar i {
            font-size: 3rem;
            color: var(--text-muted);
        }

        .user-status {
            position: absolute;
            bottom: -5px;
            right: -5px;
            width: 24px;
            height: 24px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.8rem;
        }

        .user-status.banned {
            background: var(--danger-color);
            color: white;
        }

        .user-details {
            flex: 1;
        }

        .user-email {
            color: var(--dark-color);
            font-weight: 600;
            margin-bottom: 0.5rem;
            font-size: 1.1rem;
        }

        .user-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .meta-item {
            color: var(--text-muted);
            font-size: 0.85rem;
            display: flex;
            align-items: center;
        }

        .meta-item i {
            font-size: 0.8rem;
        }

        /* دکمه‌های عمل */
        .user-actions {
            flex-shrink: 0;
        }

        .btn {
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
            padding: 0.75rem 1.5rem;
        }

        .btn-success {
            background: linear-gradient(135deg, var(--success-color), #1e7e34);
            box-shadow: 0 4px 15px rgba(40, 167, 69, 0.3);
        }

        .btn-success:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(40, 167, 69, 0.4);
            background: linear-gradient(135deg, #1e7e34, var(--success-color));
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            box-shadow: 0 4px 15px rgba(67, 97, 238, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(67, 97, 238, 0.4);
        }

        /* صفحه‌بندی */
        .pagination-section {
            display: flex;
            justify-content: center;
        }

        .pagination-wrapper nav {
            background: white;
            padding: 1rem 2rem;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        }

        .pagination-wrapper .pagination {
            margin: 0;
        }

        .pagination-wrapper .page-link {
            border: none;
            color: var(--dark-color);
            padding: 0.75rem 1rem;
            margin: 0 0.25rem;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .pagination-wrapper .page-link:hover {
            background: var(--primary-color);
            color: white;
        }

        .pagination-wrapper .page-item.active .page-link {
            background: var(--primary-color);
            color: white;
        }

        /* رسپانسیو */
        @media (max-width: 768px) {
            .banned-users-container {
                padding: 1rem 0;
            }

            .page-title {
                font-size: 1.8rem;
            }

            .banned-user-card {
                flex-direction: column;
                align-items: stretch;
                gap: 1rem;
            }

            .user-info {
                justify-content: center;
                text-align: center;
            }

            .user-meta {
                justify-content: center;
            }

            .user-actions {
                text-align: center;
            }

            .stats-section .row > div {
                margin-bottom: 1rem;
            }

            .stat-card {
                padding: 1rem;
            }
        }

        @media (max-width: 576px) {
            .icon-wrapper {
                width: 80px;
                height: 80px;
            }

            .icon-wrapper i {
                font-size: 2.5rem;
            }

            .user-meta {
                flex-direction: column;
                gap: 0.5rem;
                align-items: center;
            }

            .empty-state {
                padding: 2rem 1rem;
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

        .banned-user-card {
            animation: fadeInUp 0.5s ease-out;
        }

        .banned-user-card:nth-child(even) {
            animation-delay: 0.1s;
        }

        .banned-user-card:nth-child(odd) {
            animation-delay: 0.2s;
        }
    </style>
</x-layout>