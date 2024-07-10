@extends('layout.app')
@section('barang')
active
@endsection

@section('content')
<div class="m-3" align="right">
    <a class="btn btn-primary mb-0" href="{{ route('barang.create') }}"><i class='bx bx-plus-medical'></i> Tambah {{
        $title }}</a>
</div>

<div class="card">
    <div class="card-header">
        <h2>{{ $title }}</h2>
    </div>
    <div class="card-body">
        <div class="table-responsive text-nowrap">
            <table class="table table-hover" id="example">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>Satuan</th>
                        <th>Kuantitas</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->nama_barang }}</td>
                        <td>{{ $data->kategori_barang->nama_kategori }}</td>
                        <td>{{ $data->satuan }}</td>
                        <td>{{ $data->qty }}</td>
                        <td>Rp.{{ $data->harga }}</td>


                        <td>
                            <a class="btn btn-primary" href="{{ route('barang.edit', $data->id) }}"><i
                                    class='bx bx-pencil'></i></a>
                            <form action="{{ route('barang.destroy',$data->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit"><i class='bx bx-trash danger'></i></button>

                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection