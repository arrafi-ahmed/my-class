						@extends('layout.master')

						@section('title', 'Edit Course')

						@section('main')

						@isset($course)
						<form method="post">
							@csrf

							<table class="table">
								<tbody>
									<tr>
										<td>ID</td>
										<td>
											<input name="id" type="text" class="form-control" value="{{$course->id}}" readonly />
										</td>
									</tr>
									<tr>
										<td>Name</td>
										<td>
											<input name="name" type="text" class="form-control" value="{{$course->name}}"/>
										</td>
									</tr>
									<tr>
										<td>Section</td>
										<td>
											<input name="section" type="text" class="form-control" value="{{$course->section}}"/>
										</td>
									</tr>
									<tr>
										<td>Time</td>
										<td>
											<input name="time" type="text" class="form-control" value="{{$course->time}}"/>
										</td>
									</tr>
									<tr>
										<td>Room No</td>
										<td>
											<input name="roomNo" type="text" class="form-control" value="{{$course->roomNo}}"/>
										</td>
									</tr>
									<tr>
										<td>Capacity</td>
										<td>
											<input name="capacity" type="text" class="form-control" value="{{$course->capacity}}"/>
										</td>
									</tr>
									</tr>
									<tr>
										<td>Teacher Id</td>
										<td>
											<input name="teacherId" type="text" class="form-control" value="{{$course->teacherId}}"/>
										</td>
									</tr>
									<tr>
										<td>Fee</td>
										<td>
											<input name="fee" type="text" class="form-control" value="{{$course->fee}}"/>
										</td>
									</tr>
									<tr>
										<td></td>
										<td>
											<button type="submit" class="btn btn-primary btn-block">
												Save
											</button>
										</td>
									</tr>
								</tbody>
							</table>
						</form>
						@endisset
						@endsection