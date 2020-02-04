{{-- Extends File Layout --}}
@extends('template.layout')

{{-- Title --}}
@section('title', 'Pengaduan | Login')

{{-- Navbar --}}
@include('template.navbar')

{{-- Content --}}
@section('content')
	<!-- Form Login -->
	<div class="container h-100">
		<div class="row justify-content-center align-items-center" style="min-height: 400px;">
			<div class="my-3 col-12 col-md-6 col-lg-5">
				<h1 class="display-4 text-center">Login</h1>
				<form action="" method="" class="mt-4">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Username">
					</div>
					<div class="form-group">
						<input type="password" class="form-control" placeholder="Password">
					</div>
					<button type="submit" class="btn btn-danger">Masuk</button>
					<a href="{{ url('/admin/dashboard') }}" class="d-block">instant Login Sample</a>
				</form>
			</div>
		</div>
	</div>
	<!-- Akhir Form Login -->
@endsection