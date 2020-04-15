<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

		<title>Course List</title>
	</head>
	<body>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-12">
								<h3>
									Course List
								</h3> 

								@if($userType == "admin" ||$userType == "teacher" )
								<a href="{{route('createCourse.index')}}"><button type="button" class="btn btn-primary">
									Create Course
								</button></a>
								@endif

								<table class="table">
									<thead>
										<tr>
											<th>
												ID
											</th>
											<th>
												Name
											</th>
											<th>
												Section
											</th>
											<th>
												Teacher ID
											</th>
											<th>
												Status
											</th>
											<th>
												Action
											</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($courses as $course)
										<tr>
											<td>
												{{$course->id}}
											</td>
											<td>
												{{$course->name}}
											</td>
											<td>
												{{$course->section}}
											</td>
											<td>
												{{$course->teacherId}}
											</td>
											<td>
												{{$course->status == 0 ? "Closed" : "Open" }}
											</td>
											<td>
												@php
													if($userType == "student"){
														$found=false;
														foreach ($enrolled as $enroll){
															if($enroll->id == $course->id){
																$found = true; break;
															}
														}

														if(!$found && $course->status){
														@endphp
														<a href="{{route('courseList.enroll', $course->id)}}"><button type="button" class="btn btn-primary" >
															Enroll
														</button></a>
														@php
														}else{
														@endphp
														<a href="#"><button type="button" class="btn btn-primary" disabled>
															@php
															echo $course->status == false ? "Enroll" : "Enrolled";
															@endphp
														</button></a>
														@php
														}
													}
												@endphp
												
												@if($userType == "admin")
												<a href="{{route('editCourse.index', $course->id)}}"><button type="button" class="btn btn-primary">
													Edit
												</button></a>
												<a href="{{route('courseList.open', $course->id)}}"><button type="button" class="btn btn-success">
													Open
												</button></a>
												<a href="{{route('courseList.close', $course->id)}}"><button type="button" class="btn btn-warning">
													Close
												</button></a>
												<a href="{{route('courseList.delete', $course->id)}}"><button type="button" class="btn btn-danger">
													Delete
												</button></a>
												@endif

												@php 
												if($userType == "student") {
													if($found){ @endphp
														<a href="{{route('courseDashboard.index', $course->id)}}"><button type="button" class="btn btn-primary">Dashboard</button></a>
													@php }else{ @endphp
														<a href="#"><button type="button" class="btn btn-primary" disabled>Dashboard</button></a>
													@php }
												}else{ @endphp
													<a href="{{route('courseDashboard.index', $course->id)}}"><button type="button" class="btn btn-primary">Dashboard</button></a>
												@php } @endphp
											</td>
										</tr>
										@endforeach
										
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