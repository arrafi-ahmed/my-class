						@extends('layout.master')

						@section('title', 'Course Dashboard')

						@section('main')

						@if(isset($course))
						<div class="row">
							<div class="col-md-6">
								<div class="row">
									<div class="col-md-3">
										<img alt="Bootstrap Image Preview" src="{{url('/').'/upload/teacherPhoto/'.$teacher->profilePhoto}}" class="img-thumbnail"/>
									</div>
									<div class="col-md-9">
										<h4>{{$course->name}} [{{$course->section}}]</h4>
										<h6>{{$teacher->name}}</h6>
										<h6>{{$teacher->email}}</h6>
											
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<table class="table">
									<thead>
										<tr>
											<th>
												Time
											</th>
											<th>
												Room No
											</th>
											
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>
												{{$course->time}}	
											</td>
											<td>
												{{$course->roomNo}}
											</td>
											
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						@endif

						<div class="tabbable" id="tabs-843462">
							<ul class="nav nav-tabs">
								<li class="nav-item">
									<a class="nav-link active" href="#tab1" data-toggle="tab">Note</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="#tab2" data-toggle="tab">Notice</a>
								</li>

								<li class="nav-item">
									<a class="nav-link" href="#tab3" data-toggle="tab">Result</a>
								</li>
							</ul>
							<div class="tab-content">
								<div class="tab-pane active" id="tab1">

									@if(session('type') == "admin" || (session('type') == "teacher" && session('id') == "$teacher->id"))
									<div class="pt-3 pb-3">

										<form method="post" action="{{route('courseDashboard.createNote', $course->id)}}" enctype="multipart/form-data">
											@csrf
											<div class="input-group">
											  <div class="custom-file">
											    <input type="file" class="custom-file-input" name="uploadNote">
											    <label class="custom-file-label" for="inputGroupFile04">Choose Note</label>
											  </div>
											  <div class="input-group-append">
											    <button class="btn btn-primary" type="submit">Upload Note</button>
											  </div>
											</div>	
										</form>

									</div>
									@endif

									@if (count($notes)>0)
									<table class="table">
										<thead>
											<tr>
												<th>
													Title
												</th>
												<th>
													Upload Date
												</th>
												<th>
													Size
												</th>
												
											</tr>
										</thead>
										<tbody>
											@foreach ($notes as $note)
											<tr>
												<td>
													<a href="{{route('courseDashboard.downloadNote', $note->filename)}}">{{$note->filename}}</a>
												</td>
												<td>
													{{$note->date}}
												</td>
												<td>
													{{$note->size}} MB
												</td>
												
											</tr>
											@endforeach
										</tbody>
									</table>
									
									@else
									<h6 class="mt-2">No notes uploaded yet!</h6>
									@endif

								</div>

								<div class="tab-pane" id="tab2">

									@if(session('type') == "admin" || (session('type') == "teacher" && session('id') == "$teacher->id"))
									<div class="pt-3 pb-3">
										<form method="post" action="{{route('courseDashboard.createNotice', $course->id)}}">
											@csrf
											Create Notice: 
											<textarea class="form-control" aria-label="With textarea"  name="content"></textarea>
											<button type="submit" class="btn btn-primary">Create Notice</button>	
										</form>
									</div>
									@endif

									@if (count($notices)>0)
									<table class="table">
										<thead>
											<tr>
												<th>
													Subject
												</th>
												<th>
													Post Date
												</th>
												
											</tr>
										</thead>
										<tbody>
											@foreach ($notices as $notice)
											<tr>
												<td>
													{{$notice->content}}
												</td>
												<td>
													{{$notice->date}}
												</td>
											
											</tr>
											@endforeach
											
										</tbody>
									</table>
									
									@else
									<h6 class="mt-2">No notice published yet!</h6>

									@endif
								</div>

								<div class="tab-pane" id="tab3">
									@if(session('type') == "admin" || (session('type') == "teacher" && session('id') == "$teacher->id"))
									@if(count($students)>0)
									<table class="table">
										<thead>
											<tr>
												<th>
													Student ID
												</th>
												<th>
													Name
												</th>
												<th>
													Grade
												</th>
												
											</tr>
										</thead>
										<tbody>
											
											@foreach($students as $student)
											
											@php $grade = null; $gradeId = null; $update = false; @endphp
											@foreach($results as $result)
												@if($result->studentId == $student->studentId)

													@php $grade = $result->result; $gradeId = $result->id; $update = true; break; @endphp

												@endif
											@endforeach
											
											<tr>
												<td>
													{{$student->studentId}}
												</td>
												<td>
													{{$student->name}}
												</td>
												<td>
													<div class="form-group">
														<form method="post" action="{{route('courseDashboard.saveResult', $course->id)}}">
															@csrf
															<div class="input-group mb-3">
															  <input type="hidden" name="update" class="form-control" aria-label="Grade" aria-describedby="basic-addon2" value="{{$update}}">
															  <input type="hidden" name="studentId" class="form-control" aria-label="Grade" aria-describedby="basic-addon2" value="{{$student->studentId}}">
															  <input type="hidden" name="resultId" class="form-control" aria-label="Grade" aria-describedby="basic-addon2" value="{{$gradeId}}">
															  <input type="text" name="grade" class="form-control" placeholder="Place Grade" aria-label="Grade" aria-describedby="basic-addon2" value="{{$grade}}">
															  <div class="input-group-append">
															    <button class="btn btn-primary" type="submit">Save</button>
															  </div>
															</div>

														</form>	
													</div>
													
												</td>
											</tr>
											@endforeach
										</tbody>
									</table>
									
									@else
									<h6 class="mt-2">No student found!</h6>

									@endif
									@endif

									<h6 class="text-center">
									@if(session('type') == "student")
										@if(isset($students->result))
											@php echo "<br> Grade: ".$studentResult->result ; @endphp
										@else
											@php echo "<br> Result not available. "; @endphp
										@endif
									@endif
									</h6>
								</div>
								
							</div>
						</div>
						
						@endsection