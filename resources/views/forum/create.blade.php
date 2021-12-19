@extends('layouts.front')



@section('content')


    <div class="row">
        <div class=" well">
            <form class="form-vertical" action={{route('forum.store')}} method="post" role="form"
                  id="create-thread-form">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="subject">Name of thread</label>
                    <input type="text" class="form-control" name="Forumo_temos" id="" placeholder="Input..."
                           value="{{old('Forumo_temos')}}">
                </div>

                

                <div class="form-group">
                    <label for="thread">Content</label>
                    <textarea class="form-control" name="turinys" id="" placeholder="Input..."
                    > {{old('thread')}}</textarea>
                </div>

                {{--  <div class="form-group">
                   {!! app('captcha')->display() !!}
                </div>  --}}

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.4/js/standalone/selectize.min.js"></script>

    <script>
        $(function () {
            $('#tag').selectize();
        })
    </script>
@endsection