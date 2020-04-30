						@extends('layout.master')

						@section('title', 'Salary Record')

						@section('main')

						@if(isset($error))
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<ul>
								<li>{{$error}}</li>
							</ul>
						</div>
						@endif

						@if(isset($success))
						<div class="alert alert-success alert-dismissible fade show" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							{{$success}}
						</div>
						@endif

						<form method="post">
							@csrf
							<div class="input-group pt-3 pb-3">
								<label class="input-group-text" for="inputGroupSelect01">Teacher ID: </label>
								<input type="text" name="teacherId" value="{{ isset($teacher->id) ? $teacher->id : '' }}" class="form-control" aria-describedby="basic-addon2">
								
								<div class="input-group-append">
							    	<button class="btn btn-primary" type="submit" name="find" value="find">Find</button>
							    	<button class="btn btn-success ml-1" type="submit" name="pay" value="pay">Pay</button>
								</div>

								
							</div>
						</form>
							
						@isset($teacher)
						<div class="teacherInfo">
							<img class="img-thumbnail d-inline-block mr-4 mb-3" src="{{url('/').'/upload/teacherPhoto/'.$teacher->profilePhoto}}">
							<div class="d-inline-block">
								<b>Teacher ID:</b> {{ $teacher->id }}<br>
								<b>Name:</b> {{ $teacher->name }}<br>
								<b>Dept:</b> {{ $teacher->dept }}<br>
								<b>Salary:</b> {{ $teacher->salary }}<br>
								<b>Email:</b> {{ $teacher->email }}<br>
							</div>
						</div>
						@endisset

						@if(isset($salaries))
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th>
											Salary ID
										</th>
										<th>
											Amount
										</th>
										<th>
											Date
										</th>
										<th>
											Status
										</th>
										<th>
											Action
										</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($salaries as $salary)
									<form method="post">
										@csrf
										<tr>
											<input type="hidden" name="teacherId" value="{{ isset($teacher->id) ? $teacher->id : '' }}" class="form-control">
											<td>
												<input class="form-control" type="text" name="salaryId" value="{{ isset($salary->id) ? $salary->id : '' }}" readonly> 
											</td>
											<td>
												<input class="form-control" type="text" name="amount" value="{{ isset($salary->amount) ? $salary->amount : '' }}"> 
											</td>
											<td>
												<input class="form-control" type="text" name="date" value="{{ isset($salary->date) ? $salary->date : '' }}" readonly> 
											</td>
											<td>
												<select name="status" class="custom-select" id="inputGroupSelect01">
												    <option value="1" {{$salary->status == 1 ? 'selected' : '' }}>Paid</option>
												    <option value="0" {{$salary->status == 0 ? 'selected' : '' }}>Unpaid</option>
												</select>
											</td>
											<td>
												<button name="save" value="save" class="btn btn-primary" type="submit">Save</button>
											</td>
										</tr>
									</form>
									@endforeach
								</tbody>
							</table>
						</div>

						@elseif(!isset($salaries) && request('find'))
						<h5>No salary record found!</h5>
						@endif
						
						@endsection