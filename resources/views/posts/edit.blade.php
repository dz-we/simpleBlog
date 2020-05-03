@extends('layout')

@section('content')

<h1>تعديل التدوينة : {{$post->title}}</h1>
<hr>

{!! Form::open(['action' => ['PostsController@update',$post->id], 'method' => 'POST']) !!}
{{ Form::hidden('_method','PUT') }}

<div class="form-group">
    {{ Form::label('العنوان : ') }}
    {{ Form::text('title', $post->title, ['placeholder' => 'عنوان التدوينة', 'class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('التدوينة : ') }}
    {{ Form::textarea('body', $post->body , ['placeholder' => 'ضع تدوينتك', 'class' => 'form-control ckeditor']) }}   
</div> 
<div class="form-group d-flex flex-row-reverse">
    {{ Form::submit('حفظ التعديل', [ 'class' => 'btn btn-primary' ] ) }}
</div>
{!! Form::close() !!}

@endsection