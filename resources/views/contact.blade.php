<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

		<title>Contact</title>
	</head>
	<body>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-12">
								<h3>
									Contact
								</h3>

								@if (isset($teachers))
								<table class="table">
									<tbody>
										<tr>
											<th>Photo</th>
											<th>ID</th>
											<th>Name</th>
											<th>Department</th>
											<th>Email</th>
											<th>Action</th>
										</tr>
										
										@foreach($teachers as $teacher)
										<tr>
											<td><img class="img-thumbnail" src="{{url('/').'/upload/teacherPhoto/'.$teacher->profilePhoto}}"></td>
											<td>{{$teacher->id}}</td>
											<td>{{$teacher->name}}</td>
											<td>{{$teacher->dept}}</td>
											<td>{{$teacher->email}}</td>
											<td>
												<form method="post" action="{{route('contact.content', $teacher->id)}}">
													@csrf
													<button type="submit" name="contact" value="contact" class="btn btn-primary">Contact</button>
												</form>
											</td>
										</tr>
										@endforeach

									</tbody>
								</table>
								@endif

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