@extends('layouts.master')

@section('head')
<title>Play Games Online and Earn Money | Ludo, Cricket, Chess, Carrom &amp;amp; Many More Game</title>
@endsection



@section('content')
<div class="main-area" style="padding-top: 60px;">
	<div class="collapseCard-container">
		<div class="collapseCard">
			<a href="#!" style="text-decoration: none;">
				<div class="collapseCard-body" style="height: 64px; opacity: 1; transition: height 0.3s ease 0s, opacity 0.3s ease 0s;">
					<div class="collapseCard-text">How to win money in LudoMaster?</div>
					<picture class="collapseCard-closeIcon">
						<img class="position-relative" src="{{asset('frontend/images/global-circularCrossIcon.png')}}" alt="" width="14px" height="14px">
					</picture>
				</div>
			</a>
			<div class="collapseCard-header" style="left: 22px; transition: left 0.3s ease 0s;">
				<picture>
					<img height="10px" width="14px" src="{{asset('frontend/images/global-ytPlayIcon.png')}}" alt="">
				</picture>
				<div class="collapseCard-title ml-1 mt-1">Video Help</div>
			</div>
		</div>
	</div>
	<section class="games-section p-3">
		<div class="d-flex align-items-center games-section-title">Our Games</div>
		<div class="games-section-headline mt-2 mb-1">
			<div class="games-window">
				<div class="gameCard-container">
					<span class="blink text-danger d-block text-right">◉ LIVE</span>
					<a class="gameCard" href="#">
						<picture class="gameCard-image">
							<img width="100%" src="{{asset('frontend/images/games/kb_ludo.jpeg')}}" alt="">

						</picture>
						<div class="gameCard-title">Ludo Classics</div>
						<picture class="gameCard-icon">
							<img src="{{asset('frontend/images/global-battleIconWhiteStroke.png')}}" alt="">
						</picture>
					</a>
				</div>
				<div class="gameCard-container">
					<span class="blink text-danger d-block text-right">◉ LIVE</span>
					<a class="gameCard" href="#">
						<picture class="gameCard-image">
							<img width="100%" src="{{asset('frontend/images/games/kb_ludo_classic.jpeg')}}" alt="">
						</picture>
						<div class="gameCard-title">Ludo Popular</div>
						<picture class="gameCard-icon">
							<img src="{{asset('frontend/images/global-battleIconWhiteStroke.png')}}" alt="">
						</picture>
					</a>
				</div>


				<div class="gameCard-container">
					<span class="blink text-danger d-block text-right">◉ Live</span>
					<a class="gameCard" href="#">
						<picture class="gameCard-image">
							<img width="100%" src="{{asset('frontend/images/games/kb_ludo.jpeg')}}" alt="">

						</picture>
						<div class="gameCard-title">Ludo No Cut</div>
						<picture class="gameCard-icon">
							<img src="{{asset('frontend/images/global-battleIconWhiteStroke.png')}}" alt="">
						</picture>
					</a>
				</div>
				<div class="gameCard-container">
					<span class="blink text-danger d-block text-right">◉ Live</span>
					<a class="gameCard" href="#">
						<picture class="gameCard-image">
							<img width="100%" src="{{asset('frontend/images/games/kb_ludo_classic.jpeg')}}" alt="">
						</picture>
						<div class="gameCard-title">Ludo Ulta</div>
						<picture class="gameCard-icon">
							<img src="{{asset('frontend/images/global-battleIconWhiteStroke.png')}}" alt="">
						</picture>
					</a>
				</div>




				<div class="gameCard-container">
					<span class="blink text-danger d-block text-right">◉ Comming Soon</span>
					<a class="gameCard" href="#">
						<picture class="gameCard-image">
							<img width="100%" src="{{asset('frontend/images/rummy.png')}}" alt="">

						</picture>
						<div class="gameCard-title">Rummy</div>
						<picture class="gameCard-icon">
							<img src="{{asset('frontend/images/global-battleIconWhiteStroke.png')}}" alt="">
						</picture>
					</a>
				</div>
				<div class="gameCard-container">
					<span class="blink text-danger d-block text-right">◉ Comming Soon</span>
					<a class="gameCard" href="#">
						<picture class="gameCard-image">
							<img width="100%" src="{{asset('frontend/images/teen.png')}}" alt="">
						</picture>
						<div class="gameCard-title">Teen Patti</div>
						<picture class="gameCard-icon">
							<img src="{{asset('frontend/images/global-battleIconWhiteStroke.png')}}" alt="">
						</picture>
					</a>
				</div>


				<div class="gameCard-container">
					<span class="blink text-danger d-block text-right">◉ Comming Soon</span>
					<a class="gameCard" href="#">
						<picture class="gameCard-image">
							<img width="100%" src="{{asset('frontend/images/games/fantasy-cricket.jpeg')}}" alt="">
						</picture>
						<div class="gameCard-title">Snakes & Ladders</div>
						<picture class="gameCard-icon">
							<img src="{{asset('frontend/images/global-battleIconWhiteStroke.png')}}" alt="">
						</picture>
					</a>
				</div>
				<div class="gameCard-container">
					<span class="blink text-danger d-block text-right">◉ Comming Soon</span>
					<a class="gameCard" href="#">
						<picture class="gameCard-image">
							<img width="100%" src="{{asset('frontend/images/games/unnamed.webp')}}" alt="">
						</picture>
						<div class="gameCard-title">Dragon Tiger</div>
						<picture class="gameCard-icon">
							<img src="{{asset('frontend/images/global-battleIconWhiteStroke.png')}}" alt="">
						</picture>
					</a>
				</div>


			</div>
		</div>
	</section>
	<!------Main Content End------>

	<!------Footer Start------>
	<section class="footer">
		<div class="footer-divider"></div>
		<a class="px-3 py-4 d-block" href="#!" style="text-decoration: none;">
			<picture class="">
				<img width="100px" hight="20px" src="{{asset('frontend/images/vplay-logo.png')}}" alt="">Terms &amp; Condition</a><spam>
			</picture>
			<span style="color: rgb(149, 149, 149); font-size: 0.8em; font-weight: 400;"> 
			<picture class="footer-arrow">
				<img width="21px" src="{{asset('frontend/images/global-grey-dropDown.png')}}" alt="">
			</picture>
		</a>
		<div class="px-3 overflow-hidden" style="height: 0px; transition: height 0.5s ease 0s;">
			<div class="row footer-links">
				<a class="col-6" href="/term-condition">Terms &amp; Condition</a>
				<a class="col-6" href="/privacy-policy">Privacy Policy</a>
				<a class="col-6" href="/refund-policy">Refund/Cancellation Policy</a>
				<a class="col-6" href="/contact-us">Contact Us</a>
				<a class="col-6" href="/responsible-gaming">Responsible Gaming</a>
			</div>
		</div>
		<div class="footer-divider"></div>
		<div class="px-3 py-4">
		