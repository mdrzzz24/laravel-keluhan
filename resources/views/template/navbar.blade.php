<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<a class="navbar-brand" href="{{ url('/') }}">Pengaduan</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarNav">
		<ul class="navbar-nav">
			<li class="nav-item"><a class="nav-link" href="{{ url('/pencarian') }}">Pencarian</a></li>
			<li class="nav-item"><a class="nav-link" href="{{ url('/about') }}">About</a></li>
		</ul>
		<a href="{{ url('/login') }}" class="ml-auto text-primary">Login</a>
	</div>
</nav>
<!-- Akhir Navbar -->