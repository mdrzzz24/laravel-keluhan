{{-- Extends File Layout --}}
@extends('template.layout')

{{-- Title --}}
@section('title', 'Pengaduan | Pencarian')

{{-- Navbar --}}
@include('template.navbar')

{{-- Content --}}
@section('content')
	<!-- Search -->
	<div class="container">
		<div class="row justify-content-center align-items-center">
			<div class="my-1 col-12 border-bottom">
				<h1 class="display-4 text-center">Cari keluhan</h1>
				<form action="{{ route('pengaduan.pencarian') }}" method="POST" class="mt-4">
					@method('POST')
					@csrf
					<div class="form-row text-center">
						<div class="form-group col-10">
							<input type="text" class="form-control" name="search" placeholder="Kata kunci">
						</div>
						<div class="form-group col-2">
							<button type="submit" class="btn btn-primary">Cari</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Akhir Search -->

	<!-- List Pencarian -->
	<div class="container">
		@isset ($aspirasis)
			@foreach($aspirasis as $aspirasi)
				@if ($aspirasi->statusAspirasi->status == 'Proses')
					<div class="row">
						<div class="col">
							<div class="card my-3 border-danger">
								<div class="card-body">
									<h5 class="card-title">#LAP{{ $aspirasi->id_pelaporan }} | NIK{{ $aspirasi->id_penduduk }}</h5>
									<span class="badge badge-pill badge-primary">{{ $aspirasi->jenis_aspirasi }}</span>
									<span class="badge badge-pill badge-primary">{{ $aspirasi->tanggal }}</span>
									<span class="badge badge-pill badge-primary">{{ $aspirasi->lokasi }}</span>
									<p class="card-text mt-2">Lorem ipsum dolor sit amet</p>
									<span class="btn btn-info btn-sm">Status : {{ $aspirasi->statusAspirasi->status }}</span>
								</div>
							</div>
						</div>
					</div>	
				@else
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
									<p class="card-text mt-2">Lorem ipsum dolor sit amet</p>
									<span class="btn btn-info btn-sm">Status : {{ $aspirasi->statusAspirasi->status }}</span>
									@if($aspirasi->statusAspirasi->feedback === 'Blank')
									<form action="{{ route('pengaduan.feedback', $aspirasi->id_pelaporan) }}" method="POST" class="mx-1 float-right ">
										@method('PUT')
										@csrf
										<input type="hidden" name="status" value="Tidak Puas">
										<button type="submit" class="btn btn-danger btn-sm">😟</button>
									</form>
									<form action="{{ route('pengaduan.feedback', $aspirasi->id_pelaporan) }}" method="POST" class="mx-1 float-right ">
										@method('PUT')
										@csrf
										<input type="hidden" name="status" value="Puas">
										<button type="submit" class="btn btn-primary btn-sm">😄</button>
									</form>
									@endif
								</div>
							</div>
						</div>
					</div>
				@endif
			@endforeach
		@endisset
	<!-- Akhir List Pencarian -->
@endsection