						@extends('layout.master')

						@section('title', 'Contact')

						@section('main')

						@if (isset($teachers))
						<div class="table-responsive">
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
										<td><img class="img-thumbnail" src="{{url('/').'/upload/teacherPhoto/'.$teacher->profile_photo}}"></td>
										<td>{{$teacher->id}}</td>
										<td>{{$teacher->name}}</td>
										<td>{{$teacher->dept}}</td>
										<td>{{$teacher->email}}</td>
										<td>
											<a href="{{route('contact.content', $teacher->id)}}"><button type="submit" name="contact" value="contact" class="btn btn-primary">Contact</button></a>
										</td>
									</tr>
									@endforeach

								</tbody>
							</table>
						</div>
						
						@else
						<h5>No teachers listed yet!</h5>

						@endif

					@endsection