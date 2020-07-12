@extends('layouts.master')

@section('content')

<div class="container">

  <a href="/pertanyaan/create" class="btn btn-primary my-3">Tanyakan sesuatu</a>
  
  @foreach($questions as $key => $question)
    <div class="card w-100">
      <div class="card-body">
        <h5 class="card-title font-weight-bold">{{ $question->title }}</h5>
        <p class="card-text col-10 text-truncate">{{ $question->content }}</p>
        <footer class="blockquote-footer">{{$question->author->name}}</footer><br>
        <a href="/pertanyaan/{{$question->id}}" class="btn btn-sm btn-info">Lihat selengkapnya</a>

        {{-- cek kalau hanya pembuat komentar yang bisa edit dan delete --}}
        @if($question->user_id == $active_user)
          <a href="/pertanyaan/{{$question->id}}/edit" class="btn btn-sm btn-default"><i class="fas fa-edit"></i> Edit</a>
          <form action="/pertanyaan/{{$question->id}}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Hapus Pertanyaan</button>
          </form>
        @endif
      </div>
    </div>
  @endforeach
</div>


@endsection
