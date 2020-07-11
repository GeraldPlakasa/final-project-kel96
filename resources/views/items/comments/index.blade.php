@extends('layouts.master')

@section('content')
  
  <a href="/komentar/create" class="btn btn-primary">Tambah komentar</a>
  @foreach($comments as $key => $comment)
    <div class="card w-100">
      <div class="card-body">
        <blockquote class="blockquote mb-0">
          <p class="card-text">{{ $comment->isi }}</p>
          <footer class="blockquote-footer">{{$comment->author->name}}</footer>
        </blockquote>

        {{-- cek kalau hanya pembuat komentar yang bisa edit dan delete --}}
        @if($comment->pemberi_komentar_id == $active_user)
          <a href="/komentar/{{$comment->id}}/edit" class="btn btn-secondary btn-sm">Edit</a>
            <form action="/komentar/{{$comment->id}}" method="POST" style="display: inline">
              @csrf
              @method('DELETE')
              <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
            </form>
        @endif
        
      </div>
    </div>
  @endforeach
@endsection