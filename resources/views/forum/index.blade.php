@extends('layouts.front')

@section('content')
    
<h2> Threads </h2>
<div class="row">
      <div class="row.content-heading">
        <div class="col-md-9">
          <div class="row">
            <div class="col-md-9" ><a class="btn btn-primary" href="/forum/create">Create thread</a></div>
          </div>
        </div>
      </div>
    </div>
<div class="list-group">
    @forelse($forumas as $forum)

        {{--<a href="{{route('thread.show',$thread->id)}}" class="list-group-item">--}}
            {{--<h4 class="list-group-item-heading">{{$thread->subject}}</h4>--}}
            {{--<p class="list-group-item-text">{{str_limit($thread->thread,100) }}--}}
                {{--<br>--}}
                {{--Posted by <a href="{{route('user_profile',$thread->user->name)}}">{{$thread->user->name}}</a>--}}
            {{--</p>--}}
        {{--</a>--}}
        
        <a href={{route('forum.show',$forum->id)}} class="list-group-item">
            <h4 class="list-group-item-heading">{{$forum->Forumo_temos}}</h4>
            @if(strlen($forum->turinys) > 100)
            <p class="list-group-item-text">{{substr($forum->turinys,0,100) }}...</p>
            @else
                <p class="list-group-item-text">{{$forum->turinys }}</p>
        @endif
    </a>

    @empty
        <h5>No threads</h5>

    @endforelse
</div>
@endsection