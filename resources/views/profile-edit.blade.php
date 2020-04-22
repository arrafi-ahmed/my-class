						@extends('layout.master')

						@section('title', 'Edit Profile')

						@section('main')

						@if($session['type'] == "teacher")
						<form method="post" name="teacher">
							@csrf
							<table class="table profile">
								<tbody>
									<tr>
										<td>
											<img src="{{url('/').'/upload/teacherPhoto/'.$teacher->profilePhoto}}" class="img-thumbnail">	
										</td>
										<td>
											<span>Name: </span><h5><input type="text" class="form-control" name="name" value="{{$teacher->name}}"/></h5>
										</td>
									</tr>
									<tr>
										<td>
											ID: 	
										</td>
										<td>
											<input type="text" class="form-control" name="id" readonly value="{{$teacher->id}}"/>
										</td>
									</tr>
									<tr>
										<td>
											Password: 	
										</td>
										<td>
											<input type="password" class="form-control" name="password" value="{{$teacher->password}}"/>
										</td>
									</tr>
									<tr>
										<td>
											Department: 	
										</td>
										<td>
											<input type="text" class="form-control" name="dept" value="{{$teacher->dept}}"/>
										</td>
									</tr>
									<tr>
										<td>
											Qualification: 	
										</td>
										<td>
											<input type="text" class="form-control" name="qualification" value="{{$teacher->qualification}}"/>
										</td>
									</tr>
									<tr>
										<td>
											Email: 	
										</td>
										<td>
											<input type="email" class="form-control" name="email" value="{{$teacher->email}}"/>
										</td>
									</tr>
									<tr>
										<td>
											<button type="submit" class="btn btn-primary">
												Save
											</button> 	
										</td>
									</tr>
								</tbody>
							</table>
						</form>
						
						@elseif($session['type'] == "student")
						<form method="post" name="student">
							@csrf
							<table class="table profile">
								<tbody>
									<tr>
										<td>
											<img src="{{url('/').'/upload/studentPhoto/'.$student->profilePhoto}}" class="img-thumbnail">	
										</td>
										<td>
											<span>Name: </span><h5><input type="text" class="form-control" name="name"  value="{{$student->name}}"/></h5>
										</td>
									</tr>
									<tr>
										<td>
											ID: 	
										</td>
										<td>
											<input type="text" class="form-control" name="id" readonly  value="{{$student->id}}"/>
										</td>
									</tr>
									<tr>
										<td>
											Password: 	
										</td>
										<td>
											<input type="password" class="form-control" name="password"  value="{{$student->password}}"/>
										</td>
									</tr>
									<tr>
										<td>
											Department: 	
										</td>
										<td>
											<input type="text" class="form-control" name="dept"  value="{{$student->dept}}"/>
										</td>
									</tr>
									<tr>
										<td>
											Parent's Contact No: 	
										</td>
										<td>
											<input type="text" class="form-control" name="parentContact"  value="{{$student->parentContact}}"/>
										</td>
									</tr>
									<tr>
										<td>
											Email: 	
										</td>
										<td>
											<input type="email" class="form-control" name="email"  value="{{$student->email}}"/>
										</td>
									</tr>
									<tr>
										<td>
											<button type="submit" class="btn btn-primary">
												Submit
											</button>
										</td>
									</tr>
								</tbody>
							</table>
						</form>

						@endif
						
						@endsection