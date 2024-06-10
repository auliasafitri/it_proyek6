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

			<!-- Simple Datatable start -->
			<div class="card-box mb-30">
				<div class="pd-20">
					
					{{-- <h4 class="text-blue h4">Data Detail Transaksi</h4> --}}
					
				</div>
				<div class="pb-20">
					<table class="table stripe hover nowrap">
						<thead>
							<tr>
								<th class="table-plus datatable-nosort">No</th>
								<th class="table-plus datatable-nosort">Nama Barang</th>
                                <th class="table-plus datatable-nosort">Harga</th>
								<th class="table-plus datatable-nosort">Qty</th>
                                <th class="table-plus datatable-nosort">Subtotal</th>
							</tr>
						</thead>
						<tbody>
						@php
									$no = 1;
                                    $total=0;
								@endphp
							@foreach ($struk as $dp)
								<tr>
								<td class="table-plus">{{ $no++ }}</td>
									<td class="table-plus">{{ $dp->nama_barang }}</td>
                                    <td class="table-plus">Rp{{ number_format($dp->harga, 0, ",", ".") }}</td>
                                    <td class="table-plus">{{ $dp->qty }}</td>
                                    <td class="table-plus">Rp{{ number_format($dp->qty*$dp->harga, 0, ",", ".") }}</td>
								</tr>
                                @php
                                $total=$total+($dp->qty*$dp->harga);
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
                        <th class="table-plus datatable-nosort"><button class="btn btn-primary" title="Cetak Struk"><i class="fa fa-print"></i></button></th>
                        </tr>
                        </tfoot>
                        
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