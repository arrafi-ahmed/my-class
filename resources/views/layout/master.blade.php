@include ('layout.header')

<div class="container-fluid">
	<div class="row">

		@if(session()->has('type'))
		<nav class="col-md-2 d-none d-md-block bg-light py-6 sidebar">
			@include ('layout.sidebar')
		</nav>
		
		<main class="col-md-9 col-lg-10 ml-sm-auto px-4 py-6 main" role="main">
			<h3 class="d-inline-block">
				@yield('title')
			</h3>

			@yield('main')
		</main>

		@else
		<main class="col-md-10 col-lg-10 mx-auto px-4 py-6 main" role="main">
			<h3>
				@yield('title')
			</h3>

			@yield('main')
		</main>
		@endif

	</div>
</div>

@include ('layout.footer')