@extends("layout")

@section('content')

<h1">أرسل لنا إستفسارك</h1>

<hr />
{!! Form::open(['action' => 'PagesController@sendMail', 'method' => 'POST']) !!}

<div class="form-group">
    {{ Form::label('إسمك : ') }}
    {{ Form::text('name', '', ['placeholder' => 'إسمك', 'class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('بريدك الالكتروني : ') }}
    {{ Form::text('email', '', ['placeholder' => 'البريد الإلكتروني', 'class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('الموضوع : ') }}
    {{ Form::text('subject', '', ['placeholder' => 'الموضوع', 'class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('المقال : ') }}
    {{ Form::textarea('body', '' , ['placeholder' => 'ضع رسالتك', 'class' => 'form-control']) }}   
</div> 
<div class="form-group d-flex flex-row-reverse">
    {{ Form::submit('إرسال', [ 'class' => 'btn btn-primary' ] ) }}
</div>
{!! Form::close() !!}


@endsection