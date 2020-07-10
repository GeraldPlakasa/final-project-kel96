@extends('layouts.master')

@section('content')

<div class="m-3">
  <form action="/questions/{{$question->id}}" method="post">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label for="title">Judul:</label>
      <input type="text" class="form-control" value="{{$question->title}}" placeholder="Enter Title" name="title" id="title">
    </div>
    <div class="form-group">
      <label for="content">Pertanyaan:</label>
      <input type="text-box" class="form-control" value="{{$question->content}}" placeholder="Enter Content" name="content" id="content">
    </div>
    <button type="submit" class="btn btn-primary">Edit</button>
  </form>
</div>

@endsection