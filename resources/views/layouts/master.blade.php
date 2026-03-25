<!doctype html>
<html lang="en">

<head>
	<!--title, description and keywords-->
	@yield('head')
	<meta name="description" content="indianludo brings to you exciting games like Carrom, Ludo, Cricket, Chess, Bubble Wipeout, and more. Play games online against thousands of players and win real cash. Withdraw cash instantly to Amazon Pay or to your bank account via UPI. Visit indiaanludo and find more than 100+ games to earn money." data-react-helmet="true">
	<meta name="keywords" content="fantasy cricket, khelbro, ludo, ludo khelo, win cash prizes" data-react-helmet="true">

	<!--utf and viewport-->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,minimum-scale=1,user-scalable=0">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<!--google font roboto-->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,500,600,700,800,900&amp;display=swap">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400&amp;display=swap">
	<!--used css in site-->
	<link href="{{asset('frontend/static/css/2.cb99ed49.chunk.css')}}" rel="stylesheet">
	<link href="{{asset('frontend/static/css/main.65fdbf1b.chunk.css')}}" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script>
     var auto_refresh = setInterval(
     function(){
		 $('#walletBalance').load('<?php echo url('/wallet_balance/'); ?>');
	 },500);


</script>
<style>
 .logo_img{

     position:fixed;
       left: 13%;
    top: 1%;
 }
 .left_1{

  float:left;
  width:17%;
}
  .left_5{

  width:20%;
  float:left;

}
  .left_8{

  width:22%;
  float:left;

}
.footer_table{
    width:50%;
}
 @media only screen and (max-width:680px)  {

.footer_table{
    width:100%;
}
 .left_1{


  width:25%;
}
  .left_5{

  width:33%;
  float:left;

}
  .left_8{

  width:33%;
  float:left;

}

 }
</style>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-Z4TLJNVDQB"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-Z4TLJNVDQB');
</script>
</head>

