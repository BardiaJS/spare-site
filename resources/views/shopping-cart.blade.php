<x-layout>
    @if($productions->isEmpty())
    <div class="text-center py-5">
        <div class="empty-state">
            <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="#113F67" class="bi bi-inbox mb-3" viewBox="0 0 16 16">
                <path d="M4.98 4a.5.5 0 0 0-.39.188L1.54 8H6a.5.5 0 0 1 .5.5 1.5 1.5 0 1 0 3 0A.5.5 0 0 1 10 8h4.46l-3.05-3.812A.5.5 0 0 0 11.02 4H4.98zm-1.17-.437A1.5 1.5 0 0 1 4.98 3h6.04a1.5 1.5 0 0 1 1.17.563l3.7 4.625a.5.5 0 0 1 .106.374l-.39 3.124A1.5 1.5 0 0 1 14.117 13H1.883a1.5 1.5 0 0 1-1.489-1.314l-.39-3.124a.5.5 0 0 1 .106-.374l3.7-4.625z"/>
            </svg>
            <p class="m-0 fw-bold fs-5" style="color: #113F67">هیچ محصولی یافت نشد</p>
            <p class="text-muted mt-2">محصولات شما در اینجا نمایش داده خواهند شد</p>
        </div>
    </div> 
    @else
    <div class="products-container">
        <div class="products-header mb-4">
            <h2 class="section-title">سبد خرید شما</h2>
            <p class="text-muted">تعداد محصولات: {{ $productions->count() }}</p>
        </div>

        <div class="products-grid">
            @foreach ($productions as $product)
            <div class="product-card">
                <div class="product-image">
                    <img src="{{ $product->image_url }}" alt="{{ $product->title }}" />
                </div>
                
                <div class="product-details">
                    <h3 class="product-title">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-stickies me-2" viewBox="0 0 16 16">
                            <path d="M1.5 0A1.5 1.5 0 0 0 0 1.5V13a1 1 0 0 0 1 1V1.5a.5.5 0 0 1 .5-.5H14a1 1 0 0 0-1-1z"/>
                            <path d="M3.5 2A1.5 1.5 0 0 0 2 3.5v11A1.5 1.5 0 0 0 3.5 16h6.086a1.5 1.5 0 0 0 1.06-.44l4.915-4.914A1.5 1.5 0 0 0 16 9.586V3.5A1.5 1.5 0 0 0 14.5 2zM3 3.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 .5.5V9h-4.5A1.5 1.5 0 0 0 9 10.5V15H3.5a.5.5 0 0 1-.5-.5zm7 11.293V10.5a.5.5 0 0 1 .5-.5h4.293z"/>
                        </svg>  
                        {{ $product->title }}
                    </h3>
                    
                    <div class="product-info">
                        <div class="info-item">
                            <span class="info-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                    <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
                                </svg>
                            </span>
                            <span class="info-label">اطلاعات:</span>
                            <span class="info-value">{{ $product->information }}</span>
                        </div>
                        
                        <div class="info-item">
                            <span class="info-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-currency-dollar" viewBox="0 0 16 16">
                                    <path d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73z"/>
                                </svg>
                            </span>
                            <span class="info-label">قیمت:</span>
                            <span class="info-value">{{ number_format($product->value) }} تومان</span>
                        </div>
                        
                        <div class="info-item">
                            <span class="info-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-car-front" viewBox="0 0 16 16">
                                    <path d="M4 9a1 1 0 1 1-2 0 1 1 0 0 1 2 0m10 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0M6 8a1 1 0 0 0 0 2h4a1 1 0 1 0 0-2zM4.862 4.276 3.906 6.19a.51.51 0 0 0 .497.731c.91-.073 2.35-.17 3.597-.17s2.688.097 3.597.17a.51.51 0 0 0 .497-.731l-.956-1.913A.5.5 0 0 0 10.691 4H5.309a.5.5 0 0 0-.447.276"/>
                                    <path d="M2.52 3.515A2.5 2.5 0 0 1 4.82 2h6.362c1 0 1.904.596 2.298 1.515l.792 1.848c.075.175.21.319.38.404.5.25.855.715.965 1.262l.335 1.679q.05.242.049.49v.413c0 .814-.39 1.543-1 1.997V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.338c-1.292.048-2.745.088-4 .088s-2.708-.04-4-.088V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.892c-.61-.454-1-1.183-1-1.997v-.413a2.5 2.5 0 0 1 .049-.49l.335-1.68c.11-.546.465-1.012.964-1.261a.8.8 0 0 0 .381-.404l.792-1.848ZM4.82 3a1.5 1.5 0 0 0-1.379.91l-.792 1.847a1.8 1.8 0 0 1-.853.904.8.8 0 0 0-.43.564L1.03 8.904a1.5 1.5 0 0 0-.03.294v.413c0 .796.62 1.448 1.408 1.484 1.555.07 3.786.155 5.592.155s4.037-.084 5.592-.155A1.48 1.48 0 0 0 15 9.611v-.413q0-.148-.03-.294l-.335-1.68a.8.8 0 0 0-.43-.563 1.8 1.8 0 0 1-.853-.904l-.792-1.848A1.5 1.5 0 0 0 11.18 3z"/>
                                </svg>
                            </span>
                            <span class="info-label">وسیله نقلیه:</span>
                            <span class="info-value">{{ $product->vehicle }}</span>
                        </div>
                    </div>
                    
                    <div class="product-actions">
                        <a href="/single-product/product/{{ $product->id }}" class="btn btn-view">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye me-1" viewBox="0 0 16 16">
                                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                            </svg>
                            مشاهده جزئیات
                        </a>
                        
                        @if((bool)Auth::user()->customer)
                        <form action="/delete-from-order/order/{{ $product->orders->first()->id }}" method="POST" class="d-inline">
                            @csrf
                            @method("DELETE")
                            <button class="btn btn-remove">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3 me-1" viewBox="0 0 16 16">
                                    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                                </svg>
                                حذف
                            </button>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        <div class="products-footer mt-5">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="total-price">
                        <span class="total-label">قیمت نهایی:</span>
                        <span class="total-value">{{ number_format($fee) }} تومان</span>
                    </div>
                </div>
                <div class="col-md-6 text-md-end">
                    <form action="/buy-cart" method="POST">
                        @csrf
                        <button class="btn btn-buy">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-heart me-2" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0M14 14V5H2v9a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1M8 7.993c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132"/>
                            </svg>
                            تکمیل خرید
                        </button>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="pagination-container mt-4">
            {{ $productions->links() }}
        </div>
    </div>
    @endif
