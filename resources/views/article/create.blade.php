@extends('layout')
@section('content')

  @if($errors->any())
  <div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>
            {{$error}}
        </li>
        @endforeach
    </ul>
  </div>
  @endif

<form action="/article" method="post">
  @csrf
<div class="form-group">
    <label for="exampleInputDate">Date</label>
    <input type="date" class="form-control" id="exampleInputDate" name="date">
  </div>
  <div class="form-group">
    <label for="exampleInputTitle">Title</label>
    <input type="text" class="form-control" id="exampleInputTitle" name="name">
  </div>
  <div class="form-group">
    <label for="exampleInputDesc">Description</label>
    <input type="desc" class="form-control" id="exampleInputDesc" name="desc">
  </div>
  <button type="submit" class="btn btn-primary">Save</button>
</form>
@endsection