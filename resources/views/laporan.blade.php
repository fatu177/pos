@extends('layout.app')
@section('laporan')
active
@endsection
@section('content')
<div class="row">
    <div class='col-lg-6 col-md-12 col-6 mb-4'>
        <div class='card'>
            <div class='card-body'>
                <div class='card-title d-flex align-items-start justify-content-between'>
                    <div class='avatar flex-shrink-0'>
                        <img src="{{ asset('assets/fe/assets/img/icons/unicons/chart-success.png') }}"
                            alt='chart success' class='rounded' />
                    </div>

                </div>
                <span class='fw-semibold d-block mb-1'>Total Barang Terjual</span>
                <h3 class='card-title mb-2'>
                    {{ $detail_penjualan->sum('qty') }}
                </h3>

            </div>
        </div>
    </div>
    <div class='col-lg-6 col-md-12 col-6 mb-4'>
        <div class='card'>
            <div class='card-body'>
                <div class='card-title d-flex align-items-start justify-content-between'>
                    <div class='avatar flex-shrink-0'>
                        <img src="{{ asset('assets/fe/assets/img/icons/unicons/chart-success.png') }}"
                            alt='chart success' class='rounded' />
                    </div>
                </div>
                <span class='fw-semibold d-block mb-1'>Total Penjualan</span>
                <h3 class='card-title mb-2'>Rp. {{ $detail_penjualan->sum('total_harga') }}</h3>

            </div>
        </div>
    </div>
</div>
@endsection