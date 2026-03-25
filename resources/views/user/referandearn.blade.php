@extends('layouts.master')

@section('head')
<title>Play Games Online and Earn Money | Ludo, Cricket, Chess, Carrom &amp;amp; Many More Game</title>
@endsection



@section('content')
<div class="main-area" style="padding-top: 60px;">
	<div class="center-xy">
		<picture class="mt-1"><img width="226px" src="{{asset('frontend/images/referral-user-welcome.png')}}" alt=""></picture>
		<div class="mb-1">
			<div class="font-15" style="color: #444;">Refer &amp; Earn Now Unlimited <span role="img" aria-label="party-face">🥳</span></div>
			<div class="font-14" style="color: #555;">📢 हर गेम पर 2% कमीशन ! दोस्तों को जोड़ें और कमाएं।!</div>
			<div class="text-bold mt-3 text-center">Your Refer Code: {{ $user->referral_code }}<img class="ml-2" width="20px" src="/images/icon-edit.jpg" alt="">
			<div class="d-flex justify-content-center">Total Rafer Earnings: &nbsp; <b><img src="{{asset('frontend/images/global-rupeeIcon.png')}}" alt="" width="20px;">  ₹{{ $user->wallet_reffer }} <a href="{{ url('comission-reedem') }}">  Reedem</a></b></div>
		</div>
	</div>
	<div class="divider-x"></div>
	<div class="mx-3 my-3">

		<div class="font-11">Refer &amp; Earn Rules</div>
		<div class="d-flex align-items-center m-3">
			<picture><img width="82px" src="{{asset('frontend/images/referral-signup-bonus-new.png')}}" alt=""></picture>
			<div class="font-9 mx-3" style="width: 63%;">
				<div>When your friend signs up on https://indianludo.site/ from your referral link,</div>
				<div class="font-8 c-green mt-2">You get <strong>2% Commission</strong> on your <strong>referral's winnings.</strong></div>
			</div>
		</div>
		<div class="d-flex align-items-center m-3">
			<picture><img width="82px" src="{{asset('frontend/images/banner_illsutration.png')}}" alt=""></picture>
			<div class="font-9 mx-3" style="width: 63%;">
				<div>Suppose your referral plays a battle for  ₹10000 Cash,</div>
				<div class="font-8 c-green mt-2">You get <strong>₹200 Cash</strong> <strong></strong></div>
			</div>
		</div>
	</div>
	<div style="padding-bottom: 80px;"></div>
	<?php   
	$text = "Play Ludo and earn ₹10000 daily Commision Charge -5% Only Referral -2% On All Games 24x7 Live Chat Support Instant Withdrawal Via UPI/Bank . https://indianludo.site/referral/".$user->referral_code." Register Now, My refer code is ".$user->referral_code.".";
$refercode="Play Ludo and earn ₹10000 daily Commision Charge -5% Only Referral -2% On All Games 24x7 Live Chat Support Instant Withdrawal Via UPI/Bank, . https://indianludo.site/referral/".$user->referral_code." Register Now, My refer code is ".$user->referral_code.".";
			  
	$url= "https://indianludo.site/referral/".$user->referral_code;		  
 ?>
	<div class="refer-footer"><a href="whatsapp://send?text={{$refercode}}" class="bg-green refer-button cxy w-42">Share in Whatsapp</a> <a href="https://t.me/share/url?url={{$url}}&text={{$refercode}}" style="background:#0088cc" class=" refer-button cxy w-42 ml-2">Share in Telegram</a>
	<button class="refer-button-copy ml-2 d-flex" id="btn">
			    <img height="18px" width="18px" src="{{asset('frontend/images/global-copy-grey.png')}}" alt="">
			    
		</button>

		</div>
</div>

<script>
function copyToClipboard(text) {
    if (window.clipboardData && window.clipboardData.setData) {
        // IE specific code path to prevent textarea being shown while dialog is visible.
        return clipboardData.setData("Text", text); 

    } else if (document.queryCommandSupported && document.queryCommandSupported("copy")) {
        var textarea = document.createElement("textarea");
        textarea.textContent = text;
        textarea.style.position = "fixed";  // Prevent scrolling to bottom of page in MS Edge.
        document.body.appendChild(textarea);
        textarea.select();
        try {
            return document.execCommand("copy");  // Security exception may be thrown by some browsers.
        } catch (ex) {
            console.warn("Copy to clipboard failed.", ex);
            return false;
        } finally {
            document.body.removeChild(textarea);
        }
    }
}

document.querySelector("#btn").onclick = function() {
    var result = copyToClipboard("{{ $refercode }}");
    
    alert("Copied the You Refer Code");
};


</script>

@endsection

