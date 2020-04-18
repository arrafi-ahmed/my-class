<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

		<title>Modify Payment</title>
	</head>
	<body>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">

					<h3>
						Modify Payment
					</h3>
					<form method="post" action="{{route('payment.modify')}}">
						@csrf
						<table class="table">
							<thead>
								<tr>
									<th>
										Payment ID
									</th>
									<th>
										Course ID
									</th>
									<th>
										Fee
									</th>
									<th>
										Amount
									</th>
									<th>
										Method
									</th>
									<th>
										Ref. No
									</th>
									<th>
										Payment Status
									</th>
									<th>
										Action
									</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<form method="post" action="{{route('payment.modify')}}">
										@csrf
										<td>
											<input type="text" class="form-control" name="paymentId"  value="{{isset($find->id) ? $find->id : ''}}"/>
											<button class="btn btn-primary" type="submit" name="find" value="Find">Find</button>
										</td>
										<td>
											<input type="text" class="form-control" name="courseId" value="{{isset($find->courseId) ? $find->courseId : ''}}" readonly/>
										</td>
										<td>
											<input type="text" class="form-control" name="fee" value="{{isset($find->fee) ? $find->fee : ''}}" readonly/>
										</td>
										<td>
											<input type="text" class="form-control" name="amount" value="{{isset($find->amount) ? $find->amount : ''}}" />
										</td>
										<td>
											<input type="text" class="form-control" name="method" value="{{isset($find->method) ? $find->method : ''}}" />
										</td>
										<td>
											<input type="text" class="form-control" name="refNo" value="{{isset($find->refNo) ? $find->refNo : ''}}" />
										</td>
										<td>
											<select class="form-control" name="status">
												<option value="1" {{isset($find->status) && $find->status == 1 ? 'selected' : ''}}>
													Paid
												</option>
												<option value="0" {{isset($find->status) && $find->status == 0 ? 'selected' : ''}}>
													Unpaid
												</option>
											</select>
										</td>
										<td>
											<button type="submit" class="btn btn-primary" name="update" value="update">Update</button>
										</td>
									</form>
								</tr>
								
							</tbody>
						</table>
					</form>
					
					<h3>Recent Payments</h3>
					<table class="table">
						<thead>
							<tr>
								<th>
									Payment ID
								</th>
								<th>
									Amount
								</th>
								<th>
									Method
								</th>
								<th>
									Student ID
								</th>
								<th>
									Course ID
								</th>
								<th>
									Name
								</th>
								<th>
									Section
								</th>
								<th>
									Date
								</th>
								<th>
									Payment Status
								</th>
							</tr>
						</thead>
						<tbody>
							@foreach($payments as $payment)
							<tr>
								<td>
									{{$payment->id}}
								</td>
								<td>
									{{$payment->amount}}
								</td>
								<td>
									{{$payment->method}}
								</td>
								<td>
									{{$payment->studentId}}
								</td>
								<td>
									{{$payment->courseId}}
								</td>
								<td>
									{{$payment->name}}
								</td>
								<td>
									{{$payment->section}}
								</td>
								<td>
									{{$payment->date}}
								</td>
								<td>
									{{$payment->status == 1 ? "Paid" : "Unpaid" }}
								</td>
							</tr>
							@endforeach
							
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	</body>
</html>