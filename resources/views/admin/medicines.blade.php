@extends('layouts.main')

@section('title')
MedStore | Medicines
@endsection

@section('custom-css')
<link rel="stylesheet" href=" https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css ">
<link rel="stylesheet" type="text/css" href="{{ asset('/css/admin.css') }}" />

@endsection

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="admin-navbar">
			@include('partials._adminpanel')
		</div>
	</div>
	<div class="row">
		<div class="view-table-medicine">
			<div class="card orders">

					<table class="table" id="medicineTable">
							<thead class="thead-light">
								<tr>
									<th scope="col">ID</th>
									<th scope="col">Name</th>
									<th scope="col">Brand</th>
									<th scope="col">Contains</th>
									<th scope="col">Med-Form</th>
									<th scope="col">Qty</th>
									<th scope="col">Amount</th>
									<th scope="col">Price</th>
									<th scope="col">Image</th>
									<th scope="col">Category</th>
									<th scope="col"></th>
									<th scope="col"></th>
								</tr>
							</thead>
							<tbody>
								<div class="admin-btn-med">
									@foreach($med as $meds)
									<div class="workpls">
											<tr>
												<th scope="row">{{$meds->id}} </th>
												<td>
														{{$meds->name}}
														{{-- <input class="form-control name-form" type="text" name="name" value="{{$meds->name}}" /> --}}
												</td>
												<td>
														{{$meds->brand}}
													{{-- <input class="form-control" type="text" name="brand" value="{{$meds->brand}}" /> --}}
												</td>
												<td>
														{{$meds->contains}}
													{{-- <textarea class="form-control" type="text" name="contains">{{$meds->contains}}</textarea> --}}
												</td>
												<td>
														{{$meds->form}}
													{{-- <input class="form-control name-form" type="text" name="form" value="{{$meds->form}}" /> --}}
												</td>
												<td>
														{{$meds->quantity}}
													{{-- <input class="form-control row-size" type="text" name="quantity" value="{{$meds->quantity}}" /> --}}
												</td>
												<td>
														{{$meds->amount}}
													{{-- <input class="form-control name-form" type="text" name="amount" value="{{$meds->amount}}" /> --}}
												</td>
												<td>
														{{$meds->price}}
													{{-- <input class="form-control row-size" type="text" name="price" value="{{$meds->price}}" /> --}}
												</td>
												<td>
														<img src="{{$meds->image}}" alt="" style=" max-width: 150px; max-height: 150px;">
													{{-- <input class="form-control" type="text" name="image" value="{{$meds->image}}" /> --}}
												</td>
												<td>
													<select id="inputState" name="category" class="form-control">
														@foreach($cat as $cats)
		
														<?php
																		if($cats->name == $meds->category->name){
																			$variable = "Selected";
																		}
																		else{
																			$variable = NULL;
																		}
																	 ?>
														<option {{$variable}}>{{$cats->name}}</option>
														@endforeach

												</td>
												<td>
													<form action="{{route('medicine.update.form', $meds->id)}}" method="get">
													{{ csrf_field() }}
													{{-- <input name="_method" type="hidden" value="put"> --}}

													<input type="hidden" name="name" value="{{$meds->name}}" />
													<input type="hidden" name="brand" value="{{$meds->brand}}" />
													<input type="hidden" name="contains" valiue="{{$meds->contains}}" />
													<input type="hidden" name="form" value="{{$meds->form}}" />
													<input type="hidden" name="quantity" value="{{$meds->quantity}}" />
													<input type="hidden" name="amount" value="{{$meds->amount}}" />
													<input type="hidden" name="price" value="{{$meds->price}}"/>
													<input type="hidden" name="image" value="{{$meds->image}}"  />

													<div class="workpls">
		
														<button type="submit" class="btn btn-success btn-md">
															<i class="fas fa-edit"></i> Update
														</button>
														{{-- <button type="submit" class="btn btn-warning  btn-lg btn-block"> Checkout </button> --}}
		
													</div>
										</form>
										</td>
										<td>
											<form action="{{route('medicine.destroy', $meds->id)}}" method="post">
												{{ csrf_field() }}
												<input name="_method" type="hidden" value="delete">
												<div class="workpls">
													<button onclick='return confirm("You sure want to delete?")' type="submit" class="btn btn-danger btn-md"><i
														 class="fas fa-minus-circle"></i> Delete</button>
												</div>
											</form>
										</td>
										</tr>
										@endforeach
							</tbody>
						</table>
		
				{{-- <table id="example" class="table  table-bordered" style="width:100%">
					<thead class="thead-dark">
						<tr>
							<th>Name</th>
							<th>Position</th>
							<th>Office</th>
							<th>Age</th>
							<th>Start date</th>
							<th>Salary</th>
						</tr>
					</thead>
					<tbody>
						@foreach($med as $meds)
						<tr>
							<form>
								<td>
									<div class="form-group">
										<input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">
									</div>
								</td>
								<td>{{$meds->quantity}}</td>
								<td>Edinburgh</td>
								<td>61</td>
								<td>2011/04/25</td>
								<td>$320,800</td>
							</form>
						</tr>
						@endforeach
					</tbody>
				</table> --}}
			</div>
		</div>
	</div>
</div>
@endsection

@section('custom-scripts')

<script src=" https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js "></script>
<script src=" https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js "></script>
<script>
	$(document).ready(function () {
		$('#medicineTable').DataTable();
	});
</script>
@endsection