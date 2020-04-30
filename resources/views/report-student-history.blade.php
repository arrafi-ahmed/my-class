						@extends('layout.master')

						@section('title', 'Student History')

						@section('main')

						<form method="post">
							@csrf
							<div class="input-group pt-3 pb-3">
								<label class="input-group-text" for="inputGroupSelect01">Student ID: </label>

								@if(session('type') == "student")
								<input type="text" name="studentId" value="{{ session('id') }}" class="form-control" readonly>

								@else
								<input type="text" name="studentId" value="{{isset($histories) ? $histories[0]->studentId : '' }}" class="form-control">
								@endif
								
								<div class="input-group-append">
							    	<button class="btn btn-primary" type="submit" name="generate" value="generate">Generate</button>
						    	</div>
							</div>
						</form>

						@if(isset($histories))
						<table class="table">
							<tbody>
								<tr>
									<th>Course ID</th>
									<th>Course Name</th>
									<th>Section</th>
									<th>Teacher ID</th>
									<th>Result</th>
								</tr>

								@foreach($histories as $history)
								<tr>
									<td>{{$history->courseId}}</td>
									<td>{{$history->name}}</td>
									<td>{{$history->section}}</td>
									<td>{{$history->teacherId}}</td>
									<td>{{$history->result}}</td>
								</tr>
								@endforeach
							</tbody>
						</table>

						@elseif(!isset($histories) && request('generate'))
						<h5>No record found!</h5>

						@endif
					
						@endsection