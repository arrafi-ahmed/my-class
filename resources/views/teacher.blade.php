<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

		<title>Edit Teacher Account</title>
	</head>
	<body>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<h2>Edit Teacher Account</h2>

					<form method="post" name="teacher">
						@csrf
						<div class="form-group">
							 
							<label for="exampleInputEmail1">
								Id
							</label>
							<input type="text" class="form-control" name="id" readonly value="{{$teacher->id}}"/>
						</div>
						<div class="form-group">
							 
							<label for="exampleInputPassword1">
								Password
							</label>
							<input type="password" class="form-control" name="password" value="{{$teacher->password}}"/>
						</div>
						<div class="form-group">
							 
							<label for="exampleInputPassword1">
								Name
							</label>
							<input type="text" class="form-control" name="name" value="{{$teacher->name}}"/>
						</div>
						<div class="form-group">
							 
							<label for="exampleInputPassword1">
								Department
							</label>
							<input type="text" class="form-control" name="dept" value="{{$teacher->dept}}"/>
						</div>
						<div class="form-group">
							 
							<label for="exampleInputPassword1">
								Qualification
							</label>
							<input type="text" class="form-control" name="qualification" value="{{$teacher->qualification}}"/>
						</div>
						<div class="form-group">
							 
							<label for="exampleInputEmail1">
								Email address
							</label>
							<input type="email" class="form-control" name="email" value="{{$teacher->email}}"/>
						</div>
						<div class="form-group">
							 
							<label for="exampleInputFile">
								Profile Photo
							</label><br>
							<img src="{{url('/').'/upload/teacherPhoto/'.$teacher->profilePhoto}}" class="img-thumbnail">
							<!-- <input type="file" class="form-control-file" name="profilePhoto" value="{{$teacher->profilePhoto}}"/> -->
							
						</div>
						<button type="submit" class="btn btn-primary">
							Save
						</button>
					</form>
					
				</div>
			</div>
		</div>

		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	</body>
</html>