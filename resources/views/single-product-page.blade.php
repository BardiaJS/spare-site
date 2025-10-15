<x-layout>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap');
    
    .product-detail-container {
      max-width: 900px;
      margin: 0 auto;
      padding: 30px 20px;
      font-family: 'Nunito', sans-serif;
    }
    
    .product-header {
      display: flex;
      align-items: center;
      gap: 25px;
      margin-bottom: 30px;
      padding-bottom: 20px;
      border-bottom: 2px solid #f0f0f0;
    }
    
    .product-image {
      width: 200px;
      height: 200px;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }
    
    .product-image img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
    
    .product-title {
      flex: 1;
    }
    
    .product-title h1 {
      color: #113F67;
      font-weight: 800;
      font-size: 28px;
      margin-bottom: 10px;
    }
    
    .product-meta {
      display: flex;
      gap: 15px;
      flex-wrap: wrap;
    }
    
    .meta-item {
      display: flex;
      align-items: center;
      gap: 5px;
      background: #f8f9fa;
      padding: 6px 12px;
      border-radius: 20px;
      font-size: 14px;
    }
    
    .meta-item .label {
      color: #113F67;
      font-weight: bold;
    }
    
    .meta-item .value {
      color: #58A0C8;
    }
    
    .product-details {
      background: white;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
      padding: 25px;
      margin-bottom: 25px;
    }
    
    .detail-section {
      margin-bottom: 25px;
    }
    
    .detail-section:last-child {
      margin-bottom: 0;
    }
    
    .section-title {
      display: flex;
      align-items: center;
      gap: 10px;
      color: #113F67;
      font-weight: 700;
      font-size: 20px;
      margin-bottom: 12px;
      padding-bottom: 8px;
      border-bottom: 1px solid #f0f0f0;
    }
    
    .section-content {
      color: #58A0C8;
      font-size: 17px;
      line-height: 1.6;
      padding-right: 10px;
    }
    
    .brand-category-section {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 20px;
      margin-bottom: 25px;
    }
    
    .brand-category-card {
      background: white;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
      padding: 20px;
      text-align: center;
    }
    
    .card-title {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
      color: #113F67;
      font-weight: 700;
      font-size: 18px;
      margin-bottom: 15px;
    }
    
    .btn-brand, .btn-category {
      background: #34699A;
      color: #FDF5AA;
      border: none;
      border-radius: 8px;
      padding: 10px 20px;
      font-weight: 700;
      font-size: 16px;
      display: inline-flex;
      align-items: center;
      gap: 8px;
      transition: all 0.3s ease;
      text-decoration: none;
      cursor: pointer;
    }
    
    .btn-brand:hover, .btn-category:hover {
      background: #2a5780;
      transform: translateY(-2px);
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
      color: #FDF5AA;
    }
    
    .action-buttons {
      display: flex;
      flex-wrap: wrap;
      gap: 12px;
      justify-content: center;
      margin-top: 30px;
    }
    
    .btn-action {
      background: #58A0C8;
      color: white;
      border: none;
      border-radius: 8px;
      padding: 12px 20px;
      font-weight: 700;
      font-size: 16px;
      display: inline-flex;
      align-items: center;
      gap: 8px;
      transition: all 0.3s ease;
      cursor: pointer;
    }
    
    .btn-action:hover {
      background: #4a8db3;
      transform: translateY(-2px);
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
    }
    
    .btn-danger {
      background: #e74c3c;
    }
    
    .btn-danger:hover {
      background: #c0392b;
    }
    
    .btn-secondary {
      background: #95a5a6;
    }
    
    .btn-secondary:hover {
      background: #7f8c8d;
    }
    
    /* Responsive adjustments */
    @media (max-width: 768px) {
      .product-header {
        flex-direction: column;
        text-align: center;
      }
      
      .brand-category-section {
        grid-template-columns: 1fr;
      }
      
      .action-buttons {
        flex-direction: column;
        align-items: center;
      }
      
      .btn-action {
        width: 100%;
        justify-content: center;
      }
    }
  </style>
  
  <div class="product-detail-container">
    <!-- Product Header -->
    <div class="product-header">
      <div class="product-image">
        <img src="{{$product->image_url}}" alt="{{$product->title}}" />
      </div>
      <div class="product-title">
        <h1>{{ $product->title }}</h1>
        <div class="product-meta">
          <div class="meta-item">
            <span class="label">قیمت:</span>
            <span class="value">{{ number_format($product->value) }} تومان</span>
          </div>
          <div class="meta-item">
            <span class="label">وسیله نقلیه:</span>
            <span class="value">{{ $product->vehicle }}</span>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Product Details -->
    <div class="product-details">
      <div class="detail-section">
        <div class="section-title">
          <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-info" viewBox="0 0 16 16">
            <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
          </svg>
          اطلاعات محصول
        </div>
        <div class="section-content">
          {{ $product->information }}
        </div>
      </div>
    </div>
    
    <!-- Brand and Category -->
    <div class="brand-category-section">
      <div class="brand-category-card">
        <div class="card-title">
          <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-markdown" viewBox="0 0 16 16">
            <path d="M14 3a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1zM2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2z"/>
            <path fill-rule="evenodd" d="M9.146 8.146a.5.5 0 0 1 .708 0L11.5 9.793l1.646-1.647a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 0 1 0-.708"/>
            <path fill-rule="evenodd" d="M11.5 5a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0v-4a.5.5 0 0 1 .5-.5"/>
            <path d="M3.56 11V7.01h.056l1.428 3.239h.774l1.42-3.24h.056V11h1.073V5.001h-1.2l-1.71 3.894h-.039l-1.71-3.894H2.5V11z"/>
          </svg>
          برند
        </div>
        <form action="/search-brand/{{$product->brand->name}}/result" method="GET">
          <button class="btn-brand">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hash" viewBox="0 0 16 16">
              <path d="M8.39 12.648a1 1 0 0 0-.015.18c0 .305.21.508.5.508.266 0 .492-.172.555-.477l.554-2.703h1.204c.421 0 .617-.234.617-.547 0-.312-.188-.53-.617-.53h-.985l.516-2.524h1.265c.43 0 .618-.227.618-.547 0-.313-.188-.524-.618-.524h-1.046l.476-2.304a1 1 0 0 0 .016-.164.51.51 0 0 0-.516-.516.54.54 0 0 0-.539.43l-.523 2.554H7.617l.477-2.304c.008-.04.015-.118.015-.164a.51.51 0 0 0-.523-.516.54.54 0 0 0-.531.43L6.53 5.484H5.414c-.43 0-.617.22-.617.532s.187.539.617.539h.906l-.515 2.523H4.609c-.421 0-.609.219-.609.531s.188.547.61.547h.976l-.516 2.492c-.008.04-.015.125-.015.18 0 .305.21.508.5.508.265 0 .492-.172.554-.477l.555-2.703h2.242zm-1-6.109h2.266l-.515 2.563H6.859l.532-2.563z"/>
            </svg>
            {{$product->brand->name}}
          </button>
        </form>
      </div>
      
      <div class="brand-category-card">
        <div class="card-title">
          <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-tag" viewBox="0 0 16 16">
            <path d="M6 4.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m-1 0a.5.5 0 1 0-1 0 .5.5 0 0 0 1 0"/>
            <path d="M2 1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 1 6.586V2a1 1 0 0 1 1-1m0 5.586 7 7L13.586 9l-7-7H2z"/>
          </svg>
          دسته بندی
        </div>
        <form action="/search-category/{{ $product->category->name }}/result" method="GET">
          <button class="btn-category">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hash" viewBox="0 0 16 16">
              <path d="M8.39 12.648a1 1 0 0 0-.015.18c0 .305.21.508.5.508.266 0 .492-.172.555-.477l.554-2.703h1.204c.421 0 .617-.234.617-.547 0-.312-.188-.53-.617-.53h-.985l.516-2.524h1.265c.43 0 .618-.227.618-.547 0-.313-.188-.524-.618-.524h-1.046l.476-2.304a1 1 0 0 0 .016-.164.51.51 0 0 0-.516-.516.54.54 0 0 0-.539.43l-.523 2.554H7.617l.477-2.304c.008-.04.015-.118.015-.164a.51.51 0 0 0-.523-.516.54.54 0 0 0-.531.43L6.53 5.484H5.414c-.43 0-.617.22-.617.532s.187.539.617.539h.906l-.515 2.523H4.609c-.421 0-.609.219-.609.531s.188.547.61.547h.976l-.516 2.492c-.008.04-.015.125-.015.18 0 .305.21.508.5.508.265 0 .492-.172.554-.477l.555-2.703h2.242zm-1-6.109h2.266l-.515 2.563H6.859l.532-2.563z"/>
            </svg>
            {{$product->category->name}}
          </button>
        </form>
      </div>
    </div>
    
    <!-- Action Buttons -->
    <div class="action-buttons">
      <form action="/show-all-comments/product/{{$product->id}}">
        <button class="btn-action">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat" viewBox="0 0 16 16">
            <path d="M2.678 11.894a1 1 0 0 1 .287.801 11 11 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8 8 0 0 0 8 14c3.996 0 7-2.807 7-6s-3.004-6-7-6-7 2.808-7 6c0 1.468.617 2.83 1.678 3.894m-.493 3.905a22 22 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a10 10 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9 9 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105"/>
          </svg>
          نظرات
        </button>
      </form>
      
      @if((bool)!Auth::user()->admin)
      <form action="/add-to-order/product/{{$product->id}}" method="POST">
        @csrf
        <button class="btn-action">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-plus" viewBox="0 0 16 16">
            <path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9z"/>
            <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zm3.915 10L3.102 4h10.796l-1.313 7zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0m7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
          </svg>
          اضافه کردن به سبد خرید
        </button>
      </form>
      @endif
      
      @if ((bool) Auth::user()->customer)
      <form action="/delete-from-product-list/product/{{$product->id}}" method="POST">
        @csrf
        @method('DELETE')
        <button class="btn-action btn-danger">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
            <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
          </svg>
          حذف محصول از لیست
        </button>
      </form>
      @endif
      
      @if(Auth::user()->customer and Auth::user()->customer->orders)
        @if(Auth::user()->customer->orders()->where('product_id', $product->id)->exists())
        <form action="/comment-form/{{$product->id}}" method="GET">
          <button class="btn-action btn-secondary">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
              <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
            </svg>
            ثبت نظر
          </button>
        </form>
        @endif
      @endif
    </div>
  </div>
</x-layout>