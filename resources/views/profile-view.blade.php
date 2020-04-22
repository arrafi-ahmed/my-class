						@extends('layout.master')

						@section('title', 'Profile')

						@section('main')

						@if(isset($teacher->id))
							
						@if ($session['id'] == $teacher->id && $session['type'] !== 'admin')
							<a href="{{route('profile.edit')}}">
								<button type="button" class="btn btn-primary mb-2 float-right">
								Edit Profile</button>
							</a>
						@endif
							
						<table class="table profile">
							<tbody>
								<tr>
									<td>
										<img src="{{url('/').'/upload/teacherPhoto/'.$teacher->profilePhoto}}" class="img-thumbnail">	
									</td>
									<td>
										<span>Name: </span><h5>{{$teacher->name}}</h5>
									</td>
								</tr>
								<tr>
									<td>
										ID: 	
									</td>
									<td>
										{{$teacher->id}}
									</td>
								</tr>
								<tr>
									<td>
										Department: 	
									</td>
									<td>
										{{$teacher->dept}}
									</td>
								</tr>
								<tr>
									<td>
										Qualification: 	
									</td>
									<td>
										{{$teacher->qualification}}
									</td>
								</tr>
								<tr>
									<td>
										Email: 	
									</td>
									<td>
										{{$teacher->email}}
									</td>
								</tr>
							</tbody>
						</table>

						
						@elseif(isset($student->id))
						
						@if ($session['id'] == $student->id && $session['type'] !== 'admin')
						<a href="{{route('profile.edit')}}"><button type="button" class="btn btn-primary float-right mb-2">
							Edit Profile
						</button></a>
						@endif
						
						<table class="table profile">
							<tbody>
								<tr>
									<td>
										<img src="{{url('/').'/upload/studentPhoto/'.$student->profilePhoto}}" class="img-thumbnail">	
									</td>
									<td>
										<span>Name: </span><h5>{{$student->name}}</h5>
									</td>
								</tr>
								<tr>
									<td>
										ID: 	
									</td>
									<td>
										{{$student->id}}
									</td>
								</tr>
								<tr>
									<td>
										Department: 	
									</td>
									<td>
										{{$student->dept}}
									</td>
								</tr>
								<tr>
									<td>
										Parent's Contact No: 	
									</td>
									<td>
										{{$student->parentContact}}
									</td>
								</tr>
								<tr>
									<td>
										Email: 	
									</td>
									<td>
										{{$student->email}}
									</td>
								</tr>
							</tbody>
						</table>
						@endif
						
						@endsection