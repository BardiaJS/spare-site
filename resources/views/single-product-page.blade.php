<x-layout>
  <div class="container py-md-5  text-center">
      <h2>
        <img class="avatar-small" src="{{$product->image_url}}" />  
        <div style="padding: 5px;">
            <p style="margin-bottom: 2px">Title:</p>
            {{ $product->title}}  
        </div>
        <div style="margin-top: 10px">
            <p style="margin-bottom: 2px">Information:</p>
            {{$product->information}}
        </div>
        <div style="margin-top: 10px">
            <p style="margin-bottom: 2px">Value:</p>
            {{$product->value  }}
        </div>
        <div style="margin-top: 10px">
            <p style="margin-bottom: 2px">Vehicle:</p>
            {{$product->vehicle  }}
        </div>
      </h2>



      <div class="text-center" style="justify-content: center; text-align: center;" >
        <p>Brand</p>
      <form action="/search-category/{{$product->brand->name}}/result" method="GET">
          <button class="btn btn-dark" style="width: 100px; margin-top: 2px;"> 
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hash" viewBox="0 0 16 16">
                <path d="M8.39 12.648a1 1 0 0 0-.015.18c0 .305.21.508.5.508.266 0 .492-.172.555-.477l.554-2.703h1.204c.421 0 .617-.234.617-.547 0-.312-.188-.53-.617-.53h-.985l.516-2.524h1.265c.43 0 .618-.227.618-.547 0-.313-.188-.524-.618-.524h-1.046l.476-2.304a1 1 0 0 0 .016-.164.51.51 0 0 0-.516-.516.54.54 0 0 0-.539.43l-.523 2.554H7.617l.477-2.304c.008-.04.015-.118.015-.164a.51.51 0 0 0-.523-.516.54.54 0 0 0-.531.43L6.53 5.484H5.414c-.43 0-.617.22-.617.532s.187.539.617.539h.906l-.515 2.523H4.609c-.421 0-.609.219-.609.531s.188.547.61.547h.976l-.516 2.492c-.008.04-.015.125-.015.18 0 .305.21.508.5.508.265 0 .492-.172.554-.477l.555-2.703h2.242zm-1-6.109h2.266l-.515 2.563H6.859l.532-2.563z"/>
            </svg>
            
            {{$product->brand->name}} </button>
        </form>

      </div>
      <div class="text-center" style="justify-content: center; text-align: center; margin-top: 20px; margin-bottom: 2px;" >
        <p>Category</p>
        <form action="/search-brand/{{ $product->category->name }}/result" method="GET">
          <button class="btn btn-dark" style="width: 100px;"> 
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hash" viewBox="0 0 16 16">
                <path d="M8.39 12.648a1 1 0 0 0-.015.18c0 .305.21.508.5.508.266 0 .492-.172.555-.477l.554-2.703h1.204c.421 0 .617-.234.617-.547 0-.312-.188-.53-.617-.53h-.985l.516-2.524h1.265c.43 0 .618-.227.618-.547 0-.313-.188-.524-.618-.524h-1.046l.476-2.304a1 1 0 0 0 .016-.164.51.51 0 0 0-.516-.516.54.54 0 0 0-.539.43l-.523 2.554H7.617l.477-2.304c.008-.04.015-.118.015-.164a.51.51 0 0 0-.523-.516.54.54 0 0 0-.531.43L6.53 5.484H5.414c-.43 0-.617.22-.617.532s.187.539.617.539h.906l-.515 2.523H4.609c-.421 0-.609.219-.609.531s.188.547.61.547h.976l-.516 2.492c-.008.04-.015.125-.015.18 0 .305.21.508.5.508.265 0 .492-.172.554-.477l.555-2.703h2.242zm-1-6.109h2.266l-.515 2.563H6.859l.532-2.563z"/>
            </svg>
            
            {{$product->category->name}} </button>
        </form>

      </div>
      <div>
        <form action="/show-all-comments/product/{{$product->id}}">
            <button class="btn btn-primary" style="margin-top: 10px">Show all comments</button>
        </form>
      </div>
      <div>
      @if((bool)Auth::user()->customer)
        <form action="/add-to-order/product/{{$product->id  }}" method="POST">
          @csrf
          <button class="btn btn-primary" style="margin-top: 10px">Add to purchase box</button>
        </form>
      </div>
      @endif

    @if(Auth::user()->customer and Auth::user()->customer->orders)
      @if(Auth::user()->customer->orders()->where('product_id', $product->id)->exists())
        <div>
          <form action="/comment-form/{{$product->id}}"  method="GET">
            <button class="btn btn-primary" style="margin-top: 10px">Comment</button>
          </form>
        </div>
      @endif
    @endif
    </div>


</x-layout>
