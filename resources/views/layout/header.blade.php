<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="{{url('css/bootstrap.min.css')}}">
		<link rel="stylesheet" href="{{url('css/style.css')}}">

		<title>@yield('title')</title>
	</head>

	<body class="d-flex flex-column h-100">
		<header>
			<!-- Fixed navbar -->
			<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-primary">
				<a class="navbar-brand" href="{{url('/')}}">MyClass</a> <button aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" data-target="#navbarCollapse" data-toggle="collapse" type="button"><span class="navbar-toggler-icon"></span></button>
				
				@include('layout.navlink')
			</nav>
		</header>