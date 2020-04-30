						@extends('layout.master')

						@section('title', 'Login')

						@section('main')
						
						<div class="row">
							<div class="col-lg-6 col-md-6 pt-3">
								<img class="img-fluid" src="{{url('img/loginBanner.jpg')}}">
							</div>
							<div class="col-lg-6 col-md-6 col-sm-10 pt-3">

								<form method="post">
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
												<td>Role</td>
												<td>
													<select class="custom-select" name="role">
													    <option value="teacher">Teacher</option>
													    <option value="student">Student</option>
													    <option value="admin">Admin</option>
													</select>
												</td>
											</tr>
											<tr>
												<td></td>
												<td>
													<button type="submit" class="btn btn-primary btn-block">
														Login
													</button>
												</td>
											</tr>
										</tbody>
									</table>
									
								</form>	
							</div>
						</div>
						
						@endsection