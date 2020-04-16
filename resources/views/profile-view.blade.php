<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

		<title>Profile</title>
	</head>
	<body>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<h2>Profile</h2>

					@if(isset($teacher->id))
						
					@if ($session['id'] == $teacher->id && $session['type'] !== 'admin')
						<a href="{{route('profile.edit')}}">
							<button type="button" class="btn btn-primary btn-lg mt-3">
							Edit Profile</button>
						</a>
					@endif
						
					<table class="table">
						<tbody>
							<tr>
								<td>
									<img src="{{url('/').'/upload/teacherPhoto/'.$teacher->profilePhoto}}" class="img-thumbnail">	
								</td>
								<td>
									<span>Name: </span><h5>{{$teacher->name}}</h5>
								</td>
							</tr>
							<tr>
								<td>
									ID: 	
								</td>
								<td>
									{{$teacher->id}}
								</td>
							</tr>
							<tr>
								<td>
									Department: 	
								</td>
								<td>
									{{$teacher->dept}}
								</td>
							</tr>
							<tr>
								<td>
									Qualification: 	
								</td>
								<td>
									{{$teacher->qualification}}
								</td>
							</tr>
							<tr>
								<td>
									Email: 	
								</td>
								<td>
									{{$teacher->email}}
								</td>
							</tr>
						</tbody>
					</table>

					
					@elseif(isset($student->id))
					
					@if ($session['id'] == $student->id && $session['type'] !== 'admin')
					<a href="{{route('profile.edit')}}"><button type="button" class="btn btn-primary btn-lg mt-3">
						Edit Profile
					</button></a>
					@endif
					
					<table class="table">
						<tbody>
							<tr>
								<td>
									<img src="{{url('/').'/upload/studentPhoto/'.$student->profilePhoto}}" class="img-thumbnail">	
								</td>
								<td>
									<span>Name: </span><h5>{{$student->name}}</h5>
								</td>
							</tr>
							<tr>
								<td>
									ID: 	
								</td>
								<td>
									{{$student->id}}
								</td>
							</tr>
							<tr>
								<td>
									Department: 	
								</td>
								<td>
									{{$student->dept}}
								</td>
							</tr>
							<tr>
								<td>
									Parent's Contact No: 	
								</td>
								<td>
									{{$student->parentContact}}
								</td>
							</tr>
							<tr>
								<td>
									Email: 	
								</td>
								<td>
									{{$student->email}}
								</td>
							</tr>
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