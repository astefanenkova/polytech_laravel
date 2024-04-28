@extends('layout')
@section('content')
<div class="card" style="width: 38rem;">
  <div class="card-body">
    <h5 class="card-title">{{$article->name}}</h5>
    <p class="card-text">{{$article->desc}}</p>
    <div class="btn-toolbar">
    <a href="/article/{{$article->id}}/edit" class="btn btn-primary mr-2">Edit article</a>
    <form action="/article/{{$article->id}}" method="post">
        @method("DELETE")
        @csrf
        <button type="submit"class="btn btn-danger">Delete article</button>
    </form>
    </div>
  </div>
</div>

<h4>Comments</h4>

@if(session('res'))
<div class="alert alert-primary" role="alert"><strong>Ваш комментарий отправлен на модерацию</strong> <a href="#" class="alert-link"></a></div>
@endif

<form action="/comment" method="post">
  @csrf
  <input type="hidden" name ="article_id" value="{{$article->id}}">
  <div class="form-group">
    <label for="exampleInputTitle">Title</label>
    <input type="text" class="form-control" id="exampleInputTitle" name="title">
  </div>
  <div class="form-group">
    <label for="exampleInputText">Description</label>
    <input type="text" class="form-control" id="exampleInputText" name="text">
  </div>
  <button type="submit" class="btn btn-primary">Create comment</button>
</form>

@foreach($comments as $comment)
    <div class="card mt-2" style="width: 67rem;">
    <div class="card-body">
        <h5 class="card-title">{{$comment->title}}</h5>
        <p class="card-text">{{$comment->text}}</p>
        @can('comment', $comment)
        <div class="btn-toolbar">
            <a href="/comment/{{$comment->id}}/edit" class="btn btn-primary mr-3">Edit comment</a>
            <form action="/comment/{{$comment->id}}" method="post">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger">Delete comment</button>
            </form>
        </div>
        @endcan
        
    </div>
    </div>
    @endforeach
    </div>
    </div>
    
@endsection