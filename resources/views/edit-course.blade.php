						@extends('layout.master')

						@section('title', 'Edit Course')

						@section('main')

						<form method="post">
							@csrf
							<div class="form-group">
								 
								<label for="exampleInputEmail1">
									ID
								</label>
								<input type="text" class="form-control" name="id" readonly value="{{$course->id}}"/>
							</div>
							<div class="form-group">
								 
								<label for="exampleInputEmail1">
									Name
								</label>
								<input type="text" class="form-control" name="name" value="{{$course->name}}"/>
							</div>
							<div class="form-group">
								 
								<label for="exampleInputEmail1">
									Section
								</label>
								<input type="text" class="form-control" name="section" value="{{$course->section}}"/>
							</div>
							<div class="form-group">
								 
								<label for="exampleInputPassword1">
									Time
								</label>
								<input type="text" class="form-control" name="time" value="{{$course->time}}"/>
							</div>
							<div class="form-group">
								 
								<label for="exampleInputPassword1">
									Room No
								</label>
								<input type="text" class="form-control" name="roomNo" value="{{$course->roomNo}}"/>
							</div>
							<div class="form-group">
								 
								<label for="exampleInputPassword1">
									Capacity
								</label>
								<input type="text" class="form-control" name="capacity" value="{{$course->capacity}}"/>
							</div>
							<div class="form-group">
								 
								<label for="exampleInputPassword1">
									Teacher ID
								</label>
								<input type="text" class="form-control" name="teacherId" value="{{$course->teacherId}}"/>
							</div>
							<div class="form-group">
								 
								<label for="exampleInputPassword1">
									Fee
								</label>
								<input type="text" class="form-control" name="fee" value="{{$course->fee}}"/>
							</div>
							<button type="submit" class="btn btn-primary">
								Save
							</button>
						</form>
						
						@endsection