						@extends('layout.master')

						@section('title', 'Contact')

						@section('main')

								@if (isset($teachers))
								<table class="table contact">
									<tbody>
										<tr>
											<th>Photo</th>
											<th>ID</th>
											<th>Name</th>
											<th>Department</th>
											<th>Email</th>
											<th>Action</th>
										</tr>
										
										@foreach($teachers as $teacher)
										<tr>
											<td><img class="img-thumbnail" src="{{url('/').'/upload/teacherPhoto/'.$teacher->profilePhoto}}"></td>
											<td>{{$teacher->id}}</td>
											<td>{{$teacher->name}}</td>
											<td>{{$teacher->dept}}</td>
											<td>{{$teacher->email}}</td>
											<td>
												<form method="post" action="{{route('contact.content', $teacher->id)}}">
													@csrf
													<button type="submit" name="contact" value="contact" class="btn btn-primary">Contact</button>
												</form>
											</td>
										</tr>
										@endforeach

									</tbody>
								</table>
								@endif

							@endsection