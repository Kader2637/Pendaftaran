@extends('customer.master')
@section('judul')
Edit customer - Toko
@endsection
@section('konten')
<div class="row">
<div class="col-md-12">
<div class="card border-0 shadow rounded">
<div class="card-body">
    <form action="{{ route('customer.update', $customer->id) }}" method="POST"
        enctype="multipart/form-data">
@csrf
@method('PUT')

<div class="mb-3">
<label class="form-label fw-bold">Nama Petugas</label>
<input type="text" class="form-control
@error('nama') is-invalid @enderror" name="nama"
value="{{ old('nama', $customer->nama) }}"
placeholder="Masukkan nama customer">
<!-- error message untuk title -->
@error('nama')
<div class="alert alert-danger mt-2">
Nama telah digunakan !
</div>
@enderror
</div>

<div class="mb-3">
    <label class="form-label fw-bold">Jenis kelamin</label><br>
    <input type="radio" value="laki-laki" name="jk" {{ old('laki-laki', $customer->jk) == 'laki-laki' ? 'checked' : '' }}> laki-laki
    <input type="radio" value="perempuan" name="jk" {{ old('perempuan', $customer->jk) == 'perempuan' ? 'checked' : '' }}> perempuan
    <!-- error message untuk jabatan -->
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
    value="{{ old('alamat', $customer->alamat) }}"
    placeholder="Masukkan alamat customer">
    <!-- error message untuk title -->
    @error('alamat')
    <div class="alert alert-danger mt-2">
    alamat telah digunakan !
    </div>
    @enderror
    </div>


    <div class="mb-3">
        <label class="form-label fw-bold">No Telephone</label>
        <input type="text" class="form-control
        @error('no') is-invalid @enderror" name="no"
        value="{{ old('no', $customer->no) }}"
        placeholder="Masukkan no customer">
        <!-- error message untuk title -->
        @error('no')
        <div class="alert alert-danger mt-2">
        no telah digunakan !
        </div>
        @enderror
        </div>


<button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
<button type="reset" class="btn btn-md btn-danger">RESET</button>
<a href="{{ route('customer.index') }}" class="btn btn-md btn-warning">KEMBALI</a>
</form>
</div>
</div>
</div>
</div>
@endsection
