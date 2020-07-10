@extends('layouts.master')

@section('content')

<div class="container">
  <a href="/questions" class="btn btn-danger m-3">Back</a>
  <h1>{{$question->title}}</h1>
  <p>{{$question->content}}</p>
</div>


@endsection
