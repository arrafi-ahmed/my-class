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

													<a class="demo" data-toggle="modal" href="#modal-container" id="modal">
			                                            <span class="h6 d-block">Demo Account</span>
			                                        </a>
												</td>
											</tr>
										</tbody>
									</table>
									
								</form>	
							</div>
						</div>
						
						<!-- demo modal -->
                        <div aria-hidden="true" aria-labelledby="myModalLabel" class="modal fade" id="modal-container" role="dialog">
                            <div class="modal-dialog modal-sm" role="document">
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <h5 class="modal-title" id="myModalLabel">Demo Credentials</h5>
                                        <button class="close" data-dismiss="modal" type="button" onclick = "$('.modal').hide()"><span aria-hidden="true">×</span></button>
                                    </div>

                                    <div class="modal-body">
                                        <p>
                                            <b>Demo Student:</b><br>
                                            <span>ID: student1</span><br>
                                            <span>PASSWORD: aA11!</span>
                                        </p> 
                                        <p>
                                            <b>Demo Teacher:</b><br>
                                            <span>ID: teacher1</span><br>
                                            <span>PASSWORD: aA11!</span>
                                        </p> 
                                        <p>
                                            <b>Demo Admin:</b><br>
                                            <span>ID: admin1</span><br>
                                            <span>PASSWORD: aA11!</span>
                                        </p> 
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

						@endsection