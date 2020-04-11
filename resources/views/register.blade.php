<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

		<title>Register Account</title>
	</head>
	<body>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<h3>
						Register Account
					</h3>
					<div class="tabbable" id="tabs-963489">
						<ul class="nav nav-tabs">
							<li class="nav-item">
								<a class="nav-link active show" href="#tab1" data-toggle="tab">Teacher</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#tab2" data-toggle="tab">Student</a>
							</li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane active" id="tab1">
								<form method="post" name="teacher">
									<div class="form-group">
										 
										<label for="exampleInputEmail1">
											Id
										</label>
										<input type="text" class="form-control" name="teacherId" />
									</div>
									<div class="form-group">
										 
										<label for="exampleInputPassword1">
											Password
										</label>
										<input type="password" class="form-control" name="password" />
									</div>
									<div class="form-group">
										 
										<label for="exampleInputPassword1">
											Name
										</label>
										<input type="text" class="form-control" name="name" />
									</div>
									<div class="form-group">
										 
										<label for="exampleInputPassword1">
											Department
										</label>
										<input type="text" class="form-control" name="dept" />
									</div>
									<div class="form-group">
										 
										<label for="exampleInputPassword1">
											Qualification
										</label>
										<input type="text" class="form-control" name="qualification" />
									</div>
									<div class="form-group">
										 
										<label for="exampleInputEmail1">
											Email address
										</label>
										<input type="email" class="form-control" name="email" />
									</div>
									<div class="form-group">
										 
										<label for="exampleInputFile">
											Profile Photo
										</label>
										<input type="file" class="form-control-file" name="profilePhoto" />
										
									</div>
									<div class="checkbox">
										 
										<label>
											<input type="checkbox" /> Accept T&C
										</label>
									</div> 
									<button type="submit" class="btn btn-primary">
										Submit
									</button>
								</form>
							</div>
							<div class="tab-pane" id="tab2">
								<form method="post" name="student">
									<div class="form-group">
										 
										<label for="exampleInputEmail1">
											Id
										</label>
										<input type="text" class="form-control" name="studentId" />
									</div>
									<div class="form-group">
										 
										<label for="exampleInputPassword1">
											Password
										</label>
										<input type="password" class="form-control" name="password" />
									</div>
									<div class="form-group">
										 
										<label for="exampleInputPassword1">
											Name
										</label>
										<input type="text" class="form-control" name="name" />
									</div>
									<div class="form-group">
										 
										<label for="exampleInputPassword1">
											Department
										</label>
										<input type="text" class="form-control" name="department" />
									</div>
									<div class="form-group">
										 
										<label for="exampleInputPassword1">
											Parent's Contact No
										</label>
										<input type="text" class="form-control" name="parentContact" />
									</div>
									<div class="form-group">
										 
										<label for="exampleInputEmail1">
											Email address
										</label>
										<input type="email" class="form-control" name="email" />
									</div>
									<div class="form-group">
										 
										<label for="exampleInputFile">
											Profile Photo
										</label>
										<input type="file" class="form-control-file" name="profilePhoto" />
										
									</div>
									<div class="checkbox">
										 
										<label>
											<input type="checkbox" /> Accept T&C
										</label>
									</div> 
									<button type="submit" class="btn btn-primary">
										Submit
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