@extends("layout")

@section('content')

<h1>جديد التدوينات</h1>

@if($posts->count() > 0)
    @foreach($posts as $post)

        <div class="card" style="width: 70rem;">
            <div class="card-header">
                <strong>التدوينة</strong>
            </div>
            <div class="card-body">

              <a href="{{route('posts.index')}}/{{$post->slug}}" class="card-link">  <h4 class="card-title">{{$post->title}}</h4></a>
                <h6 class="card-subtitle mb-2 text-muted">{{$post->created_at}}</h6>
                <p class="card-text"> {!! str_limit($post->body, 30)!!} </p>
                <a href="#" class="card-link">{{$post->updated_at}}</a>
                <a href="#" class="card-link">{{$post->id}}</a>
            </div>
            
            <div class="card-footer">
                <span class="label label-info">
                    <i class="fas fa-calendar"></i> {{$post->created_at}}
                </span>
                <span class="label label-primary float-left">
                    <i class="fas fa-user"></i> {{$post->user->name}}
                </span>
            </div>
        </div>
    @endforeach
@else
    <div class="alert alert-danger" role="alert">
        <strong>لا يوجد تدوينات </strong>
    </div>
@endif

{{$posts->links()}}




<br />

@endsection