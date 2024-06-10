@extends('layouts.main')

@section('content')

	<div class="pd-ltr-20 xs-pd-20-10">
		<div class="min-height-200px">
			<div class="page-header">
				<div class="row">
					<div class="col-md-6 col-sm-12">
						<div class="title">
							<h4>Edit Data Kelas</h4>
						</div>
						<nav aria-label="breadcrumb" role="navigation">
							<ol class="breadcrumb">
								<li class="breadcrumb-item">
									<p>Data Kelas</p>
								</li>
								<li class="breadcrumb-item active" aria-current="page">
									Edit Kelas
								</li>
							</ol>
						</nav>
					</div>
					<div class="col-md-6 col-sm-12 text-right">
						<!-- <div class="dropdown">
							<a
								class="btn btn-primary dropdown-toggle"
								href="#"
								role="button"
								data-toggle="dropdown"
							>
								January 2018
							</a>
							<div class="dropdown-menu dropdown-menu-right">
								<a class="dropdown-item" href="#">Export List</a>
								<a class="dropdown-item" href="#">Policies</a>
								<a class="dropdown-item" href="#">View Assets</a>
							</div>
						</div> -->
					</div>
				</div>
			</div>
			
			<!-- Input Validation Start -->
			<div class="pd-20 card-box mb-30">
				<div class="clearfix">
					<div class="pull-left">
						<h4 class="text-blue h4">Masukkan Data Kelas</h4>
						
					</div>
				</div>
				<form action="{{ route('kelas.update', $kelas->id_kelas) }}" method="POST">
					@csrf
                    @method('PUT')
					<div class="row">
						<div class="col-md-1 col-sm-12"></div>
						<div class="col-md-10 col-sm-12">
							<div class="form-group ">
								<label class="form-control-label">kelas</label>
								<input
									type="text"
									class="form-control " name="kelas" value="{{ $kelas->kelas }}"
								/>
								@error('kelas')
									<div class="form-control-feedback has-danger">
										{{ $message }}
									</div>
								@enderror
								
							</div>
						</div>
					</div>
					<div class="row">
                    <div class="col-md-1 col-sm-12"></div>
						<div class="btn-list m-3">
                        <a href="/kelas" class="btn btn-secondary btn-lg" role="button">
								<i class="fa fa-arrow-left"></i>
							</a>
							<button type="submit" class="btn btn-lg btn-primary">
							<i class="fa fa-save"></i>
							</button>
							
						</div>
					</div>
				</form>
			</div>
			<!-- Input Validation End -->
			
		</div>
		<!-- <div class="footer-wrap pd-20 mb-20 card-box">
			AGM Inventory - 1.0
		</div> -->
	</div>


@endsection
