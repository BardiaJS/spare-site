<x-layout>
    @if(count($productions) == 0)
    
     <p class="m-0 small shadow-sm">No Production</p>
    @else
      <div class="list-group">
        @foreach ($productions as $product)
            <a href="#" class="list-group-item list-group-item-action"> <img class="avatar-tiny" src="{{  $product->image_url}}" /> {{$product->value}} </a>
        @endforeach
      </div>
    @endif
</x-layout>