@extends('layouts.main')

@section('content')
<div class="pd-ltr-20">
	<div class="card-box pd-20 height-100-p mb-30">
		<div class="row align-items-center">
			<div class="col-md-4">
				<img src="vendors/images/.png" alt="" />
			</div>
			<div class="col-md-8">
				<h4 class="font-20 weight-500 mb-10 text-capitalize">
					Selamat Datang
					<div class="weight-600 font-30 text-blue">Admin!</div>
				</h4>
				<p class="font-18 max-width-600">
					Sistem Informasi Pendataan Penjualan Koperasi SDN Sarang Halang
				</p>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xl-3 mb-30">
			<div class="card-box height-100-p widget-style1">
				<div class="d-flex flex-wrap align-items-center">
					<div class="progress-data">
						<div id="chart"></div>
					</div>
					<div class="widget-data">
						<div class="h4 mb-0">{{$kategori}}</div>
						<div class="weight-600 font-14">Kategori</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-3 mb-30">
			<div class="card-box height-100-p widget-style1">
				<div class="d-flex flex-wrap align-items-center">
					<div class="progress-data">
						<div id="chart2"></div>
					</div>
					<div class="widget-data">
						<div class="h4 mb-0">{{$barang}}</div>
						<div class="weight-600 font-14">Barang</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-3 mb-30">
			<div class="card-box height-100-p widget-style1">
				<div class="d-flex flex-wrap align-items-center">
					<div class="progress-data">
						<div id="chart3"></div>
					</div>
					<div class="widget-data">
						<div class="h4 mb-0">{{$stok}}</div>
						<div class="weight-600 font-14">Stok</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-3 mb-30">
			<div class="card-box height-100-p widget-style1">
				<div class="d-flex flex-wrap align-items-center">
					<div class="progress-data">
						<div id="chart4"></div>
					</div>
					<div class="widget-data">
						<div class="h4 mb-0">{{$akun}}</div>
						<div class="weight-600 font-14">Akun</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- <div class="footer-wrap pd-20 mb-20 card-box">
		DeskApp - Bootstrap 4 Admin Template By
		<a href="https://github.com/dropways" target="_blank"
			>Ankit Hingarajiya</a
		>
	</div> -->
</div>
@endsection