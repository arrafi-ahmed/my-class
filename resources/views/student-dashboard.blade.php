<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

		<title>Student Dashboard</title>
	</head>
	<body>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="search-student">
						<form method="post">
							<div class="input-group mb-3">
							  <input type="text" class="form-control" placeholder="Place course ID" aria-label="Recipient's username" aria-describedby="basic-addon2" name="searchResult">
							  <div class="input-group-append">
							    <button class="btn btn-primary" type="submit">Search Grade</button>
							  </div>
							</div>
						</form>
					</div>

					<h3>
						Welcome Student1
					</h3> 
					<button type="button" class="btn btn-primary btn-lg">
						Generate Student History
					</button>
					<button type="button" class="btn btn-primary btn-lg">
						Make Payment
					</button><br><br>

					<h4>Enrolled Courses:</h4>
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