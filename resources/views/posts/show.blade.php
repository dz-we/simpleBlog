@extends("layout")

@section('content')


    <h1>{{$post->title}}</h1>
    @if(!Auth::guest() && Auth::user()->id== $post->user_id)
    <div class="clearfix">
        <a href="/posts/{{$post->id}}/edit" class="btn btn-primary">
            <i class="fas fa-edit"></i> تعديل التدوينة
        </a>
        <div class="float-left">
            {!! Form::open(['action'=> ['PostsController@destroy', $post->id]], ['method'=>'POST']) !!}
                {{ Form::hidden('_method','DELETE') }}
                <button class="btn btn-danger" type="submit" >
                     <i class="fas fa-remove"></i> حذف التدوينة
                </button>
                
            {!! Form::close() !!}
        </div>        
    </div>
    @endif
    
    <hr>
    <div>
        {!!$post->body!!} 
    </div>
    
    <hr>
    <h4>التعليقات {{$post->comments->count()}}</h4>
    
    <!-- Comments List -->
    <ul class="comments">
         @foreach ($post->comments as $cmt)
        <li class="comment">
            <div class="clearfix">
                <h4 class="float-right">
                    {{ $cmt->user->name}}
                </h4>
                <p class="float-left">{{ $cmt->created_at->format('d M Y') }}</p>
            </div>
            <p>{{ $cmt->body }}</p>
        </li>
         @endforeach
    </ul>
    <!-- /Comments List-->
    <div class="card" style="width: 70rem;">
            <div class="card-header">
                <strong>أضف تعليق</strong>
            </div>
            <div class="card-body">

                @guest
                <div class="alert alert-info">
                    الرجاء منك التسجيل حتى تستطيع التعليق 
                </div>
                @else
                <form action="{{route('comments.store', $post->slug)}}" method="POST" >
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="comment">
                            التعليق
                        </label>
                        <textarea name="comment" class="form-control" id="comment" rows="4">
                                                        
                        </textarea>
 
                    </div>   
                    <div class="form-group text-left">
                        <button class="btn btn-success">أضف تعليق</button>
                    </div>   
                </form>
                @endguest
            </div>
            
        </div>

@endsection