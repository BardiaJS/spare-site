<x-layout>
    <div class="container container--narrow py-md-5">
        <h2 class="text-center mb-3"> آپلود آواتار</h2>
        <form action="/set-profile/user/{{Auth::user()->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <input type="file" name="avatar" required>
                @error('avatar')
                    <p class="alert small alert-danger shadow-sm">{{$message}}</p>
                @enderror
            </div>
            <button  class="btn btn-sm btn-animated mr-2"> ذخیره </button> 
        </form>
    </div>
</x-layout>