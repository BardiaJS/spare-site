<x-layout>
    <div class="container py-md-5 container--narrow">
      <div class="text-center">
        <h2>Hello <strong>{{auth()->user()->first_name}} {{auth()->user()->last_name  }}</strong></h2>
        <h3>
          @if(Auth::user()->role == "admin" && Auth::user()->admin)
            به صفحه خانه خوش آمدید<strong style="color:brown;"> ADMIN: {{Auth::user()->first_name}}</strong>
          @else
            به صفحه خانه خوش آمدید
          @endif
        </h3>

        @if(Auth::user()->role == "admin" && Auth::user()->admin)
          <a class="btn btn-sm btn-animated mr-2" style="color: white; background-color: #34699A;" href="/ban-list">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-checklist" viewBox="0 0 16 16">
            <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2z"/>
            <path d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0M7 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0"/>
          </svg>
            لیست بن</a>

          </a>
          <a class="btn btn-sm btn-animated mr-2" style="color: white; background-color: #34699A;" href="/add-category">
           <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
          </svg>
            اضافه کردن دسته بندی</a>
          <a class="btn btn-sm btn-animated mr-2"style="color: white; background-color: #34699A;" href="/add-brand">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
              <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
            </svg>
            اضافه کردن برند</a>
          <a class="btn btn-sm btn-animated mr-2" style="color: white; background-color: #34699A;" href="/add-product">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
              <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
            </svg>
            اضافه کردن محصول</a>
        @endif
        @if(Auth::user()->customer)
          <p class="lead text-muted">میتوانید لیست محصولات را ببینید از طریق <a href="/all-productions">این لینک</a></p>
        @else
          <p class="lead text-muted">برای دیدن محصوات ابتدا باید پروفایل خود را کامل کنید از طریق <a href="/complete-profile-user/{{Auth::user()->id}}">این لینک</a></p>
        @endif
      </div>
    </div>
</x-layout>
 
