<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

		<title>Dashboard</title>
	</head>
	<body>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					@if($session['type'] == "teacher" || $session['type'] == "admin")
					<div class="search">
						<form method="post" action="{{route('profile.search')}}">
							@csrf
							<div class="input-group">
							  <div class="input-group mb-3">
								  <input type="text" name="searchId" class="form-control" placeholder="Search by user ID" aria-label="Recipient's username" aria-describedby="basic-addon2">
								  <select class="custom-select" name="type">
								    <option value="teacher">Teacher</option>
								    <option value="student">Student</option>
								  </select>
								  <div class="input-group-append">
								    <button class="btn btn-primary" type="submit">Search</button>
								  </div>
								</div>
							</div>
						</form>
					</div>
					@endif


					@if($session['type'] == 'admin')<!-- Admin -->
					<h3>
						Welcome {{$session['id']}}
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
					<a href="{{route('payment.modify')}}"><button type="button" class="btn btn-primary btn-lg mt-3">
						Modify Payment
					</button></a>
					<a href="{{route('salary.index')}}"><button type="button" class="btn btn-primary btn-lg mt-3">
						Salary
					</button></a>
					
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


					@elseif($session['type'] == 'teacher')<!-- Teacher -->
					<h3>
						Welcome {{$session['id']}}
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
					<a href="{{route('profile.view', $session['id'])}}"><button type="button" class="btn btn-primary btn-lg mt-3">
						Profile
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
							@foreach($courses as $course)
							<tr>
								<td>
									{{$course->id}}
								</td>
								<td>
									<a href="{{route('courseDashboard.index', $course->id)}}">{{$course->name}}</a>
								</td>
								<td>
									{{$course->section}}
								</td>
								<td>
									{{$course->time}}
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>


					@elseif($session['type'] == 'student')<!-- Student -->
					<h3>
						Welcome {{$session['id']}}
					</h3> 
					<a href="{{route('courseList.index')}}"><button type="button" class="btn btn-primary btn-lg">
						Generate Student History
					</button></a>
					<a href="{{route('courseList.index')}}"><button type="button" class="btn btn-primary btn-lg">
						Make Payment
					</button></a>
					<a href="{{route('courseList.index')}}"><button type="button" class="btn btn-primary btn-lg">
						Course List
					</button></a>
					<a href="{{route('profile.view', $session['id'])}}"><button type="button" class="btn btn-primary btn-lg">
						Profile
					</button></a>
					<br><br>

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
							@foreach($courses as $course)
							<tr>
								<td>
									{{$course->id}}
								</td>
								<td>
									<a href="{{route('courseDashboard.index', $course->id)}}">{{$course->name}}</a>
								</td>
								<td>
									{{$course->section}}
								</td>
								<td>
									{{$course->time}}
								</td>
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