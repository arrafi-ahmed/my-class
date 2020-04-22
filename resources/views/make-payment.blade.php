						@extends('layout.master')

						@section('title', 'Make Payment')

						@section('main')

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
						
						@endsection