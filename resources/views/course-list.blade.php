						@extends('layout.master')

						@section('title', 'Course List')

						@section('main')

						@if( session('type') == "admin" || session('type') == "teacher" )
						<a href="{{route('createCourse.index')}}"><button type="button" class="btn btn-primary float-right mb-2">
							Create Course
						</button></a>
						@endif

						@if(isset($courses))
						<table class="table table-responsive customList">
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
										Count
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
										{{$course->teacher_id}}
									</td>
									<td>
										{{$course->status == 0 ? "Closed" : "Open" }}
									</td>
									<td>
										<h5><span class="badge {{$course->count == $course->capacity ? 'badge-danger' : 'badge-success'}}">
										{{$course->count != $course->capacity ? ($course->count == null ? "0/$course->capacity" : "$course->count/$course->capacity") : "Full" }}
										</span></h5>
									</td>
									<td>
										@if(session('type') == "student")
											@php $found=0; $btn = "primary" @endphp

											@foreach ($enrolled as $enroll)
												@if(($enroll->course_id == $course->id) && ($enroll->status))
													@php $found = 1; $btn = "success"; break; @endphp
												@elseif(($enroll->course_id == $course->id) && (!$enroll->status))
													@php $found = 2; $btn = "warning"; break; @endphp
												@endif
											@endforeach

											@if($found == 0 && $course->status && ($course->count != $course->capacity))
											<a href="{{route('payment.enroll', $course->id)}}"><button type="button" class="btn btn-{{$btn}}" >
												Enroll
											</button></a>

											@elseif($found == 1)
											<a href="{{route('courseDashboard.index', $course->id)}}"><button type="button" class="btn btn-{{$btn}}">
												Enrolled
											</button></a>

											@else
											<a href="#"><button type="button" class="btn btn-{{$btn}}" disabled>
												{{ $found == 0 ? "Enroll" : "Pending" }}
											</button></a>
											@endif
										
										@elseif(session('type') == "admin")
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
										
										@if(session('type') == "teacher")
											<a href="{{route('courseDashboard.index', $course->id)}}"><button type="button" class="btn btn-primary">Dashboard</button></a>
										@endif
									</td>
								</tr>
								@endforeach
								
							</tbody>
						</table>

						@else
						<h5>No courses listed yet!</h5>

						@endif
						
						@endsection