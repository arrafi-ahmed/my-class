						@extends('layout.master')

						@section('title', 'Popular Courses')

						@section('main')

						@if(isset($courses))
							
							<table class="table">
								<tbody>
									<tr>
										<th>Course ID</th>
										<th>Course Name</th>
										<th>Applied Students</th>
									</tr>

									@foreach($courses as $course)
									<tr>
										<td>{{$course->courseId}}</td>
										<td>{{$course->name}}</td>
										<td>{{$course->number}}</td>
									</tr>
									@endforeach
								</tbody>
							</table>
							
						@endif
					
						@endsection