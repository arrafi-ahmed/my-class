						@extends('layout.master')

						@section('title', 'Course List')

						@section('main')

						@if($userType == "admin" ||$userType == "teacher" )
						<a href="{{route('createCourse.index')}}"><button type="button" class="btn btn-primary float-right mb-2">
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
										@if($userType == "student")
											@php $found=0; $btn = "primary" @endphp

											@foreach ($enrolled as $enroll)
												@if(($enroll->courseId == $course->id) && ($enroll->status))
													@php $found = 1; $btn = "success"; break @endphp
												@elseif(($enroll->courseId == $course->id) && (!$enroll->status))
													@php $found = 2; $btn = "warning"; break @endphp
												@endif
											@endforeach

											@if($found == 0 && $course->status)
											<a href="{{route('payment.enroll', $course->id)}}"><button type="button" class="btn btn-{{$btn}}" >
												Enroll
											</button></a>
											@else
											<a href="#"><button type="button" class="btn btn-{{$btn}}" disabled>
												{{ $course->status == false ? "Enroll" : ($found == 1 ? "Enrolled" : "Pending") }}
											</button></a>
											@endif
										@endif
										
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

										@if($userType == "student")
											@if($found == 1)
												<a href="{{route('courseDashboard.index', $course->id)}}"><button type="button" class="btn btn-primary">Dashboard</button></a>
											@else
												<a href="#"><button type="button" class="btn btn-primary" disabled>Dashboard</button></a>
											@endif
										@else
											<a href="{{route('courseDashboard.index', $course->id)}}"><button type="button" class="btn btn-primary">Dashboard</button></a>
										@endif
									</td>
								</tr>
								@endforeach
								
							</tbody>
						</table>
						
						@endsection