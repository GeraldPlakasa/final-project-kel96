@extends('layouts.master')

@section('content')
  <form action="/komentar/" method="POST" class="ml-4 mr-4">
  @csrf
  <div class="form-group">
    <label for="isi">Isi:</label>
    <textarea type="text" class="form-control" name="isi" placeholder="Tuliskan isi" id="isi" rows="10"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection