						@extends('layout.master')

						@section('title', 'Register')

						@section('main')

						<div class="row">
							<div class="col-lg-6 col-md-6">
								<img class="img-fluid" src="{{url('img/registerBanner.jpg')}}">
							</div>
							<div class="col-lg-6 col-md-6 col-sm-10">

								<div class="tabbable" id="tabs-963489">
									<ul class="nav nav-tabs">
										<li class="nav-item">
											<a class="nav-link active show" href="#tab1" data-toggle="tab">Teacher</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="#tab2" data-toggle="tab">Student</a>
										</li>
									</ul>

									<!-- Teacher -->
									<div class="tab-content">
										<div class="tab-pane active" id="tab1">
											<form method="post" action="registerTeacher" enctype="multipart/form-data" name="teacher">
												@csrf

												<table class="table">
													<tbody>
														<tr>
															<td>ID</td>
															<td>
																<input name="id" type="text" class="form-control" />
															</td>
														</tr>
														<tr>
															<td>Password</td>
															<td>
																<input name="password" type="password" class="form-control" />
															</td>
														</tr>
														<tr>
															<td>Name</td>
															<td>
																<input type="text" class="form-control" name="name" />
															</td>
														</tr>
														<tr>
															<td>Department</td>
															<td>
																<input type="text" class="form-control" name="dept" />
															</td>
														</tr>
														<tr>
															<td>Qualification</td>
															<td>
																<input type="text" class="form-control" name="qualification" />
															</td>
														</tr>
														<tr>
															<td>Email</td>
															<td>
																<input type="email" class="form-control" name="email" />
															</td>
														</tr>
														<tr>
															<td>Salary</td>
															<td>
																<input type="text" class="form-control" name="salary" />
															</td>
														</tr>
														<tr>
															<td>Profile Photo</td>
															<td>
																<input type="file" class="form-control-file" name="profilePhoto" />
															</td>
														</tr>
														<tr>
															<td></td>
															<td>
																<button type="submit" class="btn btn-primary btn-block">
																	Register
																</button>
															</td>
														</tr>
													</tbody>
												</table>
											</form>
										</div>

										<!-- Student -->
										<div class="tab-pane" id="tab2">
											<form method="post" action="registerStudent" enctype="multipart/form-data" name="student">
												@csrf

												<table class="table">
													<tbody>
														<tr>
															<td>ID</td>
															<td>
																<input name="id" type="text" class="form-control" />
															</td>
														</tr>
														<tr>
															<td>Password</td>
															<td>
																<input name="password" type="password" class="form-control" />
															</td>
														</tr>
														<tr>
															<td>Name</td>
															<td>
																<input type="text" class="form-control" name="name" />
															</td>
														</tr>
														<tr>
															<td>Department</td>
															<td>
																<input type="text" class="form-control" name="dept" />
															</td>
														</tr>
														<tr>
															<td>Parent's Phone</td>
															<td>
																<input type="text" class="form-control" name="parentContact" />
															</td>
														</tr>
														<tr>
															<td>Email</td>
															<td>
																<input type="email" class="form-control" name="email" />
															</td>
														</tr>
														<tr>
															<td>Profile Photo</td>
															<td>
																<input type="file" class="form-control-file" name="profilePhoto" />
															</td>
														</tr>
														<tr>
															<td></td>
															<td>
																<button type="submit" class="btn btn-primary btn-block">
																	Register
																</button>
															</td>
														</tr>
													</tbody>
												</table>
											</form>
										</div>
									</div>
								</div>

							</div>
						</div>

						@endsection