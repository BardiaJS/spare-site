<x-layout>
    <div class="search-results-container">
        <div class="container">
            <!-- هدر نتایج جست‌وجو -->
            <div class="results-header text-center mb-5">
                <div class="results-icon mb-4">
                    <div class="icon-wrapper">
                        <i class="fas fa-search"></i>
                    </div>
                </div>
                <h1 class="results-title">نتایج جست‌وجو</h1>
                <p class="results-subtitle">
                    <i class="fas fa-search me-2"></i>
                    جست‌وجو برای: "<span class="search-term">{{ request('term') }}</span>"
                </p>
                
                <!-- آمار نتایج -->
                <div class="results-stats">
                    <div class="stats-badge">
                        <i class="fas fa-cube me-2"></i>
                        {{ count($products) }} محصول یافت شد
                    </div>
                </div>
            </div>

            @if(count($products) == 0)
                <!-- حالت خالی -->
                <div class="empty-results text-center">
                    <div class="empty-icon mb-4">
                        <i class="fas fa-search-minus"></i>
                    </div>
                    <h3 class="empty-title">نتیجه‌ای یافت نشد</h3>
                    <p class="empty-subtitle">متأسفانه هیچ محصولی مطابق با جست‌وجوی شما پیدا نشد</p>
                    
                    <!-- پیشنهادات -->
                    <div class="suggestions mt-4">
                        <h5 class="suggestions-title">پیشنهادات:</h5>
                        <div class="suggestion-tips">
                            <div class="tip-item">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                از کلمات کلیدی ساده‌تر استفاده کنید
                            </div>
                            <div class="tip-item">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                املای کلمات را بررسی کنید
                            </div>
                            <div class="tip-item">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                در تمام دسته‌بندی‌ها جست‌وجو کنید
                            </div>
                        </div>
                    </div>
                    
                    <!-- دکمه بازگشت -->
                    <div class="empty-actions mt-4">
                        <a href="javascript:history.back()" class="btn btn-outline-primary me-3">
                            <i class="fas fa-arrow-right me-2"></i>
                            بازگشت
                        </a>
                        <a href="/all-productions" class="btn btn-primary">
                            <i class="fas fa-shopping-bag me-2"></i>
                            مشاهده همه محصولات
                        </a>
                    </div>
                </div>
            @else
                <!-- لیست نتایج -->
                <div class="results-grid">
                    @foreach ($products as $product)
                    <div class="product-result-card">
                        <div class="card">
                            <!-- تصویر محصول -->
                            <div class="product-image">
                                <img src="{{ $product->image_url }}" alt="{{ $product->title }}" class="product-img">
                                <div class="product-overlay">
                                    <a href="/single-product/product/{{$product->id}}" class="btn btn-view">
                                        <i class="fas fa-eye me-2"></i>
                                        مشاهده جزئیات
                                    </a>
                                </div>
                            </div>

                            <!-- اطلاعات محصول -->
                            <div class="card-body">
                                <!-- عنوان محصول -->
                                <div class="product-title-section mb-3">
                                    <h3 class="product-title">
                                        <i class="fas fa-cube me-2 text-primary"></i>
                                        {{ $product->title }}
                                    </h3>
                                </div>

                                <!-- اطلاعات قیمت -->
                                <div class="product-price-section mb-3">
                                    <div class="price-tag">
                                        <i class="fas fa-tag me-2"></i>
                                        <span class="price-label">قیمت:</span>
                                        <span class="price-value">{{ number_format($product->value) }} تومان</span>
                                    </div>
                                </div>

                                <!-- اطلاعات اضافی -->
                                <div class="product-meta">
                                    @if($product->information)
                                    <div class="meta-item">
                                        <i class="fas fa-info-circle me-2"></i>
                                        <span class="meta-text">{{ Str::limit($product->information, 80) }}</span>
                                    </div>
                                    @endif
                                    
                                    @if($product->vehicle)
                                    <div class="meta-item">
                                        <i class="fas fa-car me-2"></i>
                                        <span class="meta-text">{{ $product->vehicle }}</span>
                                    </div>
                                    @endif
                                </div>

                                <!-- دکمه اقدام -->
                                <div class="product-actions mt-4">
                                    <a href="/single-product/product/{{$product->id}}" class="btn btn-primary w-100">
                                        <i class="fas fa-shopping-cart me-2"></i>
                                        مشاهده و خرید
                                    </a>
                                </div>
                            </div>

                            <!-- برچسب‌های محصول -->
                            <div class="product-tags">
                                @if($product->category)
                                <span class="product-tag category">
                                    <i class="fas fa-folder me-1"></i>
                                    {{ $product->category->name }}
                                </span>
                                @endif
                                
                                @if($product->brand)
                                <span class="product-tag brand">
                                    <i class="fas fa-copyright me-1"></i>
                                    {{ $product->brand->name }}
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- صفحه‌بندی -->
                @if($products->hasPages())
                <div class="pagination-section mt-5">
                    <div class="pagination-wrapper">
                        {{ $products->links() }}
                    </div>
                </div>
                @endif

                <!-- خلاصه نتایج -->
                <div class="results-summary mt-4">
                    <div class="summary-card">
                        <div class="card border-info">
                            <div class="card-body text-center">
                                <h6 class="summary-title">
                                    <i class="fas fa-chart-bar me-2"></i>
                                    خلاصه نتایج
                                </h6>
                                <div class="summary-stats">
                                    <div class="stat-item">
                                        <span class="stat-number">{{ count($products) }}</span>
                                        <span class="stat-label">محصول یافت شده</span>
                                    </div>
                                    <div class="stat-item">
                                        <span class="stat-number">{{ $products->currentPage() }}</span>
                                        <span class="stat-label">صفحه فعلی</span>
                                    </div>
                                    <div class="stat-item">
                                        <span class="stat-number">{{ $products->lastPage() }}</span>
                                        <span class="stat-label">تعداد صفحات</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
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

        .search-results-container {
            padding: 2rem 0;
        }

        /* هدر نتایج */
        .results-header {
            position: relative;
        }

        .results-icon {
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

        .results-title {
            color: var(--dark-color);
            font-weight: 700;
            margin-bottom: 0.5rem;
            font-size: 2.5rem;
        }

        .results-subtitle {
            color: #6c757d;
            font-size: 1.2rem;
            margin-bottom: 2rem;
        }

        .search-term {
            color: var(--primary-color);
            font-weight: 600;
            background: rgba(67, 97, 238, 0.1);
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
        }

        /* آمار نتایج */
        .results-stats {
            margin-top: 2rem;
        }

        .stats-badge {
            display: inline-block;
            background: white;
            padding: 0.75rem 1.5rem;
            border-radius: 25px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            border: 2px solid var(--primary-color);
            color: var(--dark-color);
            font-weight: 500;
        }

        /* حالت خالی */
        .empty-results {
            background: white;
            border-radius: 20px;
            padding: 4rem 2rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            border: 2px dashed #dee2e6;
            max-width: 600px;
            margin: 0 auto;
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
            margin-bottom: 2rem;
        }

        .suggestions-title {
            color: var(--dark-color);
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .suggestion-tips {
            text-align: right;
        }

        .tip-item {
            color: #6c757d;
            margin-bottom: 0.5rem;
            font-size: 0.95rem;
        }

        .empty-actions {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        /* گرید نتایج */
        .results-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 2rem;
        }

        /* کارت محصول */
        .product-result-card {
            transition: all 0.3s ease;
        }

        .product-result-card:hover {
            transform: translateY(-10px);
        }

        .card {
            border-radius: 20px;
            overflow: hidden;
            border: none;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
            position: relative;
        }

        .product-result-card:hover .card {
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        /* تصویر محصول */
        .product-image {
            position: relative;
            overflow: hidden;
            height: 200px;
        }

        .product-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: all 0.3s ease;
        }

        .product-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.7);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: all 0.3s ease;
        }

        .product-result-card:hover .product-overlay {
            opacity: 1;
        }

        .product-result-card:hover .product-img {
            transform: scale(1.1);
        }

        .btn-view {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 25px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-view:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(67, 97, 238, 0.4);
            color: white;
        }

        /* بدنه کارت */
        .card-body {
            padding: 1.5rem;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .product-title-section {
            border-bottom: 2px solid #f8f9fa;
            padding-bottom: 1rem;
        }

        .product-title {
            color: var(--dark-color);
            font-weight: 700;
            font-size: 1.2rem;
            margin: 0;
            line-height: 1.4;
        }

        /* بخش قیمت */
        .product-price-section {
            background: var(--light-bg);
            padding: 1rem;
            border-radius: 10px;
            border-right: 4px solid var(--success-color);
        }

        .price-tag {
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--dark-color);
        }

        .price-label {
            font-weight: 600;
            margin: 0 0.5rem;
        }

        .price-value {
            color: var(--success-color);
            font-weight: 700;
            font-size: 1.1rem;
        }

        /* اطلاعات متا */
        .product-meta {
            flex: 1;
            margin-top: 1rem;
        }

        .meta-item {
            display: flex;
            align-items: flex-start;
            gap: 0.5rem;
            margin-bottom: 0.75rem;
            color: #6c757d;
            font-size: 0.9rem;
        }

        .meta-item i {
            color: var(--primary-color);
            margin-top: 0.2rem;
            flex-shrink: 0;
        }

        .meta-text {
            line-height: 1.5;
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

        /* برچسب‌های محصول */
        .product-tags {
            position: absolute;
            top: 1rem;
            left: 1rem;
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .product-tag {
            padding: 0.4rem 0.8rem;
            border-radius: 15px;
            font-size: 0.75rem;
            font-weight: 600;
            color: white;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2);
        }

        .product-tag.category {
            background: linear-gradient(135deg, var(--info-color), #138496);
        }

        .product-tag.brand {
            background: linear-gradient(135deg, var(--warning-color), #e0a800);
        }

        /* خلاصه نتایج */
        .summary-card .card {
            border: 2px solid var(--info-color);
            background: linear-gradient(135deg, rgba(23, 162, 184, 0.05), rgba(23, 162, 184, 0.02));
        }

        .summary-title {
            color: var(--info-color);
            font-weight: 600;
            margin-bottom: 1.5rem;
        }

        .summary-stats {
            display: flex;
            justify-content: space-around;
            text-align: center;
        }

        .stat-item {
            display: flex;
            flex-direction: column;
        }

        .stat-number {
            font-weight: 700;
            color: var(--dark-color);
            font-size: 1.5rem;
            margin-bottom: 0.25rem;
        }

        .stat-label {
            color: #6c757d;
            font-size: 0.85rem;
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
            border-radius: 10px;
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
            .search-results-container {
                padding: 1rem 0;
            }

            .results-title {
                font-size: 2rem;
            }

            .results-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }

            .summary-stats {
                flex-direction: column;
                gap: 1rem;
            }

            .empty-actions {
                flex-direction: column;
                align-items: center;
            }

            .empty-actions .btn {
                width: 100%;
                max-width: 250px;
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

            .empty-results {
                padding: 2rem 1rem;
            }

            .card-body {
                padding: 1.25rem;
            }

            .product-tags {
                position: static;
                flex-direction: row;
                justify-content: center;
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

        .results-header {
            animation: fadeInUp 0.8s ease-out;
        }

        .product-result-card {
            animation: fadeInUp 0.5s ease-out;
        }

        .product-result-card:nth-child(odd) {
            animation-delay: 0.1s;
        }

        .product-result-card:nth-child(even) {
            animation-delay: 0.2s;
        }
    </style>
</x-layout>