						@extends('layout.master')

						@section('title', 'Dashboard')

						@section('main')

						@if($session['type'] == 'admin')<!-- Admin -->
						<h4>
							Welcome {{$session['id']}}
						</h4> 
						


						@elseif($session['type'] == 'teacher')<!-- Teacher -->
						<h4>
							Welcome {{$session['id']}}
						</h4> 
						<br><br>

						<h5>Registered Courses:</h5>
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
						<h4>
							Welcome {{$session['id']}}
						</h4> 
						<br><br>

						<h5>Enrolled Courses:</h5>
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

						@endsection