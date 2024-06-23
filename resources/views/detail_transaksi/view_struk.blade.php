@extends('layouts.main')

@section('content')

<div class="pd-ltr-20 xs-pd-20-10">
    <div class="min-height-200px">

        {{-- Notifikasi --}}
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        {{-- End Notifikasi --}}

        <!-- Simple Datatable start -->
        <div class="card-box mb-30">
            <div class="pd-20">
                <h4 class="text-blue h4">Struk Transaksi</h4>
            </div>
            <div class="pb-20">
                <table class="table stripe hover nowrap">
                    <thead>
                        <tr>
                            <th class="table-plus datatable-nosort">No</th>
                            <th class="table-plus datatable-nosort">Nama Barang</th>
                            <th class="table-plus datatable-nosort">Harga</th>
                            <th class="table-plus datatable-nosort">Jumlah Barang</th>
                            <th class="table-plus datatable-nosort">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                            $total = 0;
                        @endphp
                        @foreach ($struk as $dp)
                            <tr>
                                <td class="table-plus">{{ $no++ }}</td>
                                <td class="table-plus">{{ $dp->nama_barang }}</td>
                                <td class="table-plus">Rp{{ number_format($dp->harga, 0, ",", ".") }}</td>
                                <td class="table-plus">{{ $dp->jumlah_barang }}</td>
                                <td class="table-plus">Rp{{ number_format($dp->jumlah_barang * $dp->harga, 0, ",", ".") }}</td>
                            </tr>
                            @php
                                $total += ($dp->jumlah_barang * $dp->harga);
                            @endphp
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th class="table-plus datatable-nosort" colspan="4">Total</th>
                            <th class="table-plus datatable-nosort">Rp{{ number_format($total, 0, ",", ".") }}</th>
                        </tr>
                        <tr>
                            <th class="table-plus datatable-nosort" colspan="4"></th>
                            <th class="table-plus datatable-nosort">
                                <a href="{{ route('cetak.struk', $id_tr['id']) }}">
                                <button class="btn btn-primary" title="Cetak Struk">
                                    <i class="fa fa-print"></i>
                                </button>
                                </a>
                            </th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <!-- Simple Datatable End -->
    </div>
</div>

@endsection
