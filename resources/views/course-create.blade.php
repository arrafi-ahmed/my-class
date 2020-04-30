						@extends('layout.master')

						@section('title', 'Create Course')

						@section('main')
						
						<form method="post">
							@csrf

							<table class="table">
								<tbody>
									<tr>
										<td>Name</td>
										<td>
											<input name="name" type="text" class="form-control" />
										</td>
									</tr>
									<tr>
										<td>Section</td>
										<td>
											<input name="section" type="text" class="form-control" />
										</td>
									</tr>
									<tr>
										<td>Time</td>
										<td>
											<input name="time" type="text" class="form-control" />
										</td>
									</tr>
									<tr>
										<td>Room No</td>
										<td>
											<input name="roomNo" type="text" class="form-control" />
										</td>
									</tr>
									<tr>
										<td>Capacity</td>
										<td>
											<input name="capacity" type="text" class="form-control" />
										</td>
									</tr>
									</tr>
									<tr>
										<td>Teacher Id</td>
										<td>
											<input name="teacherId" type="text" class="form-control" />
										</td>
									</tr>
									<tr>
										<td>Fee</td>
										<td>
											<input name="fee" type="text" class="form-control" />
										</td>
									</tr>
									<tr>
										<td></td>
										<td>
											<button type="submit" class="btn btn-primary btn-block">
												Create
											</button>
										</td>
									</tr>
								</tbody>
							</table>

						</form>
						
						@endsection