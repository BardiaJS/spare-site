<x-layout>
    @if(count($productions) == 0)
    <div class="text-center" style="font-weight: bold; font-size: 20px;">
      <p class="m-0 small shadow-sm">No Production</p>
    </div> 
    @else
      <div class="list-group text-center" >
        @foreach ($productions as $product)
            <a href="/single-product/product/{{$product->id}}" class="list-group-item list-group-item-action">
               <img class="avatar-tiny" src="{{  $product->image_url}}" /> 
               <h4><strong style="font-weight: bold; color: black;">Title: </strong> <span style="font-weight: bold">{{$product->title}}</span></h4>
               <p><strong>Information: </strong>{{$product->information  }}</p>
               <p><strong>Value: </strong>{{$product->value  }}</p>
               <p><strong>Vehicle: </strong>{{$product->vehicle}}</p>
               @if((bool)Auth::user()->customer)
                  <form action="/add-to-order/product/{{$product->id  }}" method="POST">
                    <button class="btn btn-primary">Add to purchase box</button>
                  </form>
               @endif
               {{-- <a href="">
                {{$product->brand->name}}
               </a> --}}
               
              </a>
        @endforeach
      </div>
    @endif
</x-layout>