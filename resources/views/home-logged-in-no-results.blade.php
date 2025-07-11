<x-layout>
    <div class="container py-md-5 container--narrow">
      <div class="text-center">
        <h2>Hello <strong>{{auth()->user()->first_name}} {{auth()->user()->last_name  }}</strong></h2>
        <h3>
          @if(Auth::user()->role == "admin" && Auth::user()->admin)
            Welcome to your homepage <strong style="color:brown;"> ADMIN: {{Auth::user()->first_name}}</strong>
          @else
            Welcome to your homepage
          @endif
        </h3>

        @if(Auth::user()->role == "admin" && Auth::user()->admin)
          <a class="btn btn-sm btn-success mr-2" style="color: white; background-color: rgba(14, 14, 14, 0.301);" href="/add-category">
           <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
          </svg>
            add category</a>
          <a class="btn btn-sm btn-success mr-2" style="color: white; background-color: rgba(0, 0, 0, 0.301);" href="/add-brand">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
              <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
            </svg>
            add brand</a>
          <a class="btn btn-sm btn-success mr-2" style="color: white; background-color: rgba(0, 0, 0, 0.301);" href="/add-product">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
              <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
            </svg>
            add product</a>
        @else
          <p class="lead text-muted">You can see the list of spare parts via <a href="/all-productions">this link</a></p>
        @endif
      </div>
    </div>
</x-layout>
 
