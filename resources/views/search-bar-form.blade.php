<x-layout>
    <div style="display: flex; text-align:center; justify-content: center; align-items: center;">
        <form action="/search-user-input/result" method="GET" style="display: flex; width: 100%; max-width: 500px;">
            <input type="text" 
                id="searchInput"
                name="term" 
                class="form-control" 
                placeholder="جست و جو..."
                value="{{ request('term') }}"
                style="margin-right: 10px">
            <button type="submit" class="btn btn-sm btn-animated mr-2">
                <i class="fas fa-search"></i>
            </button>
        </form>
    </div>
</x-layout>