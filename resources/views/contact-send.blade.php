						@extends('layout.master')

						@section('title', 'Send Email')

						@section('main')

						@if(isset($contact))
						<form method="post" action="send">
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
											<button type="submit" name="send" value="send" class="btn btn-primary btn-block">
												Send
											</button>
										</td>
									</tr>
									
								</tbody>
							</table>
						</form>
						@endif 

						@endsection