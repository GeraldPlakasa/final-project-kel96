@extends('layouts.master')

@section('content')

<div class="m-3">
  <form action="/pertanyaan" method="post">
    @csrf
    <div class="form-group">
      <label for="title">Judul:</label>
      <input type="text" class="form-control" placeholder="Enter Title" name="title" id="title">
    </div>
    <div class="form-group">
      <label for="content">Pertanyaan:</label>
      <textarea type="text" class="form-control" name="content" placeholder="Tuliskan isi" id="content" rows="10"></textarea>
    </div>
    <div class="form-group">
      <label for="content">Tag untuk pertanyaan ini:</label>
      <input type="text" class="form-control" name="tag" placeholder="Tuliskan tag" id="tag" rows="10">
      <small id="tagHelpBlock" class="form-text text-muted">
        Pisahkan setiap tag dengan <kbd>, </kbd>
      </small>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

@endsection