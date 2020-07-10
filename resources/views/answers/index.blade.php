@extends('layouts.master')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Jawaban</h1>
            </div>
        </div>
    </div>
</div> 
<div class="content">
    <div class="container-fluid">
        @foreach ($answers as $answer)
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <p>{{ $answer->id }}</p>
                            <p>{{ $answer->bodytext }}</p>
                        </div>
                        <div class="card-footer">
                            
                            <p>Dibuat pada tanggal {{ $answer->created_at }}</p>
                            <a href="/jawaban/{{ $answer->id }}/edit" class="btn btn-sm btn-warning">Edit</a>
                            <form action="/jawaban/{{ $answer->id }}" method="POST" style="display: inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</a>
                            </form>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection