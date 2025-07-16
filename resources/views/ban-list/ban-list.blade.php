<x-layout>
    @if(count($bans)==0)
        <div class="text-center">
            <p><span style="color: #113F67; font-weight: bold; font-size: 25px;">No Bans</span></p>
        </div>
    @else
        @foreach ($bans as $ban)
           <ul class="list-group list-group-flush text-center"> 
             <span style="font-size: 25px; color:#113F67; font-weight: bold;"> Ban List </span>
                <li class="list-group-item text-center" >

                    User: <span style="color: #34699A; font-weight: bold;">{{$ban->email}} </span>
                    <form action="/unban-user/user/{{$ban->user_id}}" method="POST" style="margin-top: 10px">
                        @csrf
                        @method('DELETE')
                        <button class="btn" style="background-color: #58A0C8; color: #FDF5AA;" title="unban">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z"/>
                                <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466"/>
                            </svg>
                        </button>
                    </form>                    

                </li>
            </ul>         
        @endforeach
    
    {{$bans->links()}}
    @endif

</x-layout>