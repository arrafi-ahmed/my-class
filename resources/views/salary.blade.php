<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

		<title>Salary Record</title>
	</head>
	<body>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					
					<h4>Salary Record</h4>
					<form method="post">
						@csrf
						<div class="input-group pt-3 pb-3">
							<label class="input-group-text" for="inputGroupSelect01">Teacher ID: </label>
							<input type="text" name="teacherId" value="{{ isset($teacher->id) ? $teacher->id : '' }}" class="form-control" aria-describedby="basic-addon2">
							
							<div class="input-group-append">
						    	<button class="btn btn-primary" type="submit" name="find" value="find">Find</button>
						    	<button class="btn btn-success" type="submit" name="pay" value="pay">Pay</button>
							</div>

							
						</div>
					</form>
						
					@if(isset($teacher))
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
					@endif

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
					@endif
				</div>
			</div>
		</div>

		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	</body>
</html>