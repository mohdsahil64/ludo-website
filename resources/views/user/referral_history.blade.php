@extends('layouts.master')

@section('head')
<title>Play Games Online and Earn Money | Ludo, Cricket, Chess, Carrom &amp;amp; Many More Game</title>

@endsection



@section('content')

<div class="main-area" style="padding-top: 60px;">
	@if($reffer_battle_earn->count()==0)

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
  
	@foreach($reffer_battle_earn as $row)
	
	<?php $user = App\User::where('id', $row->reffer_id)->first(); ?>
	<div class="w-100 py-3 d-flex align-items-center list-item">
		<div class="mx-3 d-flex list-body">
			<div class="d-flex align-items-center"></div>
			<div class="d-flex flex-column font-8" style="font-family: Saira Semi Condensed,sans-serif; font-weight:700 " >Commission Added Through  {{ $user->vplay_id }} <div class="games-section-headline" style="font-family: Dosis,sans-serif;">Added on: {{ $row->created_at }}</div>
			</div>
		</div>
		<div class="right-0 d-flex align-items-end pr-3 flex-column">
			<div class="d-flex float-right font-8">
					<div class="text-success" >
					 (+)
				<picture class="ml-1 mb-1"><img height="21px" width="21px" src="{{asset('frontend/images/global-rupeeIcon.png')}}" alt=""></picture><span class="pl-1">{{ $row->reffer_comission }}</span>
		     	</div>
		</div>
	</div>
	
	@endforeach
	

</div>
 @endif
@endsection
