@extends('layouts.front')

@section('content')
    
<h2> Threads </h2>

<div class="list-group">
    @forelse($forumas as $forum)

        {{--<a href="{{route('thread.show',$thread->id)}}" class="list-group-item">--}}
            {{--<h4 class="list-group-item-heading">{{$thread->subject}}</h4>--}}
            {{--<p class="list-group-item-text">{{str_limit($thread->thread,100) }}--}}
                {{--<br>--}}
                {{--Posted by <a href="{{route('user_profile',$thread->user->name)}}">{{$thread->user->name}}</a>--}}
            {{--</p>--}}
        {{--</a>--}}
        @if(strlen($forum->turinys) > 100)
        <a href="#" class="list-group-item">
            <h4 class="list-group-item-heading">{{$forum->Forumo_temos}}</h4>
            <p class="list-group-item-text">{{substr($forum->turinys,0,100) }}...</p>
            
        @else
        <a href="#" class="list-group-item">
            <h4 class="list-group-item-heading">{{$forum->Forumo_temos}}</h4>
            <p class="list-group-item-text">{{$forum->turinys }}</p>
        </a>
        @endif

    @empty
        <h5>No threads</h5>

    @endforelse
</div>
@endsection