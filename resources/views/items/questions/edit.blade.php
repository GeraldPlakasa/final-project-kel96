@extends('layouts.master')

@section('content')

<div class="m-3">
  <form action="/pertanyaan/{{$question->id}}" method="post">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label for="title">Judul:</label>
      <input type="text" class="form-control" value="{{$question->title}}" placeholder="Enter Title" name="title" id="title">
    </div>
    <div class="form-group">
      <label for="content">Pertanyaan:</label>
      <textarea type="text" class="form-control" name="content" placeholder="Tuliskan isi" id="content" rows="10">{{$question->content}}</textarea>
    </div>
    <div class="form-group">
      <label for="title">Tag:</label>
      <input type="text" class="form-control" value="{{$question->tag}}" placeholder="Enter Tag" name="tag" id="tag">
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
  </form>
</div>

@endsection