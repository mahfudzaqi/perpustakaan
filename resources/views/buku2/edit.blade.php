@extends('layout.dasar')
<!-- START FORM -->
@section('konten')
    
<form action="{{ route('petugas.update', ['id' => $data->idBuku]) }}" method="post">
    @csrf
    @method('PATCH')
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <div class="mb-3 row">
            <label for="judul" class="col-sm-2 col-form-label">Judul</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='judul' value="{{ $data->judul }}" id="judul">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="penulis" class="col-sm-2 col-form-label">Penulis</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='penulis' value="{{ $data->penulis }}" id="penulis">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="penerbit" class="col-sm-2 col-form-label">Penerbit</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='penerbit' value="{{ $data->penerbit }}" id="penerbit">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="tahunterbit" class="col-sm-2 col-form-label">Tahun Terbit</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='tahunterbit' value="{{ $data->tahunterbit }}" id="tahunterbit">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="tahunterbit" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-1"><a href="{{ url('petugas') }}" class="btn btn-primary">Back</a></div>
            <div class="col-sm-1"><button type="submit" class="btn btn-primary" name="submit">Update</button></div>
        </div>
    </div>
</form>
@endsection
<!-- AKHIR FORM -->