						@extends('layout.master')

						@section('title', 'Modify Payment')

						@section('main')

						<form method="post">
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
										<form method="post">
											@csrf
											<td>
												<input type="text" class="form-control" name="paymentId"  value="{{isset($find->id) ? $find->id : ''}}"/>
												<button class="btn btn-primary btn-block mt-1" type="submit" name="find" value="find">Find</button>
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
												<button type="submit" class="btn btn-primary btn-block" name="update" value="update">Update</button>
												<button type="submit" class="btn btn-danger btn-block mt-1" name="delete" value="delete">Delete</button>
											</td>
										</form>
									</tr>
									
								</tbody>
							</table>
						</form>
						
						<h3>Recent Payments</h3>

						@if(isset($payments))
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
						
						@else
						<h5>No recent payment found!</h5>

						@endif

						@endsection