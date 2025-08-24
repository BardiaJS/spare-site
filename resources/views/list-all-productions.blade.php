<x-layout>
    @if(count($productions) == 0)
    <div class="text-center" style="font-weight: bold; font-size: 20px;">
      <p class="m-0 small shadow-sm" style="color: red">محصولی وجود ندارد</p>
    </div> 
    @else
      <div class="list-group text-center g-transparent" style="">
        @foreach ($productions as $product)
            <a  href="/single-product/product/{{$product->id}}" class="list-group-item list-group-item-action bg-transparent">
               <img class="avatar-tiny" src="{{  $product->image_url}}" /> 
               <h4><strong style="font-weight: bold; color:#113F67; font-size: 20px;">
                <svg xmlns="http://www.w3.org/2000/svg"  width="14" height="14" fill="currentColor" class="bi bi-stickies" viewBox="0 0 16 16">
                  <path d="M1.5 0A1.5 1.5 0 0 0 0 1.5V13a1 1 0 0 0 1 1V1.5a.5.5 0 0 1 .5-.5H14a1 1 0 0 0-1-1z"/>
                  <path d="M3.5 2A1.5 1.5 0 0 0 2 3.5v11A1.5 1.5 0 0 0 3.5 16h6.086a1.5 1.5 0 0 0 1.06-.44l4.915-4.914A1.5 1.5 0 0 0 16 9.586V3.5A1.5 1.5 0 0 0 14.5 2zM3 3.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 .5.5V9h-4.5A1.5 1.5 0 0 0 9 10.5V15H3.5a.5.5 0 0 1-.5-.5zm7 11.293V10.5a.5.5 0 0 1 .5-.5h4.293z"/>
                </svg>  
                تایتل: 
              </strong>   
              <span style="font-weight: bold; color: #58A0C8; font-size: 18px;">{{$product->title}}</span></h4>
               <p><strong style="color: #113F67; font-size:20px">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-info" viewBox="0 0 16 16">
                      <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
                    </svg>
                    اطلاعات: </strong><span style="color: #58A0C8; font-weight: bold; font-size: 18px;">{{$product->information}}<span></p>


               <p><strong style="color: #113F67; font-size: 20px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-currency-dollar" viewBox="0 0 16 16">
                  <path d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73z"/>
                </svg>
                قیمت: </strong><span style="color: #58A0C8; font-weight: bold; font-size: 18px;">{{$product->value}} تومان</span></p>


               <p><strong style="color: #113F67; font-size: 20px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-car-front" viewBox="0 0 16 16">
                  <path d="M4 9a1 1 0 1 1-2 0 1 1 0 0 1 2 0m10 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0M6 8a1 1 0 0 0 0 2h4a1 1 0 1 0 0-2zM4.862 4.276 3.906 6.19a.51.51 0 0 0 .497.731c.91-.073 2.35-.17 3.597-.17s2.688.097 3.597.17a.51.51 0 0 0 .497-.731l-.956-1.913A.5.5 0 0 0 10.691 4H5.309a.5.5 0 0 0-.447.276"/>
                  <path d="M2.52 3.515A2.5 2.5 0 0 1 4.82 2h6.362c1 0 1.904.596 2.298 1.515l.792 1.848c.075.175.21.319.38.404.5.25.855.715.965 1.262l.335 1.679q.05.242.049.49v.413c0 .814-.39 1.543-1 1.997V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.338c-1.292.048-2.745.088-4 .088s-2.708-.04-4-.088V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.892c-.61-.454-1-1.183-1-1.997v-.413a2.5 2.5 0 0 1 .049-.49l.335-1.68c.11-.546.465-1.012.964-1.261a.8.8 0 0 0 .381-.404l.792-1.848ZM4.82 3a1.5 1.5 0 0 0-1.379.91l-.792 1.847a1.8 1.8 0 0 1-.853.904.8.8 0 0 0-.43.564L1.03 8.904a1.5 1.5 0 0 0-.03.294v.413c0 .796.62 1.448 1.408 1.484 1.555.07 3.786.155 5.592.155s4.037-.084 5.592-.155A1.48 1.48 0 0 0 15 9.611v-.413q0-.148-.03-.294l-.335-1.68a.8.8 0 0 0-.43-.563 1.8 1.8 0 0 1-.853-.904l-.792-1.848A1.5 1.5 0 0 0 11.18 3z"/>
                </svg>
                وسیله نقلیه: </strong> <span style="color: #58A0C8; font-weight: bold; font-size: 18px;">{{$product->vehicle}}</span></p>
               @if((bool)!Auth::user()->admin)
                  <form action="/add-to-order/product/{{$product->id}}" method="POST">
                    @csrf
                    <button class="btn btn-sm btn-animated mr-2">اضافه کردن به سبد خرید</button>
                  </form>
               @endif
               {{-- <a href="">
                {{$product->brand->name}}
               </a> --}}
               
              </a>
        @endforeach
        {{$productions->links()}}
      </div>
    @endif
</x-layout>