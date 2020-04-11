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
					
					<h5>Modify Payment</h5>
					<div class="table-responsive">
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
										Ref. No
									</th>
									<th>
										Course ID
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
								<tr>
									<form method="post">
										<td>
											<input type="text" name="paymentId" value="1" readonly> 
										</td>
										<td>
											<input type="text" name="amount" value="3000"> 
										</td>
										<td>
											<input type="text" name="method" value="bKash"> 
										</td>
										<td>
											<input type="text" name="refNo" value="003235656"> 
										</td>
										<td>
											<input type="text" name="courseId" value="1"> 
										</td>
										<td>
											<input type="text" name="date" value="20/01/20" readonly> 
										</td>
										<td>
											<select class="custom-select" id="inputGroupSelect01">
											    <option value="1">Paid</option>
											    <option value="2">Unpaid</option>
											</select>
										</td>
										<td>
											<button class="btn btn-primary" type="submit">Save</button>
										</td>
									</form>
								</tr>
								<tr>
									<form method="post">
										<td>
											<input type="text" name="paymentId" value="2" readonly> 
										</td>
										<td>
											<input type="text" name="amount" value="4000"> 
										</td>
										<td>
											<input type="text" name="method" value="bKash"> 
										</td>
										<td>
											<input type="text" name="refNo" value="443235656"> 
										</td>
										<td>
											<input type="text" name="courseId" value="2"> 
										</td>
										<td>
											<input type="text" name="date" value="20/02/20" readonly> 
										</td>
										<td>
											<select class="custom-select" id="inputGroupSelect01">
											    <option value="1">Valid</option>
											    <option value="2">Invalid</option>
											</select>
										</td>
										<td>
											<button class="btn btn-primary" type="submit">Save</button>
										</td>
									</form>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	</body>
</html>