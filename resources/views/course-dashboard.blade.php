<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

		<title>Course Dashboard</title>
	</head>
	<body>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<h3>
						Course Dashboard
					</h3>
					<div class="row">
						<div class="col-md-6">
							<div class="row">
								<div class="col-md-2">
									<img alt="Bootstrap Image Preview" src="{{url('/').'/upload/teacherPhoto/'.$teacher->profilePhoto}}" class="img-thumbnail"/>
								</div>
								<div class="col-md-10">
									<h4>{{$course->name}}</h4>
									<h5>{{$teacher->name}}</h5>
									<h5>{{$teacher->email}}</h5>
										
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
					<div class="tabbable" id="tabs-843462">
						<ul class="nav nav-tabs">
							<li class="nav-item">
								<a class="nav-link active" href="#tab1" data-toggle="tab">Notes</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#tab2" data-toggle="tab">Notices</a>
							</li>

							@if($session['type'] == "admin" || ($session['type'] == "teacher" && $session['id'] == "$teacher->id"))
							<li class="nav-item">
								<a class="nav-link" href="#tab3" data-toggle="tab">Results</a>
							</li>
							@endif

						</ul>
						<div class="tab-content">
							<div class="tab-pane active" id="tab1">

								@if($session['type'] == "admin" || ($session['type'] == "teacher" && $session['id'] == "$teacher->id"))
								<div class="pt-3 pb-3">
									<form method="post" name="uploadNote">
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
										<tr>
											<td>
												<a href="#"> Assignment-B.zip</a>
											</td>
											<td>
												09-Apr-20 05:49:14
											</td>
											<td>
												3.097 Mb
											</td>
											
										</tr>
										<tr>
											<td>
												<a href="#"> Assignment-C.zip</a>
											</td>
											<td>
												10-Apr-20 05:49:14
											</td>
											<td>
												2.097 Mb
											</td>
											
										</tr>
										
									</tbody>
								</table>
							</div>

							<div class="tab-pane" id="tab2">
								@if($session['type'] == "admin" || $session['type'] == "teacher")
								<div class="pt-3 pb-3">
									<form method="post" name="createNotice">
										Create Notice: <textarea class="form-control" aria-label="With textarea"  id="createNotice"></textarea>
										<button type="submit" class="btn btn-primary">Create Notice</button>	
									</form>
								</div>
								@endif

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
										<tr>
											<td>
												Regarding Assignment Submission
											</td>
											<td>
												09-Apr-20 05:57:00
											</td>
										
										</tr>
										<tr>
											<td>
												Reqgarding Mid Quiz
											</td>
											<td>
												05-Apr-20 05:57:00
											</td>
										
										</tr>
										
									</tbody>
								</table>
							</div>

							@if($session['type'] == "admin" || $session['type'] == "teacher")
							<div class="tab-pane" id="tab3">
								<table class="table">
									<thead>
										<tr>
											<th>
												Student ID
											</th>
											<th>
												Grade
											</th>
											
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>
												student1
											</td>
											<td>
												<div class="form-group">
													<form method="post">
														<div class="input-group mb-3">
														  <input type="text" name="grade" class="form-control" placeholder="Place Grade" aria-label="Grade" aria-describedby="basic-addon2" value="A">
														  <div class="input-group-append">
														    <button class="btn btn-primary" type="submit">Save</button>
														  </div>
														</div>

													</form>	
												</div>
												
											</td>
											
										
										</tr>
										<tr>
											<td>
												student2
											</td>
											<td>
												<form method="post">
													<div class="input-group mb-3">
													  <input type="text" name="grade" class="form-control" placeholder="Place Grade" aria-label="Grade" aria-describedby="basic-addon2" value="B">
													  <div class="input-group-append">
													    <button class="btn btn-primary" type="submit">Save</button>
													  </div>
													</div>
													
												</form>	
											</td>
										
										</tr>
										
									</tbody>
								</table>
							</div>
							@endif

						</div>
					</div>
					
				</div>
			</div>
		</div>

		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	</body>
</html>