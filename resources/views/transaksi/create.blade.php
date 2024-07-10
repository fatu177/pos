@extends('layout.app')
@section('transaksi')
active
@endsection
@section('content')
<div class="card">
    <div class="card-header">
        <h2>Tambah {{ $title }}</h2>

    </div>
    <form action="{{ route('transaksi.store') }}" method="post">
        @csrf
        <div class="card-body">
            <div class="row">


                <div class="form-floating col-6">
                    @php
                    date_default_timezone_set('Asia/Jakarta');

                    @endphp

                    <input type="text" class="form-control mb-3" name="kode_transaksi" value="{{ date(" YmdGi$max") }}"
                        readonly>

                    <label for="floatingInput">NO. transaksi</label>

                </div>
                <div hidden class="form-floating col-6">


                    <input type="date" class="form-control mb-3" name="tanggal_transaksi" value="{{ date('Y-m-d') }}"
                        required>

                    <label for="floatingInput">Tanggal Transaksi</label>

                </div>

                <div class="form-floating col-6">

                    <select name="id_user" id="id_user" class="form-control mb-3" required>
                        <option selected hidden value="">Pilih Kasir</option>
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

                    <input type="number" name="qty" id="qty" placeholder="" onchange="hitungTotal()"
                        class="form-control mb-3" required>



                    <label for="floatingInput">Kuantitas</label>
                </div>
                <div class="form-floating col-6">
                    <input type="number" name="harga" id="harga" onchange="hitungTotal()" onchange="jumlah()"
                        class="form-control mb-3" placeholder="" required>
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


    </form>
</div>
<script>
    function hitungTotal() {
        var qty = document.getElementById('qty').value;
        var harga = document.getElementById('harga').value;

        var total = qty * harga;

        // Format total menjadi dua desimal
        document.getElementById('total_harga').value = total;
    }
</script>
@endsection