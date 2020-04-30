						@extends('layout.master')

						@section('title', 'Teacher List')

						@section('main')

						@if(isset($teachers))
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
								@foreach ($teachers as $teacher)
								<tr>
									<td>
										{{$teacher->id}}
									</td>
									<td>
										{{$teacher->name}}
									</td>
									<td>
										{{$teacher->dept}}
									</td>
									<td>
										{{$teacher->valid ? "Approved" : "Blocked"}}
									</td>
									<td>
										<form method="post">

											@csrf
											<button type="submit" name="approve" value="{{$teacher->id}}" class="btn btn-success">
												Approve
											</button>
											
											<button type="submit" name="block" value="{{$teacher->id}}" class="btn btn-warning">
												Block
											</button>
											
											<button type="submit" name="delete" value="{{$teacher->id}}" class="btn btn-danger">
												Delete
											</button>

										</form>
									</td>
								</tr>
								@endforeach
								
							</tbody>
						</table>
						
						@else
						<h5>No teacher found!</h5>
						
						@endif
						
						@endsection