<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

		<title>Edit Account</title>
	</head>
	<body>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<h2>Edit Account</h2>

					@if($session['type'] == "teacher")
					<form method="post" name="teacher">
						@csrf
						<table class="table">
							<tbody>
								<tr>
									<td>
										<img src="{{url('/').'/upload/teacherPhoto/'.$teacher->profilePhoto}}" class="img-thumbnail">	
									</td>
									<td>
										<span>Name: </span><h5><input type="text" class="form-control" name="name" value="{{$teacher->name}}"/></h5>
									</td>
								</tr>
								<tr>
									<td>
										ID: 	
									</td>
									<td>
										<input type="text" class="form-control" name="id" readonly value="{{$teacher->id}}"/>
									</td>
								</tr>
								<tr>
									<td>
										Password: 	
									</td>
									<td>
										<input type="password" class="form-control" name="password" value="{{$teacher->password}}"/>
									</td>
								</tr>
								<tr>
									<td>
										Department: 	
									</td>
									<td>
										<input type="text" class="form-control" name="dept" value="{{$teacher->dept}}"/>
									</td>
								</tr>
								<tr>
									<td>
										Qualification: 	
									</td>
									<td>
										<input type="text" class="form-control" name="qualification" value="{{$teacher->qualification}}"/>
									</td>
								</tr>
								<tr>
									<td>
										Email: 	
									</td>
									<td>
										<input type="email" class="form-control" name="email" value="{{$teacher->email}}"/>
									</td>
								</tr>
								<tr>
									<td>
										<button type="submit" class="btn btn-primary">
											Save
										</button> 	
									</td>
								</tr>
							</tbody>
						</table>
					</form>
					
					@elseif($session['type'] == "student")
					<form method="post" name="student">
						@csrf
						<table class="table">
							<tbody>
								<tr>
									<td>
										<img src="{{url('/').'/upload/studentPhoto/'.$student->profilePhoto}}" class="img-thumbnail">	
									</td>
									<td>
										<span>Name: </span><h5><input type="text" class="form-control" name="name"  value="{{$student->name}}"/></h5>
									</td>
								</tr>
								<tr>
									<td>
										ID: 	
									</td>
									<td>
										<input type="text" class="form-control" name="id" readonly  value="{{$student->id}}"/>
									</td>
								</tr>
								<tr>
									<td>
										Password: 	
									</td>
									<td>
										<input type="password" class="form-control" name="password"  value="{{$student->password}}"/>
									</td>
								</tr>
								<tr>
									<td>
										Department: 	
									</td>
									<td>
										<input type="text" class="form-control" name="dept"  value="{{$student->dept}}"/>
									</td>
								</tr>
								<tr>
									<td>
										Parent's Contact No: 	
									</td>
									<td>
										<input type="text" class="form-control" name="parentContact"  value="{{$student->parentContact}}"/>
									</td>
								</tr>
								<tr>
									<td>
										Email: 	
									</td>
									<td>
										<input type="email" class="form-control" name="email"  value="{{$student->email}}"/>
									</td>
								</tr>
								<tr>
									<td>
										<button type="submit" class="btn btn-primary">
											Submit
										</button>
									</td>
								</tr>
							</tbody>
						</table>
					</form>

					@endif
					
				</div>
			</div>
		</div>

		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	</body>
</html>