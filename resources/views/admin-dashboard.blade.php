<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

		<title>Teacher Dashboard</title>
	</head>
	<body>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="search-teacher">
						<form method="post">
							<div class="input-group">
							  <div class="input-group mb-3">
								  <input type="text" class="form-control" placeholder="ID" aria-label="Recipient's username" aria-describedby="basic-addon2" name="searchResult">
								  <select class="custom-select" id="inputGroupSelect01">
								    <option value="1">Teacher</option>
								    <option value="2">Student</option>
								    <option value="3">Grade</option>
								  </select>
								  <div class="input-group-append">
								    <button class="btn btn-primary" type="submit">Search</button>
								  </div>
								</div>
							</div>
						</form>
					</div>

					<h3>
						Welcome Admin1
					</h3> 
					<button type="button" class="btn btn-primary btn-lg mt-3">
						Generate Student History
					</button>
					<button type="button" class="btn btn-primary btn-lg mt-3">
						Generate Good Grade Student List
					</button>
					<button type="button" class="btn btn-primary btn-lg mt-3">
						Generate Most Popular Courses List
					</button>
					<button type="button" class="btn btn-primary btn-lg mt-3">
						Modify Payment
					</button>
					<button type="button" class="btn btn-primary btn-lg mt-3">
						Salary
					</button>
					<a href="approve-teacher"><button type="button" class="btn btn-primary btn-lg mt-3">
						Approve Teacher Account
					</button></a>
					<a href="approve-student"><button type="button" class="btn btn-primary btn-lg mt-3">
						Approve Student Account
					</button></a>
					<a href="{{route('createCourse.index')}}"><button type="button" class="btn btn-primary btn-lg mt-3">
						Create Course
					</button></a>
					<a href="{{route('courseList.index')}}"><button type="button" class="btn btn-primary btn-lg mt-3">
						Course List
					</button></a>
					<br><br>
				</div>
			</div>
		</div>

		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	</body>
</html>