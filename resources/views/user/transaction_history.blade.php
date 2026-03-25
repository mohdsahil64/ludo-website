@extends('layouts.master')

@section('head')
<title>Play Games Online and Earn Money | Ludo, Cricket, Chess, Carrom &amp;amp; Many More Game</title>

@endsection



@section('content')

<div class="main-area" style="padding-top: 60px;">
	@if($trans_history->count()==0)

	<div class="cxy flex-column px-4 text-center" style="margin-top: 70px;"><img src="{{asset('frontend/images/notransactionhistory.png')}}" width="280px" alt="">
		<div class="games-section-title mt-4" style="font-size: 1.2em;">No transactions yet!</div>
		<div class="games-section-headline mt-2" style="font-size: 0.85em;">Seems like you haven’t done any activity yet</div>
	</div>
	<div class="kyc-select">
		<div class="overlay"></div>
		<div class="box" style="bottom: -16px; position: absolute;">
			<div class="bg-white">
				<div class="header">
					<div class="d-flex position-relative align-items-center justify-content-center">
						<div class="header-text">Reedeem Details</div>
					</div>
				</div>
				<div class="px-5" style="padding-top: 100px; padding-bottom: 30px; justify-content: center;">
					<p><b>Order ID:</b> </p>
					<p><b>Redeem amount:</b> </p>
				</div>
			</div>
		</div>
	</div>
    @else

	@foreach($trans_history as $row)


	<div class="w-100 py-3 d-flex align-items-center list-item">
		<div class="center-xy list-date mx-2">
			<div>{{ $row->day }} {{ $row->month }}</div><small>{{ $row->paying_time }}</small>
		</div>
		<div class="list-divider-y"></div>
		<div class="mx-3 d-flex list-body">
			<div class="d-flex align-items-center"></div>
			<div class="d-flex flex-column font-8" style="font-family: Saira Semi Condensed,sans-serif; font-weight:700 " >
			@if($row->add_or_withdraw=='add')
			Cash Deposit
			@elseif($row->add_or_withdraw=='penalty')
			Game Penalty
			@else
			Withdrawal
			@endif

			@if($row->remark == "By Admin") by Admin.  @endif @if($row->remark == "Signup Bonus") through Signup Bonus.  @endif<div class="games-section-headline" style="font-family: Dosis,sans-serif;">Order ID: {{ $row->order_id }}</div>
			</div>
		</div>
		<div class="right-0 d-flex align-items-end pr-3 flex-column">
			<div class="d-flex float-right font-8">
				 @if($row->add_or_withdraw=='add')
					<div class="text-success" >
					 (+)
					@else
					<div class="text-danger" >
						<span style="color:black">Status :</span> @if($row->withdraw_status=='pending') <span class="text text-warning">Pending</span>  @elseif($row->withdraw_status=='success')  <span class="text text-success">Success</span> @else <span class="text text-danger">Reject</span>    @endif
					 (-)
					@endif
						</div>
				<picture class="ml-1 mb-1"><img height="20px" width="20px" src="{{asset('frontend/images/global-rupeeIcon.png')}}" alt=""></picture><span class="pl-1">{{ $row->amount }}</span>
		     	</div>
			<div class="games-section-headline" style="font-size: 0.6em;">Closing Balance: {{ $row->closing_balance }}</div>
		</div>
	</div>

	@endforeach


</div>
 @endif
@endsection
