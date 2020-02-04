{{-- Extends File Layout --}}
@extends('template.layout')

{{-- Title --}}
@section('title', 'Admin | Histori')

{{-- Navbar --}}
@include('template.admin-navbar')

{{-- Content --}}
@section('content')
	<!-- Filter Box -->
	<div class="container my-3 py-3 bg-light">
		<form action="{{ route('pengaduan.filter') }}" method="POST">
			@method('POST')
			@csrf
			<div class="form-row justify-content-around">
				<div class="my-1 col-6 col-md-2 col-lg-2">
					<input type="date" name="date" class="form-control form-control-sm">
				</div>
				<div class="my-1 col-6 col-md-2 col-lg-2">
					<select name="jenis_aspirasi" class="form-control form-control-sm">
						<option selected>Jenis Keluhan</option>
						<option value="Fasilitas Publik">Fasilitas Publik</option>
						<option value="Keamanan">Keamanan</option>
						<option value="Kesehatan">Kesehatan</option>
					</select>
				</div>
				<div class="my-1 col-6 col-md-2 col-lg-2">
					<select name="feedback" class="form-control form-control-sm">
						<option selected>Feedback</option>
						<option value="Puas">Puas 😄</option>
						<option value="Tidak Puas">Tidak Puas 😟</option>
					</select>
				</div>
				<div class="my-1 col-6 col-md-2 col-lg-2">
					<input type="text" name="key" class="form-control form-control-sm" placeholder="NIK / ID Pelaporan">
				</div>
				<div class="my-1 col col-md-1 col-lg-1">
					<input type="submit" class="btn-outline-primary form-control form-control-sm" value="Filter">
				</div>
		  </div>
		</form>
	</div>
	<!-- Akhir Filter Box -->

	<!-- List Histori -->
	<div class="container">
		@foreach($aspirasis as $aspirasi)
		<div class="row">
			<div class="col">
				<div class="card my-3 border-success">
					<div class="card-body">
						<h5 class="card-title">#LAP{{ $aspirasi->id_pelaporan }} | NIK{{ $aspirasi->id_penduduk }}</h5>
						<span class="badge badge-pill badge-primary">{{ $aspirasi->jenis_aspirasi }}</span>
						<span class="badge badge-pill badge-primary">{{ $aspirasi->tanggal }}</span>
						<span class="badge badge-pill badge-primary">{{ $aspirasi->lokasi }}</span>
						@if($aspirasi->statusAspirasi->feedback === 'Puas')
						<span class="badge badge-pill badge-primary">😄</span>
						@elseif($aspirasi->statusAspirasi->feedback === 'Tidak Puas')
						<span class="badge badge-pill badge-danger">😟</span>
						@endif
						<p class="card-text mt-2">Lorem ipsum dolor sit amet,</p>
						<span class="btn btn-info btn-sm">Status : {{ $aspirasi->statusAspirasi->status }}</span>
					</div>
				</div>
			</div>
		</div>
		@endforeach
	</div>
	<!-- Akhir List Histori -->
@endsection