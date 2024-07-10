@extends('layout.app')
@section('KategoriBarang')
active
@endsection
@section('content')
<div class="card">
    <div class="card-header">
        <h2>Tambah {{ $title }}</h2>
    </div>
    <form action="{{ route('KategoriBarang.store') }}" method="post">
        @csrf
        <div class="card-body">
            <div class="form-floating">
                <input type="text" class="form-control" name="nama_kategori" id="nama_kategori"
                    placeholder="Masukan Nama Kategori Barang" aria-describedby="floatingInputHelp" />
                <label for="floatingInput">Nama kategori Barang</label>

            </div>
           

        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
@endsection
