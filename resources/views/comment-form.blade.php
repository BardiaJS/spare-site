<x-layout>
    <div class="container py-md-5">
      <div class="row align-items-center">
        <div class="col-lg-3 py-3 py-md-5">
        </div>
        <div class="col-lg-5 pl-lg-5 pb-3 py-lg-5">
          <form action="/add-comment/product/{{$product->id}}" method="POST" id="registration-form">
            @csrf
            <div class="form-group">
              <label for="comment-register" class="text-muted mb-1"><small>صفحه نظرات</small></label>
              <input name="body" id="comment-register" class="form-control" type="text" placeholder="نظرات" autocomplete="off" />
              @error('body')
                <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
              @enderror
            </div>
            <button type="submit" class="btn btn-sm btn-animated mr-2">اضافه کردن نظرات</button>
          </form>
        </div>
        <div class="col-lg-3 py-3 py-md-5">
        </div>
      </div>
    </div>
  </x-layout>

