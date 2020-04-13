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
						Welcome {{$sessionId}}
					</h3> 
					<a href="{{route('courseList.index')}}"><button type="button" class="btn btn-primary btn-lg mt-3">
						Generate Student History
					</button></a>
					<a href="{{route('courseList.index')}}"><button type="button" class="btn btn-primary btn-lg mt-3">
						Generate Good Grade Student List
					</button></a>
					<a href="{{route('courseList.index')}}"><button type="button" class="btn btn-primary btn-lg mt-3">
						Course List
					</button></a>
					<br><br>

					<h4>Teaching Courses:</h4>
					<table class="table">
						<thead>
							<tr>
								<th>
									Course ID
								</th>
								<th>
									Name
								</th>
								<th>
									Section
								</th>
								<th>
									Time
								</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									1
								</td>
								<td>
									<a href="#"> Intro to Math</a>
								</td>
								<td>
									G
								</td>
								<td>
									Mon 01/04/2012
								</td>
							</tr>
							<tr>
								<td>
									2
								</td>
								<td>
									<a href="#"> Intro to English</a>
								</td>
								<td>
									C
								</td>
								<td>
									Mon 08/04/2012
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	</body>
</html>