</x-layout>

<style>
.products-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

.products-header {
    text-align: center;
    border-bottom: 2px solid #f0f0f0;
    padding-bottom: 20px;
}

.section-title {
    color: #113F67;
    font-weight: bold;
    margin-bottom: 10px;
}

.products-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
    gap: 20px;
    margin-top: 20px;
}

.product-card {
    background: white;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    display: flex;
    flex-direction: column;
}

.product-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
}

.product-image {
    height: 200px;
    overflow: hidden;
}

.product-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.product-card:hover .product-image img {
    transform: scale(1.05);
}

.product-details {
    padding: 20px;
    flex-grow: 1;
    display: flex;
    flex-direction: column;
}

.product-title {
    color: #113F67;
    font-size: 1.25rem;
    font-weight: bold;
    margin-bottom: 15px;
    display: flex;
    align-items: center;
}

.product-info {
    margin-bottom: 20px;
}

.info-item {
    display: flex;
    align-items: center;
    margin-bottom: 10px;
    padding: 8px 0;
    border-bottom: 1px solid #f0f0f0;
}

.info-icon {
    color: #113F67;
    margin-left: 10px;
    display: flex;
    align-items: center;
}

.info-label {
    color: #113F67;
    font-weight: bold;
    min-width: 90px;
}

.info-value {
    color: #58A0C8;
    font-weight: bold;
    flex-grow: 1;
    text-align: left;
}

.product-actions {
    display: flex;
    gap: 10px;
    margin-top: auto;
}

.btn {
    padding: 8px 16px;
    border-radius: 6px;
    font-weight: bold;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
    border: none;
    cursor: pointer;
    font-size: 0.9rem;
}

.btn-view {
    background-color: #58A0C8;
    color: white;
    flex-grow: 1;
}

.btn-view:hover {
    background-color: #4a8db3;
    color: white;
}

.btn-remove {
    background-color: #f8f9fa;
    color: #dc3545;
    border: 1px solid #dc3545;
}

.btn-remove:hover {
    background-color: #dc3545;
    color: white;
}

.products-footer {
    background-color: #f8f9fa;
    border-radius: 12px;
    padding: 20px;
}

.total-price {
    display: flex;
    align-items: center;
    gap: 10px;
}

.total-label {
    color: #113F67;
    font-size: 1.2rem;
    font-weight: bold;
}

.total-value {
    color: #58A0C8;
    font-size: 1.4rem;
    font-weight: bold;
}

.btn-buy {
    background-color: #28a745;
    color: white;
    padding: 12px 24px;
    font-size: 1.1rem;
}

.btn-buy:hover {
    background-color: #218838;
    color: white;
}

.empty-state {
    padding: 40px 20px;
}

.empty-state svg {
    opacity: 0.7;
}

.pagination-container {
    display: flex;
    justify-content: center;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .products-grid {
        grid-template-columns: 1fr;
    }
    
    .products-footer .row {
        flex-direction: column;
        gap: 20px;
    }
    
    .products-footer .col-md-6 {
        text-align: center !important;
    }
    
    .product-actions {
        flex-direction: column;
    }
    
    .info-item {
        flex-wrap: wrap;
    }
    
    .info-value {
        text-align: right;
        width: 100%;
        margin-top: 5px;
    }
}
</style>