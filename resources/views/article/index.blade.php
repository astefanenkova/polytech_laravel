@extends('layout')
@section('content')
<table class="table">
  <thead>
    <tr>
      <th scope="col">Date</th>
      <th scope="col">Name</th>
      <th scope="col">Desc</th>
    </tr>
  </thead>
  <tbody>
    @foreach($articles as $article)
    <tr>
      <input type="hidden" name ="article_id" value="{{$article->id}}">
      <th scope="row">{{$article->date}}</th>
      <td><a href="/article/{{$article->id}}">{{$article->name}}</a></td>
      <td>{{$article->desc}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
{{$articles->links()}}
@endsection