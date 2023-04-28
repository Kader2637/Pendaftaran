@extends('daftar.master')
@section('judul')
Edit daftar - Toko
@endsection
@section('konten')
<div class="row">
<div class="col-md-12">
<div class="card border-0 shadow rounded">
<div class="card-body">
    <form action="{{ route('daftar.update', $daftar->id) }}" method="POST"
        enctype="multipart/form-data">
@csrf
@method('PUT')

<div class="mb-3">
<label class="form-label fw-bold">Nama </label>
<input type="text" class="form-control
@error('nama') is-invalid @enderror" name="nama"
value="{{ old('nama', $daftar->nama) }}"
placeholder="Masukkan nama daftar">
<!-- error message untuk title -->
@error('nama')
<div class="alert alert-danger mt-2">
Nama telah digunakan !
</div>
@enderror
</div>

<div class="mb-3">
    <label class="form-label fw-bold">Nisn </label>
    <input type="number" class="form-control
    @error('nisn') is-invalid @enderror" name="nisn"
    value="{{ old('nisn', $daftar->nisn) }}"
    placeholder="Masukkan nisn daftar">
    <!-- error message untuk title -->
    @error('nisn')
    <div class="alert alert-danger mt-2">
    {{ $message }}
    </div>
    @enderror
    </div>

    <div class="mb-3">
        <label class="form-label fw-bold">Asal Sekolah </label>
        <input type="text" class="form-control
        @error('asal') is-invalid @enderror" name="asal"
        value="{{ old('asal', $daftar->asal) }}"
        placeholder="Masukkan asal daftar">
        <!-- error message untuk title -->
        @error('asal')
        <div class="alert alert-danger mt-2">
       {{ $message }}
        </div>
        @enderror
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Jurusan</label>
            <div class="mb-3">
                <select name="jurusan" class="form-select">
                    <option value="RPL" {{ old('RPL', $daftar->jurusan) == 'RPL' ? 'selected' : '' }}>RPL</option>
                    <option value="MM" {{ old('MM', $daftar->jurusan) == 'MM' ? 'selected' : '' }}>MM</option>
                </select>
                <!-- error message untuk satuan -->
                @error('jurusan')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
        </div>

<div class="mb-3">
    <label class="form-label fw-bold">Jenis kelamin</label><br>
    <input type="radio" value="laki-laki" name="jk" {{ old('laki-laki', $daftar->jk) == 'laki-laki' ? 'checked' : '' }}> laki-laki
    <input type="radio" value="perempuan" name="jk" {{ old('perempuan', $daftar->jk) == 'perempuan' ? 'checked' : '' }}> perempuan
    <!-- error message untuk jurusan -->
    @error('jk')
    <div class="alert alert-danger mt-2">
        {{ $message }}
    </div>
    @enderror
</div>


<div class="mb-3">
    <label class="form-label fw-bold">Alamat</label>
    <input type="text" class="form-control
    @error('alamat') is-invalid @enderror" name="alamat"
    value="{{ old('alamat', $daftar->alamat) }}"
    placeholder="Masukkan alamat daftar">
    <!-- error message untuk title -->
    @error('alamat')
    <div class="alert alert-danger mt-2">
    alamat telah digunakan !
    </div>
    @enderror
    </div>


<div class="mb-3">
    <label class="form-label fw-bold">Lama pkl</label>
    <input type="text" class="form-control
    @error('lama') is-invalid @enderror" name="lama"
    value="{{ old('lama', $daftar->lama) }}"
    placeholder="Masukkan lama daftar">
    <!-- error message untuk title -->
    @error('lama')
    <div class="alert alert-danger mt-2">
  {{ $message }}
    </div>
    @enderror
    </div>



<button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
<button type="reset" class="btn btn-md btn-danger">RESET</button>
<a href="{{ route('daftar.index') }}" class="btn btn-md btn-warning">KEMBALI</a>
</form>
</div>
</div>
</div>
</div>
@endsection
