						@extends('layout.master')

						@section('title', 'Create Course')

						@section('main')
								
						<form method="post">
							@csrf
							<div class="form-group">
								 
								<label for="exampleInputEmail1">
									Name
								</label>
								<input type="text" class="form-control" name="name" />
							</div>
							<div class="form-group">
								 
								<label for="exampleInputEmail1">
									Section
								</label>
								<input type="text" class="form-control" name="section" />
							</div>
							<div class="form-group">
								 
								<label for="exampleInputPassword1">
									Time
								</label>
								<input type="text" class="form-control" name="time" />
							</div>
							<div class="form-group">
								 
								<label for="exampleInputPassword1">
									Room No
								</label>
								<input type="text" class="form-control" name="roomNo" />
							</div>
							<div class="form-group">
								 
								<label for="exampleInputPassword1">
									Capacity
								</label>
								<input type="text" class="form-control" name="capacity" />
							</div>
							<div class="form-group">
								 
								<label for="exampleInputPassword1">
									Teacher ID
								</label>
								<input type="text" class="form-control" name="teacherId" />
							</div>
							<div class="form-group">
								 
								<label for="exampleInputPassword1">
									Fee
								</label>
								<input type="text" class="form-control" name="fee" />
							</div>
							<button type="submit" class="btn btn-primary">
								Create
							</button>
						</form>
						
						@endsection