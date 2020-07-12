@extends('layouts.master')

@section('content')

<div class="container">
  <a href="/pertanyaan" type="submit" class="btn btn-primary btn-sm m-3">Kembali</a>
  
  <div class="card w-100">
    <div class="card-body">
      <p class="card-text text-justify">{{$answer->bodytext}}</p>
      <footer class="blockquote-footer">Author: {{$answer->author->name}}</footer>
      <footer class="blockquote-footer">Diunggah pada: {{$answer->created_at}}</footer>
      <footer class="blockquote-footer">Terakhir diubah: {{$answer->updated_at}}</footer><br>
      <a href="/komentar/{{$answer->id}}/create" class="btn btn-sm btn-primary">Beri komentar</a>
      
      @if($answer->user_id == $active_user)
          <a href="/jawaban/{{$answer->id}}/edit" class="btn btn-sm btn-default"><i class="fas fa-edit"></i> Edit jawaban</a>
          <form action="/jawaban/{{$answer->id}}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Hapus</button>
          </form>
      @endif
    </div>
  </div>

  {{-- List komentar --}}
  <h5 class="ml-4 text-bold">Komentar</h5>
  
  @foreach($answer["comments"] as $comment)
    <div class="card w-80 mx-3">
      <div class="card-body">
        <p class="card-text">{{ $comment->isi }}</p>
        <footer class="blockquote-footer">{{$comment->author->name}}</footer>

        {{-- cek kalau hanya pembuat komentar yang bisa edit dan delete --}}
        @if($comment->pemberi_komentar_id == $active_user)
          <a href="/komentar/{{$comment->id}}/edit" class="btn btn-sm btn-default"><i class="fas fa-edit"></i> Edit</a>
          <form action="/komentar/{{$comment->id}}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Hapus</button>
          </form>
        @endif
      </div>
    </div>
  @endforeach
</div>

@endsection