<body>
	<div id="root">
		<!------Nav Menu Start------>


		<div id="menufade" onclick="closeMenu()" class=""></div>
		<div id="menulist" class="sideNav  ">
			<a class="sideNav-options" href="{{ url('profile') }}">
				<picture class="sideNav-icon">
					<img class="border-50" src="{{asset('frontend/images/avatars/Avatar2.png')}}" alt="My Profile">
				</picture>
				<div class="position-relative ml-3">
					<div class="sideNav-text">My Profile</div>
				</div>
				<picture class="sideNav-arrow">
					<img src="{{asset('frontend/images/global-black-chevronRight.png')}}" alt="">
				</picture>
				<div class="sideNav-divider">

				</div>
			</a>
			<a class="sideNav-options" href="/">
				<picture class="sideNav-icon">
					<img class="" src="{{asset('frontend/images/gamepad.png')}}" alt="Win Cash">
				</picture>
				<div class="position-relative ml-3">
					<div class="sideNav-text">Play Games</div>
				</div>
				<picture class="sideNav-arrow">
					<img src="{{asset('frontend/images/global-black-chevronRight.png')}}" alt="">
				</picture>
				<div class="sideNav-divider">

				</div>
			</a>
			<a class="sideNav-options" href="{{ url('wallet') }}">
				<picture class="sideNav-icon">
					<img class="" src="{{asset('frontend/images/sidebar-wallet.png')}}" alt="My Wallet">
				</picture>
				<div class="position-relative ml-3">
					<div class="sideNav-text">My Wallet</div>
				</div>
				<picture class="sideNav-arrow">
					<img src="{{asset('frontend/images/global-black-chevronRight.png')}}" alt="">
				</picture>
				<div class="sideNav-divider">

				</div>
			</a>
			<a class="sideNav-options" href="{{ url('game-history') }}">
				<picture class="sideNav-icon">
					<img class="" src="{{asset('frontend/images/order-history.png')}}" alt="Games History">
				</picture>
				<div class="position-relative ml-3">
					<div class="sideNav-text">Games History</div>
				</div>
				<picture class="sideNav-arrow">
					<img src="{{asset('frontend/images/global-black-chevronRight.png')}}" alt="">
				</picture>
				<div class="sideNav-divider">

				</div>
			</a>

				<a class="sideNav-options" href="{{ url('top-10-players') }}">
				<picture class="sideNav-icon">
					<img class="" src="{{asset('frontend/images/sidebar-gamesHistory.png')}}" alt="Games History">
				</picture>
				<div class="position-relative ml-3">
					<div class="sideNav-text">Leader Board</div>
				</div>
				<picture class="sideNav-arrow">
					<img src="{{asset('frontend/images/global-black-chevronRight.png')}}" alt="">
				</picture>
				<div class="sideNav-divider">

				</div>
			</a>
			<a class="sideNav-options" href="{{ url('transaction-history') }}">
				<picture class="sideNav-icon">
					<img class="" src="{{asset('frontend/images/order-history.png')}}" alt="Transaction History">
				</picture>
				<div class="position-relative ml-3">
					<div class="sideNav-text">Transaction History</div>
				</div>
				<picture class="sideNav-arrow">
					<img src="{{asset('frontend/images/global-black-chevronRight.png')}}" alt="">
				</picture>
				<div class="sideNav-divider">

				</div>
			</a>
			<a class="sideNav-options" href="{{ url('refer-earn') }}">
				<picture class="sideNav-icon">
					<img class="" src="{{asset('frontend/images/sidebar-referEarn.png')}}" alt="Refer &amp; Earn">
				</picture>
				<div class="position-relative ml-3">
					<div class="sideNav-text">Refer &amp; Earn</div>
				</div>
				<picture class="sideNav-arrow">
					<img src="{{asset('frontend/images/global-black-chevronRight.png')}}" alt="">
				</picture>
				<div class="sideNav-divider">

				</div>
			</a>
			<a class="sideNav-options" href="{{ url('referral-history') }}">
				<picture class="sideNav-icon">
					<img class="" src="{{asset('frontend/images/sidebar-referEarn.png')}}" alt="Refer &amp; Earn">
				</picture>
				<div class="position-relative ml-3">
					<div class="sideNav-text">Referral History</div>
				</div>
				<picture class="sideNav-arrow">
					<img src="{{asset('frontend/images/global-black-chevronRight.png')}}" alt="">
				</picture>
				<div class="sideNav-divider">

				</div>
			</a>
			<a class="sideNav-options" href="{{ url('support') }}">
				<picture class="sideNav-icon">
					<img class="" src="{{asset('frontend/images/sidebar-support.png')}}" alt="Notification">
				</picture>
				<div class="position-relative ml-3">
					<div class="sideNav-text">Support</div>
				</div>
				<picture class="sideNav-arrow">
					<img src="{{asset('frontend/images/global-black-chevronRight.png')}}" alt="">
				</picture>
				<div class="sideNav-divider">

				</div>
			</a>
		</div>


		<!------Nav Menu End------>

		<!------Hedar Start------>

		<div class="leftContainer">



			@if(Route::current()->getName() == 'loginWithOtpForm' || Route::current()->getName() == 'login' )

			@else
			<div class="headerContainer">

				@if(Auth::check())
				@if(Auth::user()->user_type == '2')
				<picture class="sideNavIcon ml-3 mr-2"><img src="{{asset('frontend/images/header-hamburger.png')}}" onclick="openMenu()" alt=""></picture>
				@endif
					@endif
						@if(Auth::check())
				<center><a  href="/">

						<img hieght="100px" width="100px" src="{{asset('frontend/images/logo.png')}}" alt="">

				</a></center>

				@else
				<center><a  href="/">

						<img hieght="120px" width="120px" src="{{asset('frontend/images/logo.png')}}" alt="">

				</a></center>
				@endif
				<div class="menu-items">

					@if(Auth::check())
					@if(Auth::user()->user_type == '1')
					<a type="button" class="login-btn" href="{{ url('admin/dashboard') }}">Admin Dashboard</a>
					@else
					<div id="walletBalance">

					</div>
						<div id="earningBalance">

					</div>
					@endif
					@else
					<a type="button"  href="{{ url('login') }}">
					<img class=""style="width:100px;" src="{{asset('images/icons/login.jpg')}}" alt="Notification">
			</a>
					@endif

				</div>

				<span class="mx-5"></span>


			</div>

			@endif


			@yield('content')


		</div>


		<div class="divider-y"></div>
		<div class="rightContainer">
			<div class="rcBanner flex-center">
				<picture class="rcBanner-img-container">
					<img src="{{asset('frontend/images/vplay-logo.png')}}" alt="">
				</picture>
				<div class="rcBanner-text">Indian 
				Ludo<span class="rcBanner-text-bold">Win Real Cash!</span></div>
				<div class="rcBanner-footer">For best experience, open&nbsp;<a href="#!" style="color: rgb(44, 44, 44); font-weight: 500; text-decoration: none;">ludomaster.site</a>&nbsp;on&nbsp;<img src="{{asset('frontend/images/global-chrome.png')}}" alt="">&nbsp;chrome mobile</div>
			</div>
		</div>
	</div>




	{{-- <audio id="requestAudio" style="display:none" controls="">
		<source src="/audio/battle_request.mp3" type="audio/mpeg">
	</audio>
	<audio id="acceptedAudio" style="display:none" controls="">
		<source src="/audio/battle_accepted.mp3" type="audio/mpeg">
	</audio>
	<audio id="screenCollapseAudio" style="display:none" controls="">
		<source src="/audio/screen-collapse.mp3" type="audio/mpeg">
	</audio>
	<audio id="countTimerAudio" style="display:none" controls="">
		<source src="/audio/timer.mp3" type="audio/mpeg">
	</audio>
	<audio id="versusAudio" style="display:none" controls="">
		<source src="/audio/versus.mp3" type="audio/mpeg">
	</audio>
	<audio id="victoryAudio" style="display:none" controls="">
		<source src="/audio/victory.mp3" type="audio/mpeg">
	</audio> --}}


	{{-- <script src="{{asset('frontend/static/js/2.7ffbbf86.chunk.js')}}"></script>
	<script src="{{asset('frontend/static/js/main.b84e208a.chunk.js')}}"></script> --}}
	<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
	<!--<script src="//code.tidio.co/hkh1uehicyjkzpm6vjlz0zzfw6ramcxe.js" async></script>-->
	<script>
		$(document).ready(function() {
			$('.react-swipeable-view-container').slick({
					 autoplay:false,
            arrows: true,
            prevArrow:"<button type='button' class='slick-prev pull-left' style='border:0px solid white; background-color:white; font-size:35px; color:#969696'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
            nextArrow:"<button type='button' class='slick-next pull-right'  style='border:0px solid white; background-color:white; font-size:35px; color:#969696'><i class='fa fa-angle-right' aria-hidden='true'></i></button>"
			});
		});

	</script>
   @include('sweetalert::alert')
	<script>
		function openMenu() {
			const fade = document.getElementById("menufade");
			const box = document.getElementById("menulist");
			fade.classList.toggle("sideNav-overlay");
			box.classList.add("sideNav-open");
		}

		function closeMenu() {
			const fadeClose = document.getElementById("menufade");
			const boxClose = document.getElementById("menulist");
			fadeClose.classList.remove("sideNav-overlay");
			boxClose.classList.remove("sideNav-open");
		}

	</script>

	<style data-jss="" data-meta="MuiSvgIcon">
		.MuiSvgIcon-root {
			fill: currentColor;
			width: 1em;
			height: 1em;
			display: inline-block;
			font-size: 1.5rem;
			transition: fill 200ms cubic-bezier(0.4, 0, 0.2, 1) 0ms;
			flex-shrink: 0;
			user-select: none;
		}

		.MuiSvgIcon-colorPrimary {
			color: #3f51b5;
		}

		.MuiSvgIcon-colorSecondary {
			color: #f50057;
		}

		.MuiSvgIcon-colorAction {
			color: rgba(0, 0, 0, 0.54);
		}

		.MuiSvgIcon-colorError {
			color: #f44336;
		}

		.MuiSvgIcon-colorDisabled {
			color: rgba(0, 0, 0, 0.26);
		}

		.MuiSvgIcon-fontSizeInherit {
			font-size: inherit;
		}

		.MuiSvgIcon-fontSizeSmall {
			font-size: 1.25rem;
		}

		.MuiSvgIcon-fontSizeLarge {
			font-size: 2.1875rem;
		}

	</style>
	<style data-jss="" data-meta="MuiInputBase">
		@-webkit-keyframes mui-auto-fill {}

		@-webkit-keyframes mui-auto-fill-cancel {}

		.MuiInputBase-root {
			color: rgba(0, 0, 0, 0.87);
			cursor: text;
			display: inline-flex;
			position: relative;
			font-size: 1rem;
			box-sizing: border-box;
			align-items: center;
			font-family: "Roboto", "Helvetica", "Arial", sans-serif;
			font-weight: 400;
			line-height: 1.1876em;
			letter-spacing: 0.00938em;
		}

		.MuiInputBase-root.Mui-disabled {
			color: rgba(0, 0, 0, 0.38);
			cursor: default;
		}

		.MuiInputBase-multiline {
			padding: 6px 0 7px;
		}

		.MuiInputBase-multiline.MuiInputBase-marginDense {
			padding-top: 3px;
		}

		.MuiInputBase-fullWidth {
			width: 100%;
		}

		.MuiInputBase-input {
			font: inherit;
			color: currentColor;
			width: 100%;
			border: 0;
			height: 1.1876em;
			margin: 0;
			display: block;
			padding: 6px 0 7px;
			min-width: 0;
			background: none;
			box-sizing: content-box;
			animation-name: mui-auto-fill-cancel;
			letter-spacing: inherit;
			animation-duration: 10ms;
			-webkit-tap-highlight-color: transparent;
		}

		.MuiInputBase-input::-webkit-input-placeholder {
			color: currentColor;
			opacity: 0.42;
			transition: opacity 200ms cubic-bezier(0.4, 0, 0.2, 1) 0ms;
		}

		.MuiInputBase-input::-moz-placeholder {
			color: currentColor;
			opacity: 0.42;
			transition: opacity 200ms cubic-bezier(0.4, 0, 0.2, 1) 0ms;
		}

		.MuiInputBase-input:-ms-input-placeholder {
			color: currentColor;
			opacity: 0.42;
			transition: opacity 200ms cubic-bezier(0.4, 0, 0.2, 1) 0ms;
		}

		.MuiInputBase-input::-ms-input-placeholder {
			color: currentColor;
			opacity: 0.42;
			transition: opacity 200ms cubic-bezier(0.4, 0, 0.2, 1) 0ms;
		}

		.MuiInputBase-input:focus {
			outline: 0;
		}

		.MuiInputBase-input:invalid {
			box-shadow: none;
		}

		.MuiInputBase-input::-webkit-search-decoration {
			-webkit-appearance: none;
		}

		.MuiInputBase-input.Mui-disabled {
			opacity: 1;
		}

		.MuiInputBase-input:-webkit-autofill {
			animation-name: mui-auto-fill;
			animation-duration: 5000s;
		}

		label[data-shrink=false]+.MuiInputBase-formControl .MuiInputBase-input::-webkit-input-placeholder {
			opacity: 0 !important;
		}

		label[data-shrink=false]+.MuiInputBase-formControl .MuiInputBase-input::-moz-placeholder {
			opacity: 0 !important;
		}

		label[data-shrink=false]+.MuiInputBase-formControl .MuiInputBase-input:-ms-input-placeholder {
			opacity: 0 !important;
		}

		label[data-shrink=false]+.MuiInputBase-formControl .MuiInputBase-input::-ms-input-placeholder {
			opacity: 0 !important;
		}

		label[data-shrink=false]+.MuiInputBase-formControl .MuiInputBase-input:focus::-webkit-input-placeholder {
			opacity: 0.42;
		}

		label[data-shrink=false]+.MuiInputBase-formControl .MuiInputBase-input:focus::-moz-placeholder {
			opacity: 0.42;
		}

		label[data-shrink=false]+.MuiInputBase-formControl .MuiInputBase-input:focus:-ms-input-placeholder {
			opacity: 0.42;
		}

		label[data-shrink=false]+.MuiInputBase-formControl .MuiInputBase-input:focus::-ms-input-placeholder {
			opacity: 0.42;
		}

		.MuiInputBase-inputMarginDense {
			padding-top: 3px;
		}

		.MuiInputBase-inputMultiline {
			height: auto;
			resize: none;
			padding: 0;
		}

		.MuiInputBase-inputTypeSearch {
			-moz-appearance: textfield;
			-webkit-appearance: textfield;
		}

	</style>
	<style data-jss="" data-meta="MuiInput">
		.MuiInput-root {
			position: relative;
		}

		label+.MuiInput-formControl {
			margin-top: 16px;
		}

		.MuiInput-colorSecondary.MuiInput-underline:after {
			border-bottom-color: #f50057;
		}

		.MuiInput-underline:after {
			left: 0;
			right: 0;
			bottom: 0;
			content: "";
			position: absolute;
			transform: scaleX(0);
			transition: transform 200ms cubic-bezier(0.0, 0, 0.2, 1) 0ms;
			border-bottom: 2px solid #3f51b5;
			pointer-events: none;
		}

		.MuiInput-underline.Mui-focused:after {
			transform: scaleX(1);
		}

		.MuiInput-underline.Mui-error:after {
			transform: scaleX(1);
			border-bottom-color: #f44336;
		}

		.MuiInput-underline:before {
			left: 0;
			right: 0;
			bottom: 0;
			content: "\00a0";
			position: absolute;
			transition: border-bottom-color 200ms cubic-bezier(0.4, 0, 0.2, 1) 0ms;
			border-bottom: 1px solid rgba(0, 0, 0, 0.42);
			pointer-events: none;
		}

		.MuiInput-underline:hover:not(.Mui-disabled):before {
			border-bottom: 2px solid rgba(0, 0, 0, 0.87);
		}

		.MuiInput-underline.Mui-disabled:before {
			border-bottom-style: dotted;
		}

		@media (hover: none) {
			.MuiInput-underline:hover:not(.Mui-disabled):before {
				border-bottom: 1px solid rgba(0, 0, 0, 0.42);
			}
		}

	</style>
    <style data-jss="" data-meta="MuiFormLabel">
        .MuiFormLabel-root {
            color: rgba(0, 0, 0, 0.54);
            padding: 0;
            font-size: 1rem;
            font-family: "Roboto", "Helvetica", "Arial", sans-serif;
            font-weight: 400;
            line-height: 1;
            letter-spacing: 0.00938em;
        }

        .MuiFormLabel-root.Mui-focused {
            color: #3f51b5;
        }

        .MuiFormLabel-root.Mui-disabled {
            color: rgba(0, 0, 0, 0.38);
        }

        .MuiFormLabel-root.Mui-error {
            color: #f44336;
        }

        .MuiFormLabel-colorSecondary.Mui-focused {
            color: #f50057;
        }

        .MuiFormLabel-asterisk.Mui-error {
            color: #f44336;
        }

    </style>

    <style data-jss="" data-meta="MuiInputLabel">
        .MuiInputLabel-root {
            display: block;
            transform-origin: top left;
        }

        .MuiInputLabel-formControl {
            top: 0;
            left: 0;
            position: absolute;
            transform: translate(0, 24px) scale(1);
        }

        .MuiInputLabel-marginDense {
            transform: translate(0, 21px) scale(1);
        }

        .MuiInputLabel-shrink {
            transform: translate(0, 1.5px) scale(0.75);
            transform-origin: top left;
        }

        .MuiInputLabel-animated {
            transition: color 200ms cubic-bezier(0.0, 0, 0.2, 1) 0ms, transform 200ms cubic-bezier(0.0, 0, 0.2, 1) 0ms;
        }

        .MuiInputLabel-filled {
            z-index: 1;
            transform: translate(12px, 20px) scale(1);
            pointer-events: none;
        }

        .MuiInputLabel-filled.MuiInputLabel-marginDense {
            transform: translate(12px, 17px) scale(1);
        }

        .MuiInputLabel-filled.MuiInputLabel-shrink {
            transform: translate(12px, 10px) scale(0.75);
        }

        .MuiInputLabel-filled.MuiInputLabel-shrink.MuiInputLabel-marginDense {
            transform: translate(12px, 7px) scale(0.75);
        }

        .MuiInputLabel-outlined {
            z-index: 1;
            transform: translate(14px, 20px) scale(1);
            pointer-events: none;
        }

        .MuiInputLabel-outlined.MuiInputLabel-marginDense {
            transform: translate(14px, 12px) scale(1);
        }

        .MuiInputLabel-outlined.MuiInputLabel-shrink {
            transform: translate(14px, -6px) scale(0.75);
        }

    </style>

    <style data-jss="" data-meta="MuiFormControl">
        .MuiFormControl-root {
            border: 0;
            margin: 0;
            display: inline-flex;
            padding: 0;
            position: relative;
            min-width: 0;
            flex-direction: column;
            vertical-align: top;
        }

        .MuiFormControl-marginNormal {
            margin-top: 16px;
            margin-bottom: 8px;
        }

        .MuiFormControl-marginDense {
            margin-top: 8px;
            margin-bottom: 4px;
        }

        .MuiFormControl-fullWidth {
            width: 100%;
        }

    </style>

    <style data-jss="" data-meta="MuiFormHelperText">
        .MuiFormHelperText-root {
            color: rgba(0, 0, 0, 0.54);
            margin: 0;
            font-size: 0.75rem;
            margin-top: 3px;
            text-align: left;
            font-family: "Roboto", "Helvetica", "Arial", sans-serif;
            font-weight: 400;
            line-height: 1.66;
            letter-spacing: 0.03333em;
        }

        .MuiFormHelperText-root.Mui-disabled {
            color: rgba(0, 0, 0, 0.38);
        }

        .MuiFormHelperText-root.Mui-error {
            color: #f44336;
        }

        .MuiFormHelperText-marginDense {
            margin-top: 4px;
        }

        .MuiFormHelperText-contained {
            margin-left: 14px;
            margin-right: 14px;
        }

    </style>

    <style data-jss="" data-meta="MuiTextField">

    </style>

    <style data-jss="" data-meta="MuiTypography">
        .MuiTypography-root {
            margin: 0;
        }

        .MuiTypography-body2 {
            font-size: 0.875rem;
            font-family: "Roboto", "Helvetica", "Arial", sans-serif;
            font-weight: 400;
            line-height: 1.43;
            letter-spacing: 0.01071em;
        }

        .MuiTypography-body1 {
            font-size: 1rem;
            font-family: "Roboto", "Helvetica", "Arial", sans-serif;
            font-weight: 400;
            line-height: 1.5;
            letter-spacing: 0.00938em;
        }

        .MuiTypography-caption {
            font-size: 0.75rem;
            font-family: "Roboto", "Helvetica", "Arial", sans-serif;
            font-weight: 400;
            line-height: 1.66;
            letter-spacing: 0.03333em;
        }

        .MuiTypography-button {
            font-size: 0.875rem;
            font-family: "Roboto", "Helvetica", "Arial", sans-serif;
            font-weight: 500;
            line-height: 1.75;
            letter-spacing: 0.02857em;
            text-transform: uppercase;
        }

        .MuiTypography-h1 {
            font-size: 6rem;
            font-family: "Roboto", "Helvetica", "Arial", sans-serif;
            font-weight: 300;
            line-height: 1.167;
            letter-spacing: -0.01562em;
        }

        .MuiTypography-h2 {
            font-size: 3.75rem;
            font-family: "Roboto", "Helvetica", "Arial", sans-serif;
            font-weight: 300;
            line-height: 1.2;
            letter-spacing: -0.00833em;
        }

        .MuiTypography-h3 {
            font-size: 3rem;
            font-family: "Roboto", "Helvetica", "Arial", sans-serif;
            font-weight: 400;
            line-height: 1.167;
            letter-spacing: 0em;
        }

        .MuiTypography-h4 {
            font-size: 2.125rem;
            font-family: "Roboto", "Helvetica", "Arial", sans-serif;
            font-weight: 400;
            line-height: 1.235;
            letter-spacing: 0.00735em;
        }

        .MuiTypography-h5 {
            font-size: 1.5rem;
            font-family: "Roboto", "Helvetica", "Arial", sans-serif;
            font-weight: 400;
            line-height: 1.334;
            letter-spacing: 0em;
        }

        .MuiTypography-h6 {
            font-size: 1.25rem;
            font-family: "Roboto", "Helvetica", "Arial", sans-serif;
            font-weight: 500;
            line-height: 1.6;
            letter-spacing: 0.0075em;
        }

        .MuiTypography-subtitle1 {
            font-size: 1rem;
            font-family: "Roboto", "Helvetica", "Arial", sans-serif;
            font-weight: 400;
            line-height: 1.75;
            letter-spacing: 0.00938em;
        }

        .MuiTypography-subtitle2 {
            font-size: 0.875rem;
            font-family: "Roboto", "Helvetica", "Arial", sans-serif;
            font-weight: 500;
            line-height: 1.57;
            letter-spacing: 0.00714em;
        }

        .MuiTypography-overline {
            font-size: 0.75rem;
            font-family: "Roboto", "Helvetica", "Arial", sans-serif;
            font-weight: 400;
            line-height: 2.66;
            letter-spacing: 0.08333em;
            text-transform: uppercase;
        }

        .MuiTypography-srOnly {
            width: 1px;
            height: 1px;
            overflow: hidden;
            position: absolute;
        }

        .MuiTypography-alignLeft {
            text-align: left;
        }

        .MuiTypography-alignCenter {
            text-align: center;
        }

        .MuiTypography-alignRight {
            text-align: right;
        }

        .MuiTypography-alignJustify {
            text-align: justify;
        }

        .MuiTypography-noWrap {
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
        }

        .MuiTypography-gutterBottom {
            margin-bottom: 0.35em;
        }

        .MuiTypography-paragraph {
            margin-bottom: 16px;
        }

        .MuiTypography-colorInherit {
            color: inherit;
        }

        .MuiTypography-colorPrimary {
            color: #3f51b5;
        }

        .MuiTypography-colorSecondary {
            color: #f50057;
        }

        .MuiTypography-colorTextPrimary {
            color: rgba(0, 0, 0, 0.87);
        }

        .MuiTypography-colorTextSecondary {
            color: rgba(0, 0, 0, 0.54);
        }

        .MuiTypography-colorError {
            color: #f44336;
        }

        .MuiTypography-displayInline {
            display: inline;
        }

        .MuiTypography-displayBlock {
            display: block;
        }

    </style>

    <style data-jss="" data-meta="MuiInputAdornment">
        .MuiInputAdornment-root {
            height: 0.01em;
            display: flex;
            max-height: 2em;
            align-items: center;
            white-space: nowrap;
        }

        .MuiInputAdornment-filled.MuiInputAdornment-positionStart:not(.MuiInputAdornment-hiddenLabel) {
            margin-top: 16px;
        }

        .MuiInputAdornment-positionStart {
            margin-right: 8px;
        }

        .MuiInputAdornment-positionEnd {
            margin-left: 8px;
        }

        .MuiInputAdornment-disablePointerEvents {
            pointer-events: none;
        }

    </style>

    <style data-jss="" data-meta="makeStyles">
        .jss1 {
            font-size: 1.7em;
            font-weight: 700;
        }

        .jss2 {
            font-size: 1.2em;
            font-weight: 500;
        }

        .jss3 {
            font-size: 0.9em;
            font-weight: 500;
        }

        .jss4 {
            color: #B36916;
            font-size: 0.7em;
        }

        .jss5 {
            float: left;
            width: 20%;
            text-align: center;
        }

        .jss6 {
            width: 48px;
            border: 1px solid #0db25b;
            height: 48px;
            margin: 0 auto;
            position: relative;
            border-radius: 50%;
        }

        .jss7 {
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            margin: auto;
            position: absolute;
            max-width: 28px;
        }

        .jss8 {
            font-size: 13px;
            text-align: center;
            letter-spacing: .46px;
        }

        .jss9 {
            width: 30px;
            border: 1px solid #0db25b;
            padding: 1px;
            margin-right: 20px;
            border-radius: 50%;
        }

    </style>

	<br>
	<br>
	<br>

</body>
<!-- Audio Elements -->
<div class="game-audio-elements" style="display: none;">
    <audio id="requestAudio" preload="auto">
        <source src="{{ asset('audio/battle_request.mp3') }}" type="audio/mpeg">
    </audio>
    <audio id="acceptedAudio" preload="auto">
        <source src="{{ asset('audio/battle_accepted.mp3') }}" type="audio/mpeg">
    </audio>
    <audio id="screenCollapseAudio" preload="auto">
        <source src="{{ asset('audio/screen-collapse.mp3') }}" type="audio/mpeg">
    </audio>
    <audio id="countTimerAudio" preload="auto" loop>
        <source src="{{ asset('audio/timer.mp3') }}" type="audio/mpeg">
    </audio>
    <audio id="versusAudio" preload="auto">
        <source src="{{ asset('audio/versus.mp3') }}" type="audio/mpeg">
    </audio>
    <audio id="victoryAudio" preload="auto">
        <source src="{{ asset('audio/victory.mp3') }}" type="audio/mpeg">
    </audio>
</div>

<script src="{{ asset('js/game-audio.js') }}"></script>

</html>
