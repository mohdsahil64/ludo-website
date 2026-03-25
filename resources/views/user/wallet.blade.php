@extends('layouts.master')

@section('head')
<title>Play Games Online and Earn Money | Ludo, Cricket, Chess, Carrom &amp;amp; Many More Game</title>

@endsection



@section('content')
<div class="main-area" style="padding-top: 60px;">
	<div class="p-4 bg-light"><a class="d-flex align-items-center profile-wallet undefined" href="/transaction-history">
			<picture class="ml-4"><img width="32px" src="{{asset('frontend/images/order-history.png')}}" alt=""></picture>
			<div class="ml-5 mytext text-muted ">Transactions History</div>
		</a></div>
	<div class="divider-x"></div>
	<div class="p-4 bg-light">
		<div class="wallet-card" style="background-color: rgb(71, 130, 244); background-image: url(&quot;/images/bg-wallets-deposit.png&quot;);">
			<div class="d-flex align-items-center">

				<picture class="mr-1"><img height="26px" width="26px" src="{{asset('frontend/images/global-rupeeIcon.png')}}" alt=""></picture><span class="text-white" style="font-size: 1.3em; font-weight: 900;">₹ {{ Auth::user()->wallet }}</span>
			</div>
			<div class="text-white text-uppercase" style="font-size: 0.9em; font-weight: 500;">Deposit Money</div>
			<div class="mt-5" style="font-size: 0.9em; color: rgb(191, 211, 255);">यह चिप्स Spin &amp; Win &amp; Buy की गई चिप्स है इनसे सिर्फ़ गेम खेले जा सकते है ॥ Bank या UPI में निकाला नहीं जा सकता है</div><a href="{{url('/add-funds')}}" class="walletCard-btn d-flex justify-content-center align-items-center text-uppercase">Add Cash</a>
		</div>
		<div class="wallet-card" style="background-color: rgb(127, 153, 255); background-image: url(&quot;/images/bg-wallets-winnings.png&quot;);">
			<div class="d-flex align-items-center">
				<picture class="mr-1"><img height="26px" width="26px" src="{{asset('frontend/images/global-rupeeIcon.png')}}" alt=""></picture><span class="text-white" style="font-size: 1.3em; font-weight: 900;">₹ @if(Auth::user()->wallet >= 95) {{ Auth::user()->wallet }}   @else  0 @endif</span>
			</div>
			<div class="text-white text-uppercase" style="font-size: 0.9em; font-weight: 500;">Winnings Money</div>
			<div class="mt-5" style="font-size: 0.9em; color: rgb(216, 224, 255);">यह चिप्स गेम से जीती हुई एवं रेफरल से कमाई हुई है इन्हें Bank या UPI में निकाला जा सकता है ॥ इन चिप्स से गेम भी खेला जा सकता हैैै</div>
			@if(Auth::user()->wallet >= 95)
			<a href="{{ url('/withdraw-check') }}" class="walletCard-btn d-flex justify-content-center align-items-center text-uppercase">Withdraw</a>
			@else
			<button onclick="location.href='{{ url('withdraw-alert') }}';" class="walletCard-btn d-flex justify-content-center align-items-center text-uppercase">Withdraw</button>
			@endif
		</div>

			{{-- <div class="wallet-card" style="background-color: rgb(71, 130, 244); background-image: url(&quot;/images/bg-wallets-deposit.png&quot;);">
			<div class="d-flex align-items-center">
				<picture class="mr-1"><img height="26px" width="26px" src="{{asset('frontend/images/global-rupeeIcon.png')}}" alt=""></picture><span class="text-white" style="font-size: 1.3em; font-weight: 900;">₹ {{ Auth::user()->wallet }}</span>
			</div>
			<div class="text-white text-uppercase" style="font-size: 0.9em; font-weight: 500;">Send to frends</div>
				<div class="text-white text-uppercase" style="font-size: 0.9em; font-weight: 500;">Send To Friends</div>
			<div class="mt-5" style="font-size: 0.9em; color: rgb(191, 211, 255);">Send Money Your Friends Wallet </div>
			<a href="{{url('/send-money')}}" class="walletCard-btn d-flex justify-content-center align-items-center text-uppercase">Send Money</a>
		</div> --}}
	</div>
</div>

@endsection
