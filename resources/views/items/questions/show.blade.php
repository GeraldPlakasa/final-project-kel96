@extends('layouts.master')

@section('content')

<div class="container">
  <a href="/pertanyaan" type="submit" class="btn btn-primary btn-sm m-3">Kembali</a>
  
  <div class="card w-100">
    <h5 class="card-header">{{$question->title}}</h5>
    <div class="card-body">
      <div class="row">
        <!-- bagian Kiri -->
        <div class="col-md-11">
          <p class="card-text text-justify">{{$question->content}}</p>
          
          <span class="tags">{{$question->tag}}</span>

          <div class="blockquote-footer">Author: {{$question->author->name}}</div>
          <div class="blockquote-footer">Diunggah pada: {{$question->created_at}}</div>
          <div class="blockquote-footer">Terakhir diubah: {{$question->updated_at}}</div>
        </div>
        <!-- Bagian Kanan -->
        <div class="col-md-1 text-center">
            <button class="btn btn-lg " style="display: inline-flex;"><i class="fas fa-sort-up"></i></button>
            <h2>0</h2>
            <button class="btn btn-lg" style="display: inline-flex;"><i class="fas fa-sort-down"></i></button>
          </div>
        </div>
    </div>

    <div class="card-footer">
      <a href="/jawaban/{{$question->id}}/create" class="btn btn-sm btn-primary">Tambah jawaban</a>
      @if($question->user_id == $active_user)
          <a href="/pertanyaan/{{$question->id}}/edit" class="btn btn-sm btn-default"><i class="fas fa-edit"></i> Edit</a>
          <form action="/pertanyaan/{{$question->id}}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Hapus</button>
          </form>
      @endif      
    </div>
  </div>

  <!-- List jawaban -->
  <h5 class="ml-4 text-bold">Jawaban</h5>
  
  @foreach($question["answers"] as $answer)
    <div class="card w-80 mx-3">
      <div class="card-body">
        <div class="row">
          <!-- Bagian Kiri -->
          <div class="col-md-11">
            <p class="card-text">{{ $answer->bodytext }}</p>
            <footer class="blockquote-footer">{{$answer->author->name}}</footer>
            <a href="/jawaban/{{$answer->id}}">Lihat komentar</a><br><br>

            {{-- cek kalau hanya pembuat komentar yang bisa edit dan delete --}}
            @if($answer->user_id == $active_user)
              <a href="/jawaban/{{$answer->id}}/edit" class="btn btn-sm btn-default"><i class="fas fa-edit"></i> Edit jawaban</a>
              <form action="/jawaban/{{$answer->id}}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Hapus</button>
              </form>
            @endif
          </div>
          <!-- Bagian kanan -->
          <div class="col-md-1 text-center">
            <button class="btn btn-lg" id="upvote" style="display: inline-flex;"><i class="fas fa-angle-up"></i></button>
            <h2 id="jawaban_point">0</h2>
            <button class="btn btn-lg" id="downvote" style="display: inline-flex;"><i class="fas fa-angle-down"></i></button>
          </div>
        </div>
      </div>
    </div>
  @endforeach
</div> 

@endsection

@push('script')
<script>
$('.tags').html($('.tags').html().split(', ').map(function(el) {
    return '<span class="badge badge-success">' + el + '</span>   '}))
</script>
@endpush

