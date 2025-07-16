<x-layout>
 <div class="list-group" style="text-align: center">
        <p style="font-weight: bold; font-size:25px ; color: #113F67;">Search Result</p>
        @if(count($products)==0)
          <p style="font-size: 25; font-weight: bold; color: #113F67;">No Match</p>
        @else
          @foreach ($products as $product)
            <a href="/single-product/product/{{$product->id}} " class="list-group-item list-group-item-action"> 
                <img style="width:100px; weight:100px" src="{{$product->image_url}}">
                <span>
                  <strong style="font-weight: bold; margin-left: 10px; color: #113F67;">
                    title: </strong><span style="color: #34699A">{{ $product->title}}</span>
                  
                  <strong style="font-weight: bold; margin-left: 10px;">
                    value: </strong><span style="color: #34699A">{{ $product->value}}</span>  
                </span>
            </a>
          @endforeach
          {{$products->links()  }}
        @endif
      </div>
</x-layout>