<x-layout>
    <div class="container container--narrow py-md-5">
        <h2 class="text-center mb-3"> آپلود عکس جدید برای محصول</h2>
        <form action="/set-image-for-product-frorm/{{$product->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <input type="file" name="image_product" required>
                @error('image_product')
                    <p class="alert small alert-danger shadow-sm">{{$message}}</p>
                @enderror
            </div>
            <button  class="btn btn-sm btn-animated mr-2">ذخیره </button> 
        </form>
    </div>
</x-layout>