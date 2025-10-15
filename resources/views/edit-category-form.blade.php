<x-layout>
    <div class="container py-md-5">
      <div class="row align-items-center">
        <div class="col-lg-3 py-3 py-md-5">
        </div>
        <div class="col-lg-5 pl-lg-5 pb-3 py-lg-5">
          <form action="/edit-category/category/{{$category->id  }}" method="POST" id="registration-form">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="category-code-register" class="text-muted mb-1"><small>اسم دسته بندی</small></label>
              <input name="name" id="category-code-register" class="form-control" type="text" placeholder="اسم دسته بندی" autocomplete="off" value="{{$category->name  }}" />
              @error('name')
                <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
              @enderror
            </div>
          <button type="submit" class="btn btn-sm btn-animated mr-2"> ثبت تغییرات</button>
          </form>
        </div>
        <div class="col-lg-3 py-3 py-md-5">
        </div>
      </div>
    </div>
  </x-layout>


