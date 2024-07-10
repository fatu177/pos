@extends('layout.app')
@section('transaksi')
active
@endsection
@section('content')
<div class="card">
    <div class="card-header">
        <h2>Tambah {{ $title }}</h2>

    </div>
    <form action="{{ route('transaksi.update', $data->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="row">


                <div class="form-floating col-6">
                    <input type="text" class="form-control mb-3" name="kode_transaksi"
                        value="{{ $data->kode_transaksi }}" readonly>
                    <label for="floatingInput">NO. transaksi</label>

                </div>
                <div class="form-floating col-6">


                    <input type="date" class="form-control mb-3" name="tanggal_transaksi"
                        value="{{ $data->tanggal_transaksi }}" readonly required>

                    <label for="floatingInput">Tanggal Transaksi</label>

                </div>

                <div class="form-floating col-6">

                    <select name="id_user" id="id_user" class="form-control mb-3" required>
                        <option selected value="{{ $data->id }}">{{ $data->nama_lengkap }}</option>
                        @foreach ($user as $a)
                        <option value="{{ $a->id }}">{{ $a->nama_lengkap }}</option>
                        @endforeach
                    </select>
                    <label for="floatingInput">Pilih Kasir</label>
                </div>
                <div class="form-floating col-6">

                    <select name="id_barang" id="id_barang" class="form-control mb-3" required>
                        <option selected hidden value="">Pilih Barang</option>
                        @foreach ($barang as $a)
                        <option value="{{ $a->id }}">{{ $a->nama_barang }}</option>
                        @endforeach
                    </select>
                    <label for="floatingInput">Pilih Barang</label>
                </div>
                <div class="form-floating col-6">

                    <input type="number" name="jumlah" id="jumlah" placeholder="" class="form-control mb-3" required>



                    <label for="floatingInput">Jumlah</label>
                </div>
                <div class="form-floating col-6">

                    <input type="number" name="qty" id="qty" placeholder="" class="form-control mb-3" required>



                    <label for="floatingInput">Kuantitas</label>
                </div>
                <div class="form-floating col-6">
                    <input type="number" name="harga" id="harga" onchange="jumlah()" class="form-control mb-3"
                        placeholder="" required>
                    <label for="floatingInput">harga Barang</label>
                </div>
                <div class="form-floating col-6">
                    <input type="number" name="nominal_bayar" id="nominal_bayar" class="form-control mb-3"
                        placeholder="" required>
                    <label for="floatingInput">Nominal Bayar</label>
                </div>
                <div class="form-floating col-6">
                    <input type="text" name="total_harga" id="total_harga" class="form-control mb-3" placeholder=""
                        required>
                    <label for="floatingInput">Total Harga</label>
                </div>
                <div class="form-floating col-6">
                    <input type="number" name="kembalian" id="kembalian" class="form-control mb-3" placeholder=""
                        required>
                    <label for="floatingInput">Kembalian</label>
                </div>
            </div>

        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

    </form>
</div>
@endsection