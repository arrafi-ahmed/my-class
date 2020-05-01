						@extends('layout.master')

						@section('title', 'Dashboard')
						
						@section('main')

						@if(session('type') == 'admin')
							
						<table class="table table-bordered">
							<tbody>
								@foreach($data['table3'] as $row)
								<td><h5>{{$row['text']}}&nbsp;&nbsp;&nbsp;&nbsp;{{$row['value']}}</h5></td>
								@endforeach
							</tbody>
						</table>
						
						<div class="row">
							<div class="col-sm">
								<table class="table table-borderless table-custom">
									<thead class="thead-dark">
										<tr>
											<th>Lifetime:</th>
											<th></th>
										</tr>
									</thead>
									<tbody>
										@foreach($data['table1'] as $row)
										<tr>
											<td>
												{{$row['text']}}
											</td>
											<td>
												{{$row['value']}}
											</td>	
										</tr>	
										@endforeach
										
									</tbody>
								</table>
							</div>

							<div class="col-sm">
								<table class="table table-borderless table-custom">
									<thead class="thead-dark">
										<tr>
											<th>Last 24 hours:</th>
											<th></th>
										</tr>
									</thead>
									<tbody>
										@foreach($data['table2'] as $row)
										<tr>
											<td>
												{{$row['text']}}
											</td>
											<td>
												{{$row['value']}}
											</td>	
										</tr>	
										@endforeach
									</tbody>
								</table>
							</div>	
						</div>

						@elseif(session('type') == 'teacher')

							@if(isset($courses))
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

							@else
							<h5>No registered courses found!</h5>
							@endif

						@elseif(session('type') == 'student')<!-- Student -->
							@if(isset($courses))
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
										<th>
											Course Status
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
										<td>
											{{$course->status == 1 ? "Open" : "Closed" }}
										</td>
									</tr>
									@endforeach
									
								</tbody>
							</table>
							
							@else
							<h5>No enrolled courses found!</h5>
							@endif
						@endif

						@endsection