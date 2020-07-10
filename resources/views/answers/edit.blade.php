
@extends('layouts.master')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Pertanyaan</h1>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-dark">
                    <div class="card-header">
                        Edit
                    </div>
                    <div class="card-body">
                        <form method="POST" action="/jawaban/{{ $id }}">
                            @csrf
                            @method('PUT')
                            
                            <div class="form-group">
                                <label for="bodytext">Isi</label>
                                <textarea name="bodytext" class="form-control" cols="30" rows="10">{{ $answer->bodytext }}</textarea>
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Ubah Jawaban</button>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection