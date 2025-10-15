<x-layout>
    <div class="comments-container">
        <!-- هدر بخش نظرات -->
        <div class="comments-header text-center mb-5">
            <div class="header-icon mb-3">
                <i class="fas fa-comments"></i>
            </div>
            <h2 class="section-title">نظرات کاربران</h2>
            <p class="section-subtitle">دیدگاه‌های کاربران درباره محصولات</p>
        </div>

        @if(count($comments) == 0)
            <!-- حالت خالی -->
            <div class="empty-state text-center py-5">
                <div class="empty-icon mb-4">
                    <i class="fas fa-comment-slash"></i>
                </div>
                <h3 class="empty-title">هنوز نظری وجود ندارد</h3>
                <p class="empty-subtitle">اولین نفری باشید که نظر می‌دهد</p>
            </div>
        @else
            <!-- لیست نظرات -->
            <div class="comments-list">
                @foreach ($comments as $comment)
                <div class="comment-card">
                    <div class="comment-header">
                        <div class="user-info">
                            <div class="user-avatar">
                                <img src="{{ $comment->customer->user->avatar_url }}" alt="{{ $comment->customer->user->first_name }}">
                                @if(Auth::user()->admin)
                                    @php
                                        $isBanned = Illuminate\Support\Facades\DB::table('bans')
                                            ->where('user_id', $comment->customer->user->id)
                                            ->exists();
                                    @endphp
                                    @if($isBanned)
                                        <div class="user-status banned">
                                            <i class="fas fa-ban"></i>
                                        </div>
                                    @endif
                                @endif
                            </div>
                            <div class="user-details">
                                <h4 class="user-name">{{ $comment->customer->user->first_name }} {{ $comment->customer->user->last_name }}</h4>
                                <span class="comment-time">{{ $comment->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                        <div class="comment-actions">
                            <!-- دکمه‌های ویرایش و حذف برای صاحب نظر -->
                            @if((Auth::user()->customer) && ($comment->customer_id == Auth::user()->customer->id))
                                <button class="btn-action btn-edit" onclick="window.location.href='/edit-comment/form/{{ $comment->id }}'" title="ویرایش نظر">
                                    <i class="fas fa-edit"></i>
                                </button>
                            @endif

                            <!-- دکمه حذف برای صاحب نظر یا ادمین -->
                            @if(((Auth::user()->customer) && ($comment->customer_id == Auth::user()->customer->id)) || (Auth::user()->admin))
                                <form action="/delete-comment/comment/{{ $comment->id }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn-action btn-delete" title="حذف نظر" onclick="return confirm('آیا از حذف این نظر اطمینان دارید؟')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            @endif

                            <!-- دکمه‌های بن و آنبن برای ادمین -->
                            @if(Auth::user()->admin)
                                @php
                                    $isBanned = Illuminate\Support\Facades\DB::table('bans')
                                        ->where('user_id', $comment->customer->user->id)
                                        ->exists();
                                @endphp

                                @if(!$isBanned)
                                    <form action="/ban-user/user/{{ $comment->customer->user->id }}" method="POST" class="d-inline">
                                        @csrf
                                        <button class="btn-action btn-ban" title="مسدود کردن کاربر">
                                            <i class="fas fa-user-slash"></i>
                                        </button>
                                    </form>
                                @else
                                    <form action="/unban-user/user/{{ $comment->customer->user->id }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn-action btn-unban" title="رفع مسدودیت کاربر">
                                            <i class="fas fa-user-check"></i>
                                        </button>
                                    </form>
                                @endif
                            @endif
                        </div>
                    </div>

                    <div class="comment-body">
                        <div class="comment-text">
                            <i class="fas fa-quote-right quote-icon"></i>
                            <p>{{ $comment->body }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- صفحه‌بندی -->
            <div class="pagination-container mt-5">
                {{ $comments->links() }}
            </div>
        @endif
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
            --text-light: #6c757d;
            --border-color: #e9ecef;
        }

        .comments-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 2rem 1rem;
        }

        /* هدر بخش */
        .comments-header {
            padding-bottom: 2rem;
        }

        .header-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            color: white;
            font-size: 2rem;
            box-shadow: 0 10px 25px rgba(67, 97, 238, 0.3);
        }

        .section-title {
            color: var(--dark-color);
            font-weight: 700;
            margin-bottom: 0.5rem;
            font-size: 2rem;
        }

        .section-subtitle {
            color: var(--text-light);
            font-size: 1.1rem;
        }

        /* حالت خالی */
        .empty-state {
            background: var(--light-bg);
            border-radius: 20px;
            padding: 4rem 2rem;
            border: 2px dashed var(--border-color);
        }

        .empty-icon {
            font-size: 4rem;
            color: var(--text-light);
            margin-bottom: 1.5rem;
            opacity: 0.5;
        }

        .empty-title {
            color: var(--dark-color);
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .empty-subtitle {
            color: var(--text-light);
        }

        /* کارت نظر */
        .comment-card {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            border: 1px solid var(--border-color);
            transition: all 0.3s ease;
            position: relative;
        }

        .comment-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.12);
        }

        /* هدر نظر */
        .comment-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 1.5rem;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .user-avatar {
            position: relative;
        }

        .user-avatar img {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid var(--primary-color);
            box-shadow: 0 5px 15px rgba(67, 97, 238, 0.2);
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
            display: flex;
            flex-direction: column;
        }

        .user-name {
            color: var(--dark-color);
            font-weight: 700;
            margin-bottom: 0.25rem;
            font-size: 1.1rem;
        }

        .comment-time {
            color: var(--text-light);
            font-size: 0.9rem;
        }

        /* دکمه‌های عمل */
        .comment-actions {
            display: flex;
            gap: 0.5rem;
        }

        .btn-action {
            width: 40px;
            height: 40px;
            border: none;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            cursor: pointer;
            font-size: 1rem;
        }

        .btn-edit {
            background: rgba(67, 97, 238, 0.1);
            color: var(--primary-color);
        }

        .btn-edit:hover {
            background: var(--primary-color);
            color: white;
            transform: scale(1.1);
        }

        .btn-delete {
            background: rgba(247, 37, 133, 0.1);
            color: var(--danger-color);
        }

        .btn-delete:hover {
            background: var(--danger-color);
            color: white;
            transform: scale(1.1);
        }

        .btn-ban {
            background: rgba(248, 150, 30, 0.1);
            color: var(--warning-color);
        }

        .btn-ban:hover {
            background: var(--warning-color);
            color: white;
            transform: scale(1.1);
        }

        .btn-unban {
            background: rgba(76, 201, 240, 0.1);
            color: var(--success-color);
        }

        .btn-unban:hover {
            background: var(--success-color);
            color: white;
            transform: scale(1.1);
        }

        /* بدنه نظر */
        .comment-body {
            position: relative;
        }

        .comment-text {
            position: relative;
            padding: 1.5rem;
            background: var(--light-bg);
            border-radius: 12px;
            border-right: 4px solid var(--primary-color);
        }

        .comment-text p {
            color: var(--dark-color);
            font-size: 1.1rem;
            line-height: 1.7;
            margin: 0;
            font-weight: 500;
        }

        .quote-icon {
            position: absolute;
            top: -10px;
            right: 20px;
            font-size: 2rem;
            color: var(--primary-color);
            opacity: 0.3;
        }

        /* صفحه‌بندی */
        .pagination-container {
            display: flex;
            justify-content: center;
        }

        .pagination-container nav {
            background: white;
            padding: 1rem 2rem;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        }

        .pagination-container .pagination {
            margin: 0;
        }

        .pagination-container .page-link {
            border: none;
            color: var(--dark-color);
            padding: 0.75rem 1rem;
            margin: 0 0.25rem;
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .pagination-container .page-link:hover {
            background: var(--primary-color);
            color: white;
        }

        .pagination-container .page-item.active .page-link {
            background: var(--primary-color);
            color: white;
        }

        /* رسپانسیو */
        @media (max-width: 768px) {
            .comments-container {
                padding: 1rem;
            }

            .comment-header {
                flex-direction: column;
                gap: 1rem;
            }

            .comment-actions {
                align-self: flex-end;
            }

            .user-info {
                width: 100%;
            }

            .section-title {
                font-size: 1.5rem;
            }

            .comment-card {
                padding: 1.5rem;
            }

            .comment-text p {
                font-size: 1rem;
            }
        }

        @media (max-width: 576px) {
            .user-avatar img {
                width: 50px;
                height: 50px;
            }

            .btn-action {
                width: 35px;
                height: 35px;
                font-size: 0.9rem;
            }

            .comment-text {
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

        .comment-card {
            animation: fadeInUp 0.5s ease-out;
        }

        .comment-card:nth-child(even) {
            animation-delay: 0.1s;
        }

        .comment-card:nth-child(odd) {
            animation-delay: 0.2s;
        }
    </style>
</x-layout>