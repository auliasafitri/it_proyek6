@extends('layouts.main')

@section('content')

	<div class="pd-ltr-20 xs-pd-20-10">
		<div class="min-height-200px">

			{{-- Notofikasi --}}
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

			<div class="page-header">
				<div class="row">
					<div class="col-md-6 col-sm-12">
						<div class="title">
							<h4>Detail Transaksi</h4>
						</div>
						<nav aria-label="breadcrumb" role="navigation">
							<ol class="breadcrumb">
								<li class="breadcrumb-item">
									<p>Dashboard</p>
								</li>
								<li class="breadcrumb-item active" aria-current="page">
									Detail Transaksi
								</li>
							</ol>
						</nav>
					</div>
					<div class="col-md-6 col-sm-12 text-right">
						<div class="dropdown">
						</div>
					</div>
				</div>
			</div>
			<!-- Simple Datatable start -->
			<div class="card-box mb-30">
				<div class="pd-20">
					
					{{-- <h4 class="text-blue h4">Data Detail Transaksi</h4> --}}
				<form action="{{ route('cetakRekap') }}" method="GET" class="form-inline">
					<div class="form-group">
						<label for="tanggal_dari">Tanggal Dari:</label>
						<input type="date" name="tanggal_dari" id="tanggal_dari" class="form-control mx-sm-2">
					</div>
					<div class="form-group">
						<label for="tanggal_sampai">Tanggal Sampai:</label>
						<input type="date" name="tanggal_sampai" id="tanggal_sampai" class="form-control mx-sm-2">
					</div>
					<button type="submit" class="btn btn-primary">
						<i class="fa fa-print"></i> Cetak Laporan Rekap
					</button>
				</form>
					
				</div>
				<div class="pb-20">
					<table class="data-table table stripe hover nowrap">
						<thead>
							<tr>
								<th class="table-plus datatable-nosort">No</th>
								<th class="table-plus datatable-nosort">Tanggal Transaksi</th>
								<th class="datatable-nosort">Aksi</th>
							</tr>
						</thead>
						<tbody>
						@php
									$no = 1;
								@endphp
							@foreach ($DetailTransaksi as $dp)
								<tr>
								<td class="table-plus">{{ $no++ }}</td>
									<td class="table-plus">{{ $dp->tanggal }}</td>
									<td>
									<a href="{{ route('DetailTransaksi.detail', $dp->id_transaksi) }}"
                                    <button class="btn btn-success text-white"><i class="bi bi-eye"></i>Detail</button>
                                    </a>
                                    <a href="{{ route('DetailTransaksi.destroy', $dp->id_transaksi) }}"
													
													onclick="event.preventDefault(); confirmDelete('{{ $dp->id_transaksi }}');">
                                                    <button class="btn btn-danger text-white"><i class="bi bi-trash"></i>Hapus</button>
									</a>												
												{{-- Delete Button --}}
												
												 
												 <form id="delete-form-{{ $dp->id_transaksi }}" action="{{ route('DetailTransaksi.destroy', $dp->id_transaksi) }}" method="POST" style="display: none;">
													 @csrf
													 @method('DELETE')
												 </form>
												 
												 <script>
												 function confirmDelete(kodelokasi) {
													 if (confirm('Yakin ingin menghapus data ini?')) {
														 document.getElementById('delete-form-' + kodelokasi).submit();
													 }
												 }
												 </script>
												{{-- End Delete Button --}}
											
									</td>
								</tr>
							@endforeach
					
										
					
						</tbody>
					</table>
				</div>
			</div>
			<!-- Simple Datatable End -->
			{{-- <!-- multiple select row Datatable start -->
		
			<!-- multiple select row Datatable End -->
		
			<!-- Checkbox select Datatable End -->
			<!-- Export Datatable start -->

			<!-- Export Datatable End --> --}}
		</div>
		<!-- <div class="footer-wrap pd-20 mb-20 card-box">
			DeskApp - Bootstrap 4 Admin Template By
			<a href="https://github.com/dropways" target="_blank"
				>Ankit Hingarajiya</a
			>
		</div> -->
	</div>

@endsection