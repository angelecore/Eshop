@extends('layouts.front')
<meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Webdev forum</title>
    <link rel="stylesheet" href="https://bootswatch.com/5/lumen/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.4/css/selectize.min.css">

@section('content')
    <div class="content-wrap well">
        <h1 class="list-group-item-heading">{{$forum->Forumo_temos}}</h1>
        <hr>
    <div class="thread-details">
        <a class="list-group-item-heading">{!! \Michelf\Markdown::defaultTransform($forum->turinys) !!}</a>
    </div>
    <br>
    @if(auth()->user() != null)
    @if(auth()->user()->id == $forum->Kurejo_id)
    <div class="actions">
        <table>
            <tr>
                <td valign="top">
        <a href="{{route('forum.edit',$forum->id)}}" class="btn btn-info btn-xs">Edit</a>
        {{--//delete form--}}
    </td>
    <td valign="top">
        <form class="" action="{{route('forum.destroy',$forum->id)}}" onclick="return confirm('Are you sure?')" method="POST" >
            {{csrf_field()}}
            {{method_field('DELETE')}}
            <input class="btn btn-xs btn-danger" type="submit" value="Delete">
        </form>
    </td>
</tr>
</table>

    </div>
    @endif
    @endif

    {{--comment--}}
    <footer>
    <div class="comment">
        @foreach ($comments as $comment)
            
            <h6>{{$comment->Komentaras}}</h6>
            <a>{{$comment->user->name}}</a>
            @if(auth()->user() != null)
            @if(auth()->user()->id == $comment->Kurejo_id)
            <div class="actions">

                {{-- <a href="{{route('forum.edit',$forum->id)}}" class="btn btn-info btn-xs">Edit</a> --}}
                <table>
                    <tr>
                        <td valign="top">
    <a class="btn btn-primary btn-xs" data-toggle="modal" href="#{{$comment->id}}">Edit</a>
    <div class="modal fade" id="{{$comment->id}}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;
                    </button>
                    <h4 class="modal-title">{{$forum->Forumo_temos}}</h4>
                </div>
                <div class="modal-body">
                    <div class="comment-form">

                        <form action="{{route('comment.update',$comment->id)}}" method="post" role="form">
                            {{csrf_field()}}
                            {{method_field('put')}}
                            <legend>Edit comment</legend>

                            <div class="form-group">
                                <input type="text" class="form-control" name="Komentaras" id=""
                                       placeholder="Input..." value="{{$comment->Komentaras}}">
                            </div>


                            <button type="submit" class="btn btn-primary">Comment</button>
                        </form>

                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
                {{--//delete form--}}
                
            </td>
            <td valign="top">
                <form action="{{route('comment.destroy',$comment->id)}}" onclick="return confirm('Are you sure?')" method="POST" class="inline-it">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <input class="btn btn-xs btn-danger" type="submit" value="Delete">
                </form>
            </td>
        </tr>
    </table>
            </div>
            @endif
            @endif
        @endforeach
    </div>
    @if(auth()->user() != null)
    <div class="comment-form">
        <form action={{route('threadcomment.store',$forum->id)}} method="post" role="form">
            {{csrf_field()}}
            <legend>Create Comment</legend>

            <div class="form-group">
                <input type="text" class="form-control" name="Komentaras" id="" placeholder="Input...">
            </div>
            <button type="submit" class="btn btn-primary">Comment</button>
        </form>
    </div>
    @endif
</footer>

@endsection