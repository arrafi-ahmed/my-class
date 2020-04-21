<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

		<title>Good Student Grades</title>
	</head>
	<body>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<h3>Good Student Grades</h3>

					<form method="post">
						@csrf
						<div class="input-group pt-3 pb-3">
							<label class="input-group-text" for="inputGroupSelect01">Course ID: </label>

							<input type="text" name="courseId" value="{{isset($results) ? $results[0]->courseId : '' }}" class="form-control">
							
							<div class="input-group-append">
						    	<button class="btn btn-primary" type="submit" name="generate" value="generate">Generate</button>
					    	</div>
						</div>
					</form>

					@if(isset($results))
					<table class="table">
						<tbody>
							<tr>
								<th>Course ID</th>
								<th>Student ID</th>
								<th>Result</th>
							</tr>

							@foreach($results as $result)
							<tr>
								<td>{{$result->courseId}}</td>
								<td>{{$result->studentId}}</td>
								<td>{{$result->result}}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					@endif
					
				</div>
			</div>
		</div>

		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	</body>
</html>