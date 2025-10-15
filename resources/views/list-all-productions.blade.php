<x-layout>
    <div class="products-container">
        <div class="container">
            <!-- هدر صفحه -->
            <div class="page-header text-center mb-5">
                <div class="header-icon mb-4">
                    <div class="icon-wrapper">
                        <i class="fas fa-cubes"></i>
                    </div>
                </div>
                <h1 class="page-title">محصولات ما</h1>
                <p class="page-subtitle">با کیفیت‌ترین محصولات را از ما بخواهید</p>
                
                <!-- آمار محصولات -->
                <div class="products-stats">
                    <div class="stats-badge">
                        <i class="fas fa-box me-2"></i>
                        {{ count($productions) }} محصول موجود
                    </div>
                </div>
            </div>

            @if(count($productions) == 0)
                <!-- حالت خالی -->
                <div class="empty-state text-center">
                    <div class="empty-icon mb-4">
                        <i class="fas fa-box-open"></i>
                    </div>
                    <h3 class="empty-title">محصولی یافت نشد</h3>
                    <p class="empty-subtitle">هنوز محصولی به فروشگاه اضافه نشده است</p>
                </div>
            @else
                <!-- لیست محصولات -->
                <div class="products-grid">
                    @foreach ($productions as $product)
                    <div class="product-card">
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

                            <!-- بدنه کارت -->
                            <div class="card-body">
                                <!-- عنوان محصول -->
                                <div class="product-title-section mb-3">
                                    <h3 class="product-title">
                                        <i class="fas fa-tag me-2 text-primary"></i>
                                        {{$product->title}}
                                    </h3>
                                </div>

                                <!-- اطلاعات محصول -->
                                <div class="product-info">
                                    <!-- اطلاعات اصلی -->
                                    <div class="info-item">
                                        <div class="info-icon">
                                            <i class="fas fa-info-circle"></i>
                                        </div>
                                        <div class="info-content">
                                            <span class="info-label">اطلاعات محصول</span>
                                            <p class="info-value">{{$product->information}}</p>
                                        </div>
                                    </div>

                                    <!-- قیمت -->
                                    <div class="info-item">
                                        <div class="info-icon">
                                            <i class="fas fa-tag"></i>
                                        </div>
                                        <div class="info-content">
                                            <span class="info-label">قیمت</span>
                                            <p class="info-value price">{{ number_format($product->value) }} تومان</p>
                                        </div>
                                    </div>

                                    <!-- وسیله نقلیه -->
                                    <div class="info-item">
                                        <div class="info-icon">
                                            <i class="fas fa-car"></i>
                                        </div>
                                        <div class="info-content">
                                            <span class="info-label">وسیله نقلیه</span>
                                            <p class="info-value">{{$product->vehicle}}</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- دکمه اقدام -->
                                @if((bool)!Auth::user()->admin)
                                <div class="product-actions mt-4">
                                    <form action="/add-to-order/product/{{$product->id}}" method="POST" class="w-100">
                                        @csrf
                                        <button type="submit" class="btn btn-primary btn-add-to-cart w-100">
                                            <i class="fas fa-cart-plus me-2"></i>
                                            افزودن به سبد خرید
                                        </button>
                                    </form>
                                </div>
                                @endif
                            </div>

                            <!-- فوتر کارت -->
                            <div class="card-footer">
                                <div class="product-meta">
                                    <small class="text-muted">
                                        <i class="fas fa-clock me-1"></i>
                                        {{ $product->created_at->diffForHumans() }}
                                    </small>
                                    @if($product->brand)
                                    <small class="text-muted">
                                        <i class="fas fa-copyright me-1"></i>
                                        {{ $product->brand->name }}
                                    </small>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- صفحه‌بندی -->
                @if($productions->hasPages())
                <div class="pagination-section mt-5">
                    <div class="pagination-wrapper">
                        {{ $productions->links() }}
                    </div>
                </div>
                @endif
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

        .products-container {
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
            font-size: 2.5rem;
        }

        .page-subtitle {
            color: #6c757d;
            font-size: 1.2rem;
        }

        /* آمار محصولات */
        .products-stats {
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
            font-weight: 600;
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

        /* گرید محصولات */
        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 2rem;
        }

        /* کارت محصول */
        .product-card {
            transition: all 0.3s ease;
        }

        .product-card:hover {
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
        }

        .product-card:hover .card {
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        /* تصویر محصول */
        .product-image {
            position: relative;
            overflow: hidden;
            height: 250px;
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

        .product-card:hover .product-overlay {
            opacity: 1;
        }

        .product-card:hover .product-img {
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
            font-size: 1.3rem;
            margin: 0;
            line-height: 1.4;
        }

        /* اطلاعات محصول */
        .product-info {
            flex: 1;
        }

        .info-item {
            display: flex;
            align-items: flex-start;
            gap: 1rem;
            margin-bottom: 1rem;
            padding: 0.75rem;
            background: var(--light-bg);
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .info-item:hover {
            background: #e9ecef;
            transform: translateX(5px);
        }

        .info-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1rem;
            flex-shrink: 0;
        }

        .info-content {
            flex: 1;
        }

        .info-label {
            color: var(--dark-color);
            font-weight: 600;
            font-size: 0.9rem;
            display: block;
            margin-bottom: 0.25rem;
        }

        .info-value {
            color: #6c757d;
            margin: 0;
            font-size: 0.9rem;
            line-height: 1.5;
        }

        .info-value.price {
            color: var(--success-color);
            font-weight: 700;
            font-size: 1.1rem;
        }

        /* دکمه‌ها */
        .product-actions {
            margin-top: auto;
        }

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

        .btn-add-to-cart {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* فوتر کارت */
        .card-footer {
            background: white;
            border-top: 1px solid #e9ecef;
            padding: 1rem 1.5rem;
        }

        .product-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
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
            .products-container {
                padding: 1rem 0;
            }

            .page-title {
                font-size: 2rem;
            }

            .products-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }

            .product-meta {
                flex-direction: column;
                gap: 0.5rem;
                align-items: flex-start;
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

            .product-image {
                height: 200px;
            }

            .info-item {
                flex-direction: column;
                text-align: center;
                gap: 0.5rem;
            }

            .info-icon {
                align-self: center;
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

        .product-card {
            animation: fadeInUp 0.5s ease-out;
        }

        .product-card:nth-child(odd) {
            animation-delay: 0.1s;
        }

        .product-card:nth-child(even) {
            animation-delay: 0.2s;
        }
    </style>
</x-layout>