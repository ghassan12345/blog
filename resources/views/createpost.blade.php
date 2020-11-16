@extends('layouts.app')
@section('content')


@parent
<section class="flex">
{!! Form::open(['action'=>'PostController@store','methode' =>'POST']) !!}

<div class="form-group">
    {{ Form::label('','') }}
    {{ Form::text('title','',['placeholder'=>'post a title']) }}
</div>

<div class="form-group">
    {{ Form::label('','') }}
    {{ Form::textarea('text','',['placeholder'=>'post a text']) }}
</div>
{{ Form::submit('create post',array('style'=>'margin-bottom:10px')) }}

{!! Form::close() !!}
</section>
@endsection
