@extends('layouts.app')

@section('content')
<section>
    @parent
    <div class="post-container">
      <h2>{{ $current->title }}</h2>
      <div>{{ $current->text }}</div>
      <div>
          <p>{{$current->created_at->diffforHumans() }}</p>
          {!! Form::open(["action"=> ["PostController@destroy",$current->id], "method"=>"POST","class"=>"delete"]) !!}
          @if(Auth::user()->id==$current->user_id)
          {{ Form::hidden("_method","DELETE") }}
          {{ Form::submit('Delete Post',array('style'=>'margin-bottom: 10px')) }}
          @endif
          {!! Form::close() !!}
          {!! Form::open(["action"=> ["PostController@edit",$current->id], "method"=>"POST","class"=>"update"]) !!}
          @if(Auth::user()->id==$current->user_id)
          {{ Form::hidden("_method","UPDATE") }}
          {{ Form::submit('update ',array('style'=>'margin-bottom: 10px')) }}
          @endif
          {!! Form::close() !!}
      </div>
      <div>

          @foreach ($currentCom as $com)
            <h2>{{ $com->comment }}</h2>
            <p>{{$com->created_at->diffforHumans() }}</p>
            <div>
                {!! Form::open(["action"=> ["CommentController@destroy",$com->id], "method"=>"POST","class"=>"delete"]) !!}
                @if(Auth::user()->id==$com->user_id)
                {{ Form::hidden("_method","DELETE") }}
                {{ Form::submit('Delete ',array('style'=>'margin-bottom: 10px')) }}
                @endif
                {!! Form::close() !!}
            </div>
          @endforeach

      </div>
    </div>
</section>
@endsection
