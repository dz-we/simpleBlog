@extends('layout')

@section('content')

<h1>إضافة تدويننة جديدة</h1>
<hr>

{!! Form::open(['action' => 'PostsController@store', 'method' => 'POST']) !!}

<div class="form-group">
    {{ Form::label('العنوان : ') }}
    {{ Form::text('title', '', ['placeholder' => 'عنوان التدوين', 'class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('المقال : ') }}
    {{ Form::textarea('body', '' , ['placeholder' => 'ضع تدوينتك', 'class' => 'form-control ckeditor']) }}   
</div> 
<div class="form-group d-flex flex-row-reverse">
    {{ Form::submit('حفظ التدوينة', [ 'class' => 'btn btn-primary' ] ) }}
</div>
{!! Form::close() !!}


@endsection