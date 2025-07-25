<x-layout>
    <div class="container py-md-5">
      <div class="row align-items-center">
        <div class="col-lg-3 py-3 py-md-5">
        </div>
        <div class="col-lg-5 pl-lg-5 pb-3 py-lg-5">
          <form action="/add-product" method="POST" id="registration-form">
            @csrf
            <div class="form-group">
                <label for="category-register" class="text-muted mb-1"><small>Category</small></label>
            </div>
            <div class="form-group">
              @if (count($categories) == 0)
                <p class="m-0 small alert alert-danger shadow-sm"> No category! Create a category.</p>
              @else
                @foreach ($categories as $category)
                  <input type="radio" id="cat" name="category" value="{{$category->name}}" checked>
                  <label for="cat"> {{ $category->name }}</label><br>
                @endforeach
              @endif
            </div>
            <div class="form-group">
              <label for="brand-register" class="text-muted mb-1"><small>Brand</small></label>
            </div>
            <div class="form-group">
              @if(count($brands) == 0)
                <p class="m-0 small alert alert-danger shadow-sm"> No brnads! Create a brand.</p>
              @else
                @foreach ($brands as $brand)
                  <input type="radio" id="cat" name="brand" value="{{$brand->name}}" checked>
                  <label for="cat">{{ $brand->name }}</label><br>
                @endforeach
              @endif


            </div>
            <div class="form-group">
              <label for="title-register" class="text-muted mb-1"><small>تایتل</small></label>
              <input value="{{old('title')  }}" name="title" id="title-register" class="form-control" type="text" placeholder="تایتل" autocomplete="off" /> 
              @error('title')
                <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
              @enderror
            </div>
            <div class="form-group">
              <label for="iformation-register" class="text-muted mb-1"><small>اطلاعات</small></label>
              <input value="{{old('information')  }}" name="information" id="information-register" class="form-control" type="text" placeholder="اطلاعات" autocomplete="off" />
              @error('information')
                <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
              @enderror
            </div>

            <div class="form-group">
              <label for="value-register" class="text-muted mb-1"><small>قیمت</small></label>
              <input value="{{old('value')  }}" name="value" id="value-register" class="form-control" type="number" min="0" placeholder="قیمت..." autocomplete="off" />
              @error('value')
                <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
              @enderror
            </div>

            <div class="form-group">
              <label for="vehicle-register" class="text-muted mb-1"><small>وسیله نقلیه</small></label>
              <input value="{{old('vehicle')  }}" name="vehicle" id="vehicle-register" class="form-control" type="text" placeholder="وسیله نقلیه" autocomplete="off" />
              @error('vehicle')
                <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
              @enderror
            </div>
            @if (count($brands)>0 and count($categories) > 0)
              <button type="submit" class="btn btn-sm btn-animated mr-2"> اضافه کردن محصولات</button>
            @else
              <button disabled type="submit" class="btn btn-sm btn-animated mr-2">اضافه کردن محصولات </button>
            @endif

          </form>
        </div>
        <div class="col-lg-3 py-3 py-md-5">
        </div>
      </div>
    </div>
  </x-layout>


