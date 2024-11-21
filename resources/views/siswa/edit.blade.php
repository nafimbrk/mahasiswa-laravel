@extends('layout/aplikasi')

@section('konten')
<a href="/siswa" class="btn btn-secondary"><< kembali</a>
<form method="post" action="{{ '/siswa/' . $data->nomor_induk }}" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="mb-3">
        <h1>nomor induk : {{ $data->nomor_induk }}</h1>
    </div>
    <div class="mb-3">
      <label for="nama" class="form-label">nama</label>
      <input type="text" class="form-control" id="nama" name="nama" value="{{ $data->nama }}">
    </div>
    <div class="mb-3">
      <label for="alamat" class="form-label">alamat</label>
      <textarea name="alamat" id="alamat" cols="30" rows="10" class="from-control">{{ $data->alamat }}</textarea>
    </div>
    @if ($data->foto)
         <div class="mb-3">
        <img style="max-width: 50px; max-height: 50px;" src="{{ url('foto') . '/' . $data->foto }}" alt="">    
        </div>   
    @endif
    <div class="mb-3">
        <label for="foto" class="form-label">foto</label>
        <input type="file" class="form-control" name="foto" id="foto">
      </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">update</button>
    </div>
</form>
@endsection