@extends('layouts.master')

@section('content')
  <form action="/komentar/{{$comment->id}}" method="POST" class="ml-4 mr-4">
  @csrf
  @method('PUT')
  <div class="form-group">
    <label for="isi">Isi:</label>
    <textarea type="text" class="form-control" name="isi" id="isi" rows="10">{{$comment->isi}}</textarea>
  </div>
  <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection