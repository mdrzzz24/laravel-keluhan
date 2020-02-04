{{-- Extends File Layout --}}
@extends('template.layout')

{{-- Title --}}
@section('title', 'Pengaduan | Form')

{{-- Navbar --}}
@include('template.navbar')

{{-- Content --}}
@section('content')
	<!-- Form -->
	<div class="container h-100">
		<div class="row justify-content-center align-items-center" style="min-height: 400px;">
			<div class="my-3 col-12 col-md-6 col-lg-5">
				<h1 class="display-4 text-center">Buat Keluhan</h1>

				{{-- Alert --}}
				@if(Session::has('success'))
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<strong>Take this and Save it: <span class="text-primary">{{ Session::get('success') }}</span></strong> 
					<button type="button" class="close" data-dismiss="alert">
					<span aria-hidden="true">&times;</span>
				  </button>
				</div>
				@endif
				{{-- Akhir Alert --}}
				
				<form action="{{ route('pengaduan.store') }}" method="POST" class="mt-4">
					@method('POST')
					@csrf
					<div class="form-group">
						<input type="text" name="nik" class="form-control" placeholder="NIK">
					</div>
					<div class="form-group">
						<input type="text" name="alamat" class="form-control" placeholder="Alamat">
					</div>
					<div class="form-group">
						<input type="text" name="lokasi" class="form-control" placeholder="Lokasi">
					</div>
					<div class="form-group">
						<select name="jenis_aspirasi" class="custom-select">
							<option selected>Jenis Keluhan</option>
							<option value="Kesehatan">Kesehatan</option>
							<option value="Fasilitas Publik">Fasilitas Publik</option>
							<option value="Keamanan">Keamanan</option>
						</select>
					</div>
					<button type="submit" class="btn btn-primary">Kirim</button>
				</form>
			</div>
		</div>
	</div>
	<!-- Akhir Form -->
@endsection