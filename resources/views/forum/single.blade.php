@extends('layouts.front')


@section('content')
    <div class="content-wrap well">
        <h4 class="list-group-item-heading">{{$forum->Forumo_temos}}</h4>
        <hr>
    <div class="thread-details">
        {!! \Michelf\Markdown::defaultTransform($forum->turinys) !!}
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

    {{--comment--}}
    <footer>
    <div class="comment">
        @foreach ($comments as $comment)
            
            <h4>{{$comment->Komentaras}}</h4>
            <a>{{$comment->user->name}}</a>
            @if(auth()->user()->id == $comment->Kurejo_id)
            <div class="actions">

                {{-- <a href="{{route('forum.edit',$forum->id)}}" class="btn btn-info btn-xs">Edit</a> --}}
    <a class="btn btn-primary btn-xs" data-toggle="modal" href="#{{$comment->id}}">edit</a>
    <div class="modal fade" id="{{$comment->id}}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;
                    </button>
                    <h4 class="modal-title">Modal title</h4>
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
                <form action="{{route('comment.destroy',$comment->id)}}" onclick="return confirm('Are you sure?')" method="POST" class="inline-it">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <input class="btn btn-xs btn-danger" type="submit" value="Delete">
                </form>
        
            </div>
            @endif
        @endforeach
    </div>
    <div class="comment-form">
        <form action={{route('threadcomment.store',$forum->id)}} method="post" role="form">
            {{csrf_field()}}
            <legend>Create Comment</legend>

            <div class="form-group">
                <input type="text" class="form-control" name="body" id="" placeholder="Input...">
            </div>


            <button type="submit" class="btn btn-primary">Comment</button>
        </form>
    </div>
</footer>

@endsection