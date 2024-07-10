@extends('layout.app')
@section('barang')
active
@endsection
@section('content')
<div class="card">
    <div class="card-header">
        <h2>Tambah {{ $title }}</h2>
    </div>
    <form action="{{ route('barang.store') }}" method="post">
        @csrf
        <div class="card-body">
            <div class="form-floating">
                <input type="text" class="form-control mb-3" name="nama_barang" id="nama_barang"
                    placeholder="Masukan Nama Barang" aria-describedby="floatingInputHelp" required />
                <label for="floatingInput">Nama Barang</label>
            </div>
            <div class="form-floating">
                <select name="id_kategori" id="id_kategori" class="form-control mb-3" required>
                    <option value="" selected hidden>Pilih kategori</option>
                    @foreach ($kategori as $kategori)
                    <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>

                    @endforeach
                </select>
                <label for="floatingInput">Nama Kategori</label>

            </div>
            <div class="form-floating">
                <input type="text" class="form-control mb-3" name="satuan" id="satuan" placeholder="Masukan Satuan"
                    aria-describedby="floatingInputHelp" required />
                <label for="floatingInput">Satuan</label>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control mb-3" name="qty" id="qty" placeholder="Masukan Kuantitas"
                    aria-describedby="floatingInputHelp" required />
                <label for="floatingInput">Kuantitas</label>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control mb-3" name="harga" id="harga" placeholder="Masukan Harga Barang"
                    aria-describedby="floatingInputHelp" required />
                <label for="floatingInput">Harga</label>
            </div>


        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>

@endsection