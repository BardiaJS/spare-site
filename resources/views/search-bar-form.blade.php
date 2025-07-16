<x-layout>
    <div style="display: flex; text-align:center; justify-content: center; align-items: center;">
    <form action="/search-user-input/result" method="GET">
            <button class="btn btn-primary   text-center" style="color: black; margin-left: 5px;">
                <i class="fas fa-search " style="top: 10px; left: 10px; cursor: pointer; z-index: 10;"onmouseover="document.getElementById('searchInput').focus()"></i>
            </button>
        </form>
        <input type="text" 
            id="searchInput"
            name="search"
            class="form-control" 
            placeholder="Search products..."
            value="{{ request('search') }}"
            style="margin-left: 10px">
    </div>
</x-layout>