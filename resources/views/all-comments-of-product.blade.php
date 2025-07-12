<x-layout>
    @if(count($comments) == 0)
        <p class="text-center">no comments</p>
    @else
        @foreach ($comments as $comment)
        <div class="text-center">
            <img style="width: 50px; height: 50px;" src="{{$comment->customer->user->avatar_url}}">
            {{$comment->customer->user->first_name  }} {{$comment->customer->user->last_name}} says:
            <p> {{$comment->body}}
        </div>
        @endforeach
    @endif
</x-layout>