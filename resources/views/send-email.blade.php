<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

		<title>Send Email</title>
	</head>
	<body>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-12">
								<h3>
									Send Email
								</h3>

								@if(count($errors) > 0)
								<div class="alert alert-danger alert-dismissible fade show" role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<ul>
									@foreach($errors->all() as $error)
										<li>{{$error}}</li>
									@endforeach
									</ul>
								</div>
								@endif

								@if($success = Session::get('success'))
								<div class="alert alert-success alert-dismissible fade show" role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									{{$success}}
								</div>
								@endif

								<form method="post" action="{{route('contact.send')}}">
									@csrf
									<table class="table">
										<tbody>
											<tr>
												<td class="input-group">
													<label for="exampleInputEmail1">
														Reciever ID
													</label>
												</td>
												<td>
													<input type="text" class="form-control" name="id" value="{{$contact->id}}" readonly/>
												</td>
											</tr>
											<tr>
												<td class="input-group">
													<label for="exampleInputEmail1">
														Reciever Name
													</label>
												</td>
												<td>
													<input type="text" class="form-control" name="name" value="{{$contact->name}}" readonly/>
												</td>
											</tr>
											<tr>
												<td class="input-group">
													<label for="exampleInputEmail1">
														Reciever Department
													</label>
												</td>
												<td>	
													<input type="text" class="form-control" name="dept" value="{{$contact->dept}}" readonly/>
												</td>
											</tr>
											<tr>
												<td class="input-group">
													<label for="exampleInputEmail1">
														Reciever Email
													</label>
												</td>
												<td>
													<input type="text" class="form-control" name="email" value="{{$contact->email}}" readonly/>
												</td>
											</tr>
											<tr>
												<td class="input-group">
													<label for="exampleInputEmail1">
														Your Name
													</label>
												</td>
												<td>
													<input class="form-control" name="senderName">
												</td>
											</tr>
											<tr>
												<td class="input-group">
													<label for="exampleInputEmail1">
														Your Email
													</label>
												</td>
												<td>
													<input class="form-control" name="senderEmail">
												</td>
											</tr>
											<tr>
												<td class="input-group">
													<label for="exampleInputEmail1">
														Message
													</label>
												</td>
												<td>
													<textarea class="form-control" name="message"></textarea>
												</td>
											</tr>
											<tr>
												<td></td>
												<td class="input-group">
													<button type="submit" name="send" value="send" class="btn btn-primary">
														Send
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
		</div>

		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	</body>
</html>