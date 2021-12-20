@extends('layouts.front')
<meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Webdev forum</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://bootswatch.com/5/lumen/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.4/css/selectize.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        .reply{
            font-size: 15px;
            padding: 5px;
            right: 10px;
            background-color: #DDD9D9;
        }
        .pad{
            padding-left: 20px;
        }
    </style>
    

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
    
    <div class="comment">
        @foreach ($forum ->comments as $comment)
        <footer>
            <h6>{{$comment->Komentaras}}</h6>
            <a> by {{$comment->user->name}}</a>


            @if(auth()->user() != null)
            @if(auth()->user()->id == $comment->Kurejo_id)
            <div class="actions">

                {{-- <a href="{{route('forum.edit',$forum->id)}}" class="btn btn-info btn-xs">Edit</a> --}}
                
                <table>
                    <tr>
                        {{-- <td valign="top">
                            <button onclick="likeIt('{{$comment->id}}',this)"><span class="fa fa-thumbs-up" style="font-size:30px"></span></button>
                            
                        </td> --}}
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
        </footer>


         {{-- replyform --}}
         <div class="reply" style="margin-left: 40px">
         @if(auth()->user() != null)
         
         {{-- <button class="btn btn-xs btn-default" style="background-color: white" onclick="toggleReply('{{$comment->id}}')">Reply</button> --}}
         <div class="reply-form" >
             <form action={{route('replycomment.store',$comment->id)}} method="post" role="form">
                 {{csrf_field()}}
                 <legend>Create Reply</legend>
     
                 <div class="form-group">
                     <input type="text" class="form-control" name="Komentaras" id="" placeholder="Reply...">
                 </div>
                 <button type="submit" class="btn btn-primary">Reply</button>
             </form>
         </div>
         <br>
         @endif
        {{-- reply to comment --}}
        @foreach ($comment ->comments as $reply)
        
            <p class="pad">{{$reply-> Komentaras}}</p>
            <a class="pad"> by {{$reply->user->name}}</a>
            @if(auth()->user() != null)
            @if(auth()->user()->id == $reply->Kurejo_id)
            <div class="actions">

                {{-- <a href="{{route('forum.edit',$forum->id)}}" class="btn btn-info btn-xs">Edit</a> --}}
                
                <table>
                    <tr>
                        {{-- <td valign="top">
                            <button onclick="likeIt('{{$reply->id}}',this)"><span class="fa fa-thumbs-up" style="font-size:30px"></span></button>
                            
                        </td> --}}
                        <td valign="top">
    <a class="btn btn-primary btn-xs" data-toggle="modal" href="#{{$reply->id}}">Edit</a>
    <div class="modal fade" id="{{$reply->id}}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;
                    </button>
                    <h4 class="modal-title">{{$forum->Forumo_temos}}</h4>
                </div>
                <div class="modal-body">
                    <div class="comment-form">

                        <form action="{{route('comment.update',$reply->id)}}" method="post" role="form">
                            {{csrf_field()}}
                            {{method_field('put')}}
                            <legend>Edit comment</legend>

                            <div class="form-group">
                                <input type="text" class="form-control" name="Komentaras" id=""
                                       placeholder="Input..." value="{{$reply->Komentaras}}">
                            </div>


                            <button type="submit" class="btn btn-primary">Reply</button>
                        </form>

                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
                {{--//delete form--}}
                
            </td>
            <td valign="top">
                <form action="{{route('comment.destroy',$reply->id)}}" onclick="return confirm('Are you sure?')" method="POST" class="inline-it">
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
    <br>
    <br>


@endsection
    
<script type="text/javascript">

        function toggleReply(commentId){
            $('.reply-form-'+commentId).toggleClass('hidden');
        }
        
        function likeIt(commentId,elem){
            
            var csrfToken='{{csrf_token()}}';
            var likesCount=parseInt($('#'+commentId+"-count").text());
            $.post('{{route('toggleLike')}}', {commentId: commentId,_token:csrfToken}, function (data) {
                console.log(data);
               if(data.message==='liked'){
                   $(elem).addClass('liked');
                   $('#'+commentId+"-count").text(likesCount+1);
//                   $(elem).css({color:'red'});
               }else{
//                   $(elem).css({color:'black'});
                   $('#'+commentId+"-count").text(likesCount-1);
                   $(elem).removeClass('liked');
               }
            });
        }
</script>