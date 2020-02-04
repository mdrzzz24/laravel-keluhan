{{-- Extends File Layout --}}
@extends('template.layout')

{{-- Title --}}
@section('title', 'Admin | Dashboard')

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
				<div class="my-1 col-6 col-md-3 col-lg-3">
					<input type="date" name="date" class="form-control form-control-sm" placeholder="First name">
				</div>
				<div class="my-1 col-6 col-md-3 col-lg-3">
					<select name="jenis_aspirasi" class="form-control form-control-sm">
						<option selected>Jenis Keluhan</option>
						<option value="Fasilitas Publik">Fasilitas Publik</option>
						<option value="Keamanan">Keamanan</option>
						<option value="Kesehatan">Kesehatan</option>
					</select>
				</div>
				<div class="my-1 col-6 col-md-3 col-lg-3">
					<input type="text" name="key" class="form-control form-control-sm" placeholder="NIK / ID Pelaporan">
				</div>
				<div class="my-1 col col-md-1 col-lg-1">
					<input type="submit" class="btn-outline-primary form-control form-control-sm" value="Filter">
				</div>
		  </div>
		</form>
	</div>
	<!-- Akhir Filter Box -->

	<!-- List Pencarian -->
	<div class="container">
		@foreach($aspirasis as $aspirasi)
			@if($aspirasi->statusAspirasi->status === 'Proses')
			<div class="row">
				<div class="col">
					<div class="card my-3 border-danger">
						<div class="card-body">
							<h5 class="card-title">#LAP{{ $aspirasi->id_pelaporan }} | NIK{{ $aspirasi->id_penduduk }}</h5>
							<span class="badge badge-pill badge-primary">{{ $aspirasi->jenis_aspirasi }}</span>
							<span class="badge badge-pill badge-primary">{{ $aspirasi->tanggal }}</span>
							<span class="badge badge-pill badge-primary">{{ $aspirasi->lokasi }}</span>
							<p class="card-text mt-2">Lorem ipsum dolor sit amet,</p>
							<span class="btn btn-info btn-sm">Status : {{ $aspirasi->statusAspirasi->status }}</span>
							<form action="{{ route('pengaduan.destroy', $aspirasi->id_pelaporan) }}" method="POST" class="mx-1 float-right ">
								@method('DELETE')
								@csrf
								<button type="submit" class="btn btn-danger btn-sm">Hapus</button>
							</form>
							<form action="{{ route('pengaduan.update', $aspirasi->id_pelaporan) }}" method="POST" class="mx-1 float-right ">
								@method('PUT')
								@csrf
								<button type="submit" class="btn btn-success btn-sm">Selesai</button>
							</form>
						</div>
					</div>
				</div>
			</div>
			@elseif($aspirasi->statusAspirasi->status === 'Selesai')
			<div class="row">
				<div class="col">
					<div class="card my-3 border-success">
						<div class="card-body">
							<h5 class="card-title">#LAP{{ $aspirasi->id_pelaporan }} | NIK{{ $aspirasi->id_penduduk }}</h5>
							<span class="badge badge-pill badge-primary">{{ $aspirasi->jenis_aspirasi }}</span>
							<span class="badge badge-pill badge-primary">{{ $aspirasi->tanggal }}</span>
							<span class="badge badge-pill badge-primary">{{ $aspirasi->lokasi }}</span>
							<p class="card-text mt-2">Lorem ipsum dolor sit amet,</p>
							<span class="btn btn-info btn-sm">Status : {{ $aspirasi->statusAspirasi->status }}</span>
						</div>
					</div>
				</div>
			</div>
			@endif
		@endforeach
	<!-- Akhir List Pencarian -->
@endsection