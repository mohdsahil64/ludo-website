@extends('admin.master')


@section('head')
<title> Transcation History | Vplay.bet </title>
@endsection


@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-2 text-gray-800">Transaction History of {{ $user_details->vplay_id }} </h1>
	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">

			<div class="co-md-12"  style="padding:30px">
			<div class="row">
				<div class="col-md-6">
					<img
                    @if (!empty($user_details->profile_pic))
                    src="{{ asset('images/profile') }}/{{ $user_details->id }}/{{ $user_details->profile_pic }}"
                    @else
                    src="{{asset('frontend/images/avatars/Avatar2.png')}}"
                @endif
                    style="width:120px; height:auto; border:5px solid #395fcf; border-radius:50%; float:right ">
				</div>
				<div class="col-md-6">
				<div style="float:left; margin-top:10px; color: #395fcf">
				<h4>{{ $user_details->vplay_id }}</h4>
				<h4>{{ $user_details->mobile }}</h4>
				<h4><img src="{{asset('frontend/images/global-rupeeIcon.png')}}" style="width:40px" alt=""> {{ $user_details->wallet }}</h4>
					</div>
				</div>
				</div>
			</div>

		</div>

		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Transction Details</h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>#</th>
							<th>Order ID</th>
							<th>Day</th>
							<th>Month</th>
							<th>Year</th>
							<th>Paying Time</th>
							<th>Amount</th>
							<th>Closing Balance</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>#</th>
							<th>Order ID</th>
							<th>Day</th>
							<th>Month</th>
							<th>Year</th>
							<th>Paying Time</th>
							<th>Amount</th>
							<th>Closing Balance</th>
						</tr>
					</tfoot>
					<tbody>

						<?php $i=1; ?>
						@foreach($trans_history as $row)
						<tr>
							<td>{{ $i }}</td>
							<td>{{ $row->order_id }}</td>
							<td>{{ $row->day }}</td>
							<td>{{ $row->month }} </td>
							<td>{{ $row->year }}</td>
							<td><i class="fa-regular fa-clock"></i> {{ $row->paying_time }}</td>
							<td><img src="{{asset('frontend/images/global-rupeeIcon.png')}}" style="width:25px" alt="">  {{ $row->amount }}</td>
							<td> <img src="{{asset('frontend/images/global-rupeeIcon.png')}}" style="width:25px" alt="">  {{ $row->closing_balance }}</td>
						</tr>
						<?php $i++; ?>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>

</div>
<!-- /.container-fluid -->


@endsection
