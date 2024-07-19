@extends('layout.app')
@section('transaksi')
active
@endsection
@section('content')
<div class="card">
    <div class="card-header">
        <h2>Tambah {{ $title }}</h2>
    </div>
    <form action="{{ route('transaksi.update',$data->id) }}" method="post">
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
                        value="{{ $data->tanggal_transaksi }}" required>
                    <label for="floatingInput">Tanggal Transaksi</label>
                </div>
                <div class="form-floating col-6">
                    <input name="id_user" id="id_user" class="form-control mb-3"
                        value="{{ $data->user->nama_lengkap }} " readonly required>
                    <label for="floatingInput">Kasir</label>
                </div>
                <div class="form-floating col-6">
                    <select name="id_barang" id="id_barang" onchange="hargaBarang()" class="form-control mb-3"
                        aria-readonly="false" required>
                        <option selected value="{{ $detail_penjualan->barang->id }}">{{
                            $detail_penjualan->barang->nama_barang
                            }}</option>
                        @foreach ($barang as $a)
                        <option value="{{ $a->id }}">{{ $a->nama_barang }}</option>
                        @endforeach
                    </select>
                    <label for="floatingInput">Pilih Barang</label>
                </div>
                <div class="form-floating col-6">
                    <input type="number" name="jumlah" id="jumlah" placeholder="" class="form-control mb-3"
                        value="{{ $detail_penjualan->jumlah }}" required>
                    <label for="floatingInput">Jumlah</label>
                </div>
                <div class="form-floating col-6">
                    <input type="number" name="qty" id="qty" place holder="" onchange="hitungTotal()"
                        class="form-control mb-3" value="{{ $detail_penjualan->qty }}" required>
                    <label for="floatingInput">Kuantitas</label>
                </div>
                <div class="form-floating col-6">
                    <input type="number" value="{{ $detail_penjualan->harga }}" name="harga" id="harga"
                        onchange="hitungTotal()" class="form-control mb-3" readonly="true">
                    <label for="floatingInput">Harga Barang</label>
                </div>
                <div class="form-floating col-6">
                    <input type="number" name="nominal_bayar" id="nominal_bayar" onchange="hitungKembalian()"
                        class="form-control mb-3" value="{{ $detail_penjualan->nominal_bayar }}" placeholder=""
                        required>
                    <label for="floatingInput">Nominal Bayar</label>
                </div>
                <div class="form-floating col-6">
                    <input type="text" name="total_harga" id="total_harga" onchange="hitungKembalian()"
                        class="form-control mb-3" readonly placeholder="" value="{{ $detail_penjualan->total_harga }}">
                    <label for="floatingInput">Total Harga</label>
                </div>
                <div class="form-floating col-6">
                    <input type="number" name="kembalian" value="{{ $detail_penjualan->kembalian }}" id="kembalian"
                        class="form-control mb-3" readonly placeholder="">
                    <label for="floatingInput">Kembalian</label>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
<script>
    function hitungTotal() {
        var qty = document.getElementById('qty').value;
        var harga = document.getElementById('harga').value;
        var total = qty * harga;
        document.getElementById('total_harga').value = total;
    }

    function hitungKembalian() {
        var bayar = document.getElementById('nominal_bayar').value;
        var harga = document.getElementById('total_harga').value;
        var total = bayar - harga;
        document.getElementById('kembalian').value = total;
    }

    function hargaBarang() {
        var selectedBarang = document.getElementById('id_barang').value;
        @foreach ($barang as $a)
            if ("{{ $a->id }}" == selectedBarang) {
                document.getElementById('harga').value = "{{ $a->harga }}";
            }
        @endforeach
    }
</script>
@endsection