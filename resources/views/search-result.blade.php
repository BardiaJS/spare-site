<x-layout>
 <div class="list-group" style="text-align: center">
        <p style="font-weight: bold; font-size:20px ;">Search Result</p>
        @if(count($products)==0)
          <p style="font-size: 10">No Match</p>
        @else
          @foreach ($products as $product)
            <a href="/single-product/product/{{$product->id}} " class="list-group-item list-group-item-action"> 
                <img style="width:50px; weight:50px" src="{{$product->image_url}}">
                <span>
                  <strong style="font-weight: bold; margin-left: 10px;">
                    title: {{$product->title}}    
                  </strong>
                  <strong style="font-weight: bold; margin-left: 10px;">
                    value: {{$product->value}}    
                  </strong>
                </span>
            </a>
          @endforeach
        @endif
      </div>
</x-layout>