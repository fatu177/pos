@extends('layout.app')
@section('transaksi')
active
@endsection

@section('content')
<div class="m-3" align="right">
    <a class="btn btn-primary mb-0" href="{{ route('transaksi.create') }}"><i class='bx bx-plus-medical'></i> Tambah
        {{ $title }}</a>
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
                        <th>Nama Kasir</th>
                        <th>No Transaksi</th>
                        <th>Tanggal Transaksi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->user->nama_lengkap }}</td>
                        <td>{{ $data->kode_transaksi }}</td>
                        <td>{{ $data->tanggal_transaksi }}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('transaksi.edit', $data->id) }}"><i
                                    class='bx bx-pencil'></i></a>
                            <form @php if (auth()->user()->level->nama_level != "Administrator"){
                                echo "hidden";
                                }
                                @endphp action="{{ route('transaksi.destroy', $data->id) }}" method="post">
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
