@extends('layout.app')
@section('KategoriBarang')
active
@endsection
@section('content')
<div class="card">
    <div class="card-header">
        <h2>Edit {{ $title }}</h2>
    </div>
    <form action="{{ route('KategoriBarang.update', $data->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="form-floating">
                <input type="text" class="form-control" name="nama_kategori" placeholder="Masukan Nama kategori Barang"
                    aria-describedby="floatingInputHelp" value="{{ $data->nama_kategori }}" />
                <label for="floatingInput">Nama kategori Barang</label>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>

@endsection