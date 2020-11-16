@extends('layouts.edit')
@section('content')


@parent
<section class="flex">
{!! Form::open(['action'=>'{{ PostController@edit }}','methode' =>'PUT']) !!}

<div class="form-group">
    {{ Form::label('','') }}
    {{ Form::text('title','',['placeholder'=>'post a title']) }}
    {{ $post->title }}
</div>

<div class="form-group">
    {{ Form::label('','') }}
    {{ Form::textarea('text','',['placeholder'=>'post a text']) }}
    {{ $post->text }}
</div>
{{ Form::submit('create post',array('style'=>'margin-bottom:10px')) }}

{!! Form::close() !!}
</section>
@endsection
