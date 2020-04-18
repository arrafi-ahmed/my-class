<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

		<title>Make Payment</title>
	</head>
	<body>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">

					@if(isset($course->id))
					<h3>
						Make Payment
					</h3>
					<form method="post" action="{{route('payment.create', $course->id)}}">
						@csrf
						<table class="table">
							<thead>
								<tr>
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
										Action
									</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>
										<input type="text" class="form-control" name="courseId" value="{{$course->id}}" readonly />
									</td>
									<td>
										<input type="text" class="form-control" name="fee" value="{{$course->fee}}" readonly />
									</td>
									<td>
										<input type="text" class="form-control" name="amount" />
									</td>
									<td>
										<input type="text" class="form-control" name="method" />
									</td>
									<td>
										<input type="text" class="form-control" name="refNo" />
									</td>
									<td>
										<button type="submit" class="btn btn-primary">
											Pay
										</button>
									</td>
								</tr>
								
							</tbody>
						</table>
					</form>
					@endif
					
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