@extends('guruku.master')
@section('judul')
Tambah guru - Toko
@endsection
@section('konten')
<div class="row">
<div class="col-md-12">
<div class="card border-0 shadow rounded">
<div class="card-body">
<form action="{{ route('guruku.store') }}" method="POST">
@csrf
<div class="mb-3">
<label class="form-label fw-bold">Nama Guru</label>
<input type="text" class="form-control
@error('nama') is-invalid @enderror" name="nama"
value="{{ old('nama') }}"
placeholder="Masukkan Nama">
<!-- error message untuk title -->
@error('nama')
<div class="alert alert-danger mt-2">
{{ $message }}
</div>
@enderror
</div>

<div class="mb-3">
    <label class="form-label fw-bold">Nisn</label>
    <input type="number" class="form-control
    @error('nisn') is-invalid @enderror" name="nisn"
    value="{{ old('nisn') }}"
    placeholder="Masukkan nisn">
    <!-- error message untuk title -->
    @error('nisn')
    <div class="alert alert-danger mt-2">
    {{ $message }}
    </div>
    @enderror
    </div>


<div class="mb-3">
    <label class="form-label fw-bold">Alamat</label>
    <input type="text" class="form-control
    @error('alamat') is-invalid @enderror" name="alamat"
    value="{{ old('alamat') }}"
    placeholder="Masukkan alamat">
    <!-- error message untuk title -->
    @error('alamat')
    <div class="alert alert-danger mt-2">
     {{ $message }}
    </div>
    @enderror
    </div>


<div class="mb-3">
    <label class="form-label fw-bold">Jenis Kelamin</label><br>
    <input type="radio" value="laki-laki" name="jk">laki-laki
    <input type="radio" value="perempuan" name="jk">perempuan
    <!-- error message untuk satuan -->
    @error('jk')
    <div class="alert alert-danger mt-2">
    {{ $message }}
    </div>
    @enderror
    </div>





<button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
<button type="reset" class="btn btn-md btn-danger">RESET</button>
<a href="{{ route('guruku.index') }}" class="btn btn-md btn-warning">KEMBALI</a>
</form>
</div>
</div>
</div>
</div>
@endsection
@section('skrip')
<script
src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script>
CKEDITOR.replace('content');
</script>
@endsection
