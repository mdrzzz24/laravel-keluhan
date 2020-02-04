<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<a class="navbar-brand" href="{{ url('/admin/dashboard') }}">Dashboard</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarNav">
		<ul class="navbar-nav">
			<li class="nav-item"><a class="nav-link" href="{{ url('/admin/histori') }}">Histori</a></li>
		</ul>
		<a href="{{ url('/') }}" class="ml-auto text-white">Logout</a>
	</div>
</nav>
<!-- Akhir Navbar -->