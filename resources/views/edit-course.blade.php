<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

		<title>Edit Course</title>
	</head>
	<body>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-12">
								<h3>
									Edit Course
								</h3>
								<form method="post">
									@csrf
									<div class="form-group">
										 
										<label for="exampleInputEmail1">
											ID
										</label>
										<input type="text" class="form-control" name="id" readonly value="{{$course->id}}"/>
									</div>
									<div class="form-group">
										 
										<label for="exampleInputEmail1">
											Name
										</label>
										<input type="text" class="form-control" name="name" value="{{$course->name}}"/>
									</div>
									<div class="form-group">
										 
										<label for="exampleInputEmail1">
											Section
										</label>
										<input type="text" class="form-control" name="section" value="{{$course->section}}"/>
									</div>
									<div class="form-group">
										 
										<label for="exampleInputPassword1">
											Time
										</label>
										<input type="text" class="form-control" name="time" value="{{$course->time}}"/>
									</div>
									<div class="form-group">
										 
										<label for="exampleInputPassword1">
											Room No
										</label>
										<input type="text" class="form-control" name="roomNo" value="{{$course->roomNo}}"/>
									</div>
									<div class="form-group">
										 
										<label for="exampleInputPassword1">
											Capacity
										</label>
										<input type="text" class="form-control" name="capacity" value="{{$course->capacity}}"/>
									</div>
									<div class="form-group">
										 
										<label for="exampleInputPassword1">
											Teacher ID
										</label>
										<input type="text" class="form-control" name="teacherId" value="{{$course->teacherId}}"/>
									</div>
									<button type="submit" class="btn btn-primary">
										Save
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