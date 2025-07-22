<x-layout>
 <div class="list-group" style="text-align: center">
        <p style="font-weight: bold; font-size:25px ; color: #113F67;">نتایج جست و جو</p>
        @if(count($products)==0)
          <p style="font-size: 25; font-weight: bold; color: #113F67;">پیدا نشد</p>
        @else
          @foreach ($products as $product)
            <a href="/single-product/product/{{$product->id}} " class="list-group-item list-group-item-action bg-transparent"> 
                <img style="width:100px; weight:100px" src="{{$product->image_url}}">
                <span>
                  <strong style="font-weight: bold; margin-left: 10px; color: #113F67;">
                    تایتل: </strong><span style="color: #34699A">{{ $product->title}}</span>
                  
                  <strong style="font-weight: bold; margin-left: 10px;">
                    قیمت: </strong><span style="color: #34699A">{{ $product->value}} تومان</span>  
                </span>
            </a>
          @endforeach
          {{$products->links()  }}
        @endif
      </div>
</x-layout>