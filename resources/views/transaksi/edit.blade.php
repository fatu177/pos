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
<<<<<<< HEAD
                        value="{{ $data->tanggal_transaksi }}" required>
                    <label for="floatingInput">Tanggal Transaksi</label>
=======
                        value="{{ $data->tanggal_transaksi }}" readonly required>
                    <label for="floatingInput">Tanggal Transaksi</label>
                </div>
                <div class="form-floating col-6">
                    <select name="id_user" id="id_user" class="form-control mb-3" readonly required>
                        <option selected value="{{ $data->user->id }}">{{ $data->user->nama_lengkap }}</option>
                    </select>
                    <label for="floatingInput">Kasir</label>
>>>>>>> d354322306d1da8d4046f15a238825414d9add6c
                </div>

                <div class="form-floating col-6">
<<<<<<< HEAD
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
=======
>>>>>>> d354322306d1da8d4046f15a238825414d9add6c
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
<<<<<<< HEAD
=======

                <table id="tabelDetail" class="table">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Barang</th>
                            <th>Kuantitas</th>
                            <th>Harga Barang</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="tbodyDetail">
                        <tr id="barisDefault">
                            <td>1</td>
                            <td>
                                <select name="id_barang[]" class="form-control mb-3" onchange="hargaBarang(this)">
                                    <option value="">Pilih Barang</option>
                                    @foreach ($barang as $a)
                                    <option value="{{ $a->id }}">{{ $a->nama_barang }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <input type="number" name="qty[]" class="form-control mb-3" onchange="hitungTotal()"
                                    required>
                            </td>
                            <td>
                                <input type="text" name="harga[]" class="form-control mb-3" readonly>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger btn-sm"
                                    onclick="hapusBaris(this)">Hapus</button>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <button type="button" class="btn btn-success mb-3" onclick="tambahBaris()">Tambah Baris</button>
>>>>>>> d354322306d1da8d4046f15a238825414d9add6c
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
<script>
<<<<<<< HEAD
    function hitungTotal() {
        var qty = document.getElementById('qty').value;
        var harga = document.getElementById('harga').value;
        var total = qty * harga;
        document.getElementById('total_harga').value = total;
=======
    var nomorBaris = 1;

    function tambahBaris() {
        nomorBaris++;

        var html = `
        <tr id="baris${nomorBaris}">
            <td>${nomorBaris}</td>
            <td>
                <select name="id_barang[]" class="form-control mb-3" onchange="hargaBarang(this)">
                    <option value="">Pilih Barang</option>
                    @foreach ($barang as $a)
                    <option value="{{ $a->id }}">{{ $a->nama_barang }}</option>
                    @endforeach
                </select>
            </td>
            <td>
                <input type="number" name="qty[]" class="form-control mb-3" onchange="hitungTotal()" required>
            </td>
            <td>
                <input type="text" name="harga[]" class="form-control mb-3" readonly>
            </td>
            <td>
                <button type="button" class="btn btn-danger btn-sm" onclick="hapusBaris('baris${nomorBaris}')">Hapus</button>
            </td>
        </tr>
        `;

        // Tambahkan baris baru ke dalam tabel
        document.getElementById("tbodyDetail").insertAdjacentHTML("beforeend", html);
    }

    function hapusBaris(idBaris) {
        // Hapus baris berdasarkan ID
        document.getElementById(idBaris).remove();

        // Update nomor urut kembali setelah menghapus
        var nomorUrut = 1;
        var tabel = document.getElementById("tbodyDetail");
        Array.from(tabel.rows).forEach((row, index) => {
            row.cells[0].innerText = nomorUrut++;
        });
    }

    function hitungTotal() {
        var rows = document.getElementById("tbodyDetail").getElementsByTagName("tr");
        var total = 0;

        for (var i = 0; i < rows.length; i++) {
            var qty = rows[i].querySelector("input[name='qty[]']").value;
            var harga = rows[i].querySelector("input[name='harga[]']").value;

            if (qty && harga) {
                total += parseFloat(qty) * parseFloat(harga);
            }
        }

        document.getElementById("total_harga").value = total;
        hitungKembalian();
>>>>>>> d354322306d1da8d4046f15a238825414d9add6c
    }

    function hitungKembalian() {
        var bayar = document.getElementById('nominal_bayar').value;
<<<<<<< HEAD
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
=======
        var totalHarga = document.getElementById('total_harga').value;

        var kembalian = parseFloat(bayar) - parseFloat(totalHarga);
        document.getElementById('kembalian').value = kembalian;
    }

    function hargaBarang(select) {
        var selectedBarang = select.value;
        @foreach ($barang as $a)
        if ("{{ $a->id }}" == selectedBarang) {
            select.parentNode.parentNode.querySelector("input[name='harga[]']").value = "{{ $a->harga }}";
        }
        @endforeach

        hitungTotal();
>>>>>>> d354322306d1da8d4046f15a238825414d9add6c
    }
</script>
@endsection