@extends('layout')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    لوحة التحكم
                    <div class="btn-group float-left">
                        <a class="btn btn-success btn-sm" href="posts/create">
                            <i class="fas fa-plus"></i> إضافة تدوينة
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h3>تدويناتك </h3>
                    
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>عنوان التدوينة</th>
                                <th>التاريخ</th>
                                <th>تعديل</th>
                                <th>حذف</th>                            
                            </tr>  
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                            <tr>
                                <td>
                                    {{$post->title}}
                                </td>
                                <td>
                                    {{$post->created_at}}
                                </td>
                                <td>
                                    <a href="/posts/{{$post->id}}/edit" class="btn btn-info btn-sm">
                                        <i class="fas fa-edit"></i> تعديل التدوينة
                                    </a>
                                </td>
                                <td>
                                     {!! Form::open(['action'=> ['PostsController@destroy', $post->id]], ['method'=>'POST']) !!}
                                        {{ Form::hidden('_method','DELETE') }}
                                        <button class="btn btn-danger btn-sm" type="submit" >
                                             <i class="fas fa-remove"></i> حذف التدوينة
                                        </button>

                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            
                            @endforeach
                        </tbody>

                        
                        
                    </table>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
