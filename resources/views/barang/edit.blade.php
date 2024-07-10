@extends('layout.app')
@section('barang')
active
@endsection
@section('content')
<div class="card">
    <div class="card-header">
        <h2>Edit {{ $title }}</h2>
    </div>
    <form action="{{ route('barang.update', $data->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="form-floating">
                <input type="text" class="form-control mb-3" name="nama_barang" id="nama_barang"
                    placeholder="Masukan Nama Anda" aria-describedby="floatingInputHelp"
                    value="{{ $data->nama_barang }}" />
                <label for="floatingInput">Nama</label>
            </div>
            <div class="form-floating">
                <select name="id_kategori" id="id_kategori" class="form-control mb-3" required>
                    <option value="{{ $data->kategori_barang->id }}" selected>{{ $data->kategori_barang->nama_kategori
                        }}</option>
                    @foreach ($kategori->where('id','!=',$data->id) as $kategori)
                    <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>

                    @endforeach
                </select>
                <label for="floatingInput">Nama Kategori</label>

            </div>
            <div class="form-floating">
                <input type="text" class="form-control mb-3" name="satuan" id="satuan" placeholder="Masukan Satuan"
                    aria-describedby="floatingInputHelp" value="{{ $data->satuan }}" />
                <label for="floatingInput">Satuan</label>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control mb-3" name="qty" id="qty" placeholder="Masukan Kuantitas"
                    aria-describedby="floatingInputHelp" value="{{ $data->qty }}" />
                <label for="floatingInput">Kuantitas</label>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control mb-3" name="harga" id="harga" placeholder="Masukan Harga Barang"
                    aria-describedby="floatingInputHelp" value="{{ $data->harga }}" />
                <label for="floatingInput">Harga</label>
            </div>

        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>

@endsection