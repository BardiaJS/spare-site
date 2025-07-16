<x-layout>
    @if(count($comments) == 0)
        <p class="text-center" style="color: #113F67">no comments</p>
    @else
        @foreach ($comments as $comment)
        <div class="text-center">
            <img style="width: 50px; height: 50px;" src="{{$comment->customer->user->avatar_url}}">
            <br>
            <span style="color: #34699A; font-weight: bold; font-size: 18px;">{{$comment->customer->user->first_name}} {{$comment->customer->user->last_name}} </span> says:
            <p style="font-size: 20px; color: #113F67; font-weight: bold; font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;"> "{{$comment->body}}"</p>
            <div style="display: flex; text-align: center; justify-content: center; align-items: center; padding: 10px;">


                @if((Auth::user()->customer))
                    @if(($comment->customer_id == Auth::user()->customer->id))
                        <form style="margin-right: 10px" action="/edit-comment/form/{{$comment->id}}" method="GET">
                            <button class="btn" style="background-color:#34699A; color: #FDF5AA;" title="edit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
                                </svg>
                            </button>
                        </form>

                    @endif
                    @if(($comment->customer_id == Auth::user()->customer->id) or (Auth::user()->admin))
                        <form action="/delete-comment/comment/{{$comment->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                                <button class="btn" style="background-color:#34699A; color: #FDF5AA;" title="delete">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                    </svg>   
                                </button>

                        </form> 
                    @endif
                @endif
                @if(Auth::user()->admin)
                
                @php
                    $isBanned = Illuminate\Support\Facades\DB::table('bans')
                        ->where('user_id', $comment->customer->user->id)
                        ->exists();
                @endphp

                @if(!$isBanned)
                    <form style="margin-left: 10px" action="/ban-user/user/{{$comment->customer->user->id}}" method="POST">
                        @csrf
                        <button class="btn" style="background-color: #34699A; color: #FDF5AA;" title="ban">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-ban" viewBox="0 0 16 16">
                            <path d="M15 8a6.97 6.97 0 0 0-1.71-4.584l-9.874 9.875A7 7 0 0 0 15 8M2.71 12.584l9.874-9.875a7 7 0 0 0-9.874 9.874ZM16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0"/>
                            </svg>  
                        </button>
                    </form>
                @else
                    <form style="margin-left: 10px" action="/unban-user/user/{{$comment->customer->user->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn" style="background-color: #34699A; color: #FDF5AA;" title="unban">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z"/>
                                <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466"/>
                            </svg>
                        </button>
                    </form>
                @endif
                    <form style="margin-left: 10px" action="/delete-comment/comment/{{$comment->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                            <button class="btn" style="background-color:#34699A; color: #FDF5AA;" title="delete">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                </svg>   
                            </button>
                    </form> 

            @endif
                   
        </div>
        @endforeach
        {{$comments->links()}}
    @endif
    </div>
</x-layout>