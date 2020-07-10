@extends('layouts.master')

@section('content')

<div class="m-3">
  <form action="/questions" method="post">
    @csrf
    <div class="form-group">
      <label for="title">Judul:</label>
      <input type="text" class="form-control" placeholder="Enter Title" name="title" id="title">
    </div>
    <div class="form-group">
      <label for="content">Pertanyaan:</label>
      <input type="text-box" class="form-control" placeholder="Enter Content" name="content" id="content">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

@endsection