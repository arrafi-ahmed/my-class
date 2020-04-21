<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

		<title>Student History</title>
	</head>
	<body>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<h3>Student History</h3>

					<form method="post">
						@csrf
						<div class="input-group pt-3 pb-3">
							<label class="input-group-text" for="inputGroupSelect01">Student ID: </label>

							@if(session('type') == "student")
							<input type="text" name="studentId" value="{{ session('id') }}" class="form-control" readonly>

							@else
							<input type="text" name="studentId" value="{{isset($histories) ? $histories[0]->studentId : '' }}" class="form-control">
							@endif
							
							
							<div class="input-group-append">
						    	<button class="btn btn-primary" type="submit" name="generate" value="generate">Generate</button>
					    	</div>
						</div>
					</form>

					@if(isset($histories))
						<table class="table">
							<tbody>
								<tr>
									<th>Course ID</th>
									<th>Course Name</th>
									<th>Section</th>
									<th>Teacher ID</th>
									<th>Result</th>
								</tr>

								@foreach($histories as $history)
								<tr>
									<td>{{$history->courseId}}</td>
									<td>{{$history->name}}</td>
									<td>{{$history->section}}</td>
									<td>{{$history->teacherId}}</td>
									<td>{{$history->result}}</td>
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