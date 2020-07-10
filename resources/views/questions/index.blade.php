@extends('layouts.master')

@section('content')

<div class="container">
  <a href="/questions/create" class="btn btn-info m-3">Buat Baru</a>
  <table class="table table-hover">
    <thead>
      <tr>
        <th class="text-center">Pertanyaan</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
  @foreach($questions as $key => $question)
      <tr >
        <td>
        	<h4> {{$question->title}} </h4>
        	<p> {{$question->content}} </p>
        </td>
        <td>
          <a href="/questions/{{$question->id}}" class="btn btn-info">Lihat</a>
          <a href="/questions/{{$question->id}}/edit" class="btn btn-default"><i class="fas fa-edit"></i></a>
          <form action="/questions/{{$question->id}}" method="post" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>    
          </form>
        </td>
      </tr>
  @endforeach
    </tbody>
  </table>
</div>


@endsection
