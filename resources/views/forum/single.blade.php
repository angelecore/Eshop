@extends('layouts.front')


@section('content')
    <div class="content-wrap well">
        <h4 class="list-group-item-heading">{{$forum->Forumo_temos}}</h4>
        <hr>
    <div class="thread-details">
        {{$forum->turinys}}
    </div>
    <br>
    @if(auth()->user()->id == $forum->Kurejo_id)
    <div class="actions">

        <a href="{{route('forum.edit',$forum->id)}}" class="btn btn-info btn-xs">Edit</a>

        {{--//delete form--}}
        <form action="{{route('forum.destroy',$forum->id)}}" onclick="return confirm('Are you sure?')" method="POST" class="inline-it">
            {{csrf_field()}}
            {{method_field('DELETE')}}
            <input class="btn btn-xs btn-danger" type="submit" value="Delete">
        </form>

    </div>
    @endif

    

@endsection