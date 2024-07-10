@extends('layout.app')
@section('user')
active
@endsection
@section('content')
<div class="card">
    <div class="card-header">
        <h2>Tambah {{ $title }}</h2>
    </div>
    <form action="{{ route('user.store') }}" method="post">
        @csrf
        <div class="card-body">
            <div class="form-floating">
                <input type="text" class="form-control mb-3" name="nama_lengkap" id="nama_lengkap"
                    placeholder="Masukan Nama Anda" aria-describedby="floatingInputHelp" />
                <label for="floatingInput">Nama</label>
            </div>
            <div class="form-floating">
                <select name="id_level" id="id_level" class="form-control mb-3" required>
                    <option value="" selected hidden>Pilih Level</option>
                    @foreach ($level as $level)
                    <option value="{{ $level->id }}">{{ $level->nama_level }}</option>

                    @endforeach
                </select>
                <label for="floatingInput">Nama Level</label>

            </div>
            <div class="form-floating">
                <input type="email" class="form-control mb-3" name="email" id="email" placeholder="Masukan Email Anda"
                    aria-describedby="floatingInputHelp" />
                <label for="floatingInput">Email</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control mb-3" name="password" id="password"
                    placeholder="Masukan Password" aria-describedby="floatingInputHelp" />
                <label for="floatingInput">Password</label>
            </div>

        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>

@endsection
