						@extends('layout.master')

						@section('title', 'Student List')

						@section('main')

						@if(isset($students))
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
										Dept
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
								@foreach ($students as $student)
								<tr>
									<td>
										{{$student->id}}
									</td>
									<td>
										{{$student->name}}
									</td>
									<td>
										{{$student->dept}}
									</td>
									<td>
										{{$student->valid ? "Approved" : "Blocked"}}
									</td>
									<td>
										<form method="post">

											@csrf
											<button type="submit" name="approve" value="{{$student->id}}" class="btn btn-success">
												Approve
											</button>
											
											<button type="submit" name="block" value="{{$student->id}}" class="btn btn-warning">
												Block
											</button>

											<button type="submit" name="delete" value="{{$student->id}}" class="btn btn-danger">
												Delete
											</button>

										</form>
									</td>
								</tr>
								@endforeach
								
							</tbody>
						</table>

						@else
						<h5>No student found!</h5>

						@endif

						@endsection