<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

		<title>Make Payment</title>
	</head>
	<body>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					
					<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<h3>
				Make Payment
			</h3>

			<form role="form" class="form-inline">
				<div class="form-group">
					 
					<label for="exampleInputEmail1">
						Course ID
					</label>
					<input type="text" class="form-control" name="courseId" />
				</div>
				<div class="form-group">
					 
					<label for="exampleInputPassword1">
						Amount
					</label>
					<input type="text" class="form-control" name="amount" />
				</div>
				<div class="form-group">
					 
					<label for="exampleInputPassword1">
						Method
					</label>
					<input type="text" class="form-control" name="method" />
				</div>
				<div class="form-group">
					 
					<label for="exampleInputPassword1">
						Ref. No
					</label>
					<input type="text" class="form-control" name="refNo" />
				</div>
				
				<button type="submit" class="btn btn-primary">
					Pay
				</button>
			</form>

			<h5>Registered Courses</h5>
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
							Payment Status
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
							Valid
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
							Invalid
						</td>
					</tr>
				</tbody>
			</table>
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