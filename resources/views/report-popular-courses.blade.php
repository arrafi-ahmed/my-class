						@extends('layout.master')

						@section('title', 'Popular Courses')

						@section('main')

						@if(isset($courses))
						
						<div class="table-responsive">	
							<table class="table">
								<tbody>
									<tr>
										<th>Course ID</th>
										<th>Course Name</th>
										<th>Applied Students</th>
									</tr>

									@foreach($courses as $course)
									<tr>
										<td>{{$course->course_id}}</td>
										<td>{{$course->name}}</td>
										<td>{{$course->number}}</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
						
						@else
						<h5>No courses found!</h5>
						
						@endif
					
						@endsection