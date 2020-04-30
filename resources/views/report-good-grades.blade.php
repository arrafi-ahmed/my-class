						@extends('layout.master')

						@section('title', 'Good Grades')

						@section('main')

						<form method="post">
							@csrf
							<div class="input-group pt-3 pb-3">
								<label class="input-group-text" for="inputGroupSelect01">Course ID: </label>

								<input type="text" name="courseId" value="{{isset($results) ? $results[0]->courseId : '' }}" class="form-control">
								
								<div class="input-group-append">
							    	<button class="btn btn-primary" type="submit" name="generate" value="generate">Generate</button>
						    	</div>
							</div>
						</form>

						@if(isset($results))
						<table class="table">
							<tbody>
								<tr>
									<th>Course ID</th>
									<th>Student ID</th>
									<th>Result</th>
								</tr>

								<h5 class="pt-1 pb-2">Amount of students: @php echo count($results); @endphp</h5>
								@foreach($results as $result)
								<tr>
									<td>{{$result->courseId}}</td>
									<td>{{$result->studentId}}</td>
									<td>{{$result->result}}</td>
								</tr>
								@endforeach
							</tbody>
						</table>

						@elseif(!isset($results) && request('generate'))
						<h5>No result found!</h5>

						@endif
					
						@endsection