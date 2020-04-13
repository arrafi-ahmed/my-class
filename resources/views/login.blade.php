<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

		<title>Login</title>
	</head>
	<body>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<h3>
						Login
					</h3>
					<div class="tabbable" id="tabs-193542">
						<ul class="nav nav-tabs">
							<li class="nav-item">
								<a class="nav-link active show" href="#tab1" data-toggle="tab">Teacher</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#tab2" data-toggle="tab">Student</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#tab3" data-toggle="tab">Admin</a>
							</li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane active" id="tab1">
								<form method="post" action="loginTeacher" name="teacher">
									@csrf
									<div class="form-group">
										 
										<label for="exampleInputEmail1">
											Teacher ID
										</label>
										<input type="text" class="form-control" id="exampleInputEmail1" name="id" />
									</div>
									<div class="form-group">
										 
										<label for="exampleInputPassword1">
											Password
										</label>
										<input type="password" class="form-control" id="exampleInputPassword1" name="password" />
									</div>
									
									<button type="submit" class="btn btn-primary">
										Login
									</button>
								</form>
							</div>
							<div class="tab-pane" id="tab2">
								<form method="post" action="loginStudent" name="student">
									@csrf
									<div class="form-group">
										 
										<label for="exampleInputEmail1">
											Student ID
										</label>
										<input type="text" class="form-control" id="exampleInputEmail1" name="id" />
									</div>
									<div class="form-group">
										 
										<label for="exampleInputPassword1">
											Password
										</label>
										<input type="password" class="form-control" id="exampleInputPassword1" name="password" />
									</div>
									
									<button type="submit" class="btn btn-primary">
										Login
									</button>
								</form>
							</div>

							<div class="tab-pane" id="tab3">
								<form method="post" action="loginAdmin" name="admin">
									@csrf
									<div class="form-group">
										 
										<label for="exampleInputEmail1">
											Admin ID
										</label>
										<input type="text" class="form-control" id="exampleInputEmail1" name="id" />
									</div>
									<div class="form-group">
										 
										<label for="exampleInputPassword1">
											Password
										</label>
										<input type="password" class="form-control" id="exampleInputPassword1" name="password" />
									</div>
									
									<button type="submit" class="btn btn-primary">
										Login
									</button>
								</form>
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</div>

		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	</body>
</html>