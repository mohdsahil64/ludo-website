@extends('layouts.master')

@section('head')
<title>Play Games Online and Earn Money | Ludo, Cricket, Chess, Carrom &amp;amp; Many More Game</title>
@endsection



@section('content')
<div class="main-area" style="padding-top: 60px;">
	<div class="collapseCard-container">
		<div class="collapseCard">
			<a href="https://www.youtube.com/" style="text-decoration: none;">
				<div class="collapseCard-body" style="height: 64px; opacity: 1; transition: height 0.3s ease 0s, opacity 0.3s ease 0s;">
					<div class="collapseCard-text"><a href="{{ url('support') }}">Contact Us +919602626070 &amp; +918619994865 </a></div>
					<picture class="collapseCard-closeIcon">
						<img class="position-relative" <img src="{{asset('frontend/images/sahil1.png')}}" alt="WhatsApp">
				</picture>
				</div>
			</a>
			
			<div class="collapseCard-header" style="left: 22px; transition: left 0.3s ease 0s;">
				<picture>
					<img height="10px" width="14px" src="{{asset('frontend/images/global-ytPlayIcon.png')}}" alt="">
				</picture>
				<div class="collapseCard-title ml-1 mt-1">Customer Care Of Indian Ludo</div>
			</div>
		</div>
		</div>
		
<?php $marque_notification = App\MarqueeNotification::where('status','1')->first(); ?>
@if($marque_notification)
<div class="alert alert-danger" role="alert">
  <marquee behavior="scroll" direction="left"><b>{{ $marque_notification->marquee_text }}</b></marquee>
</div>
@endif




	<section class="games-section p-3">
		<div class="d-flex align-items-center games-section-title">Our Games</div>
		<div class="games-section-headline mt-2 mb-1">
			<div class="games-window">
			@foreach($games as $game)
				<div class="gameCard-container">
				<span class="blink text-danger d-block text-right">🔴 LIVE </span>
					<a class="gameCard" href="{{ url('lobby/'.$game->url) }}">
						<picture class="gameCard-image">
							<img width="100%" src="{{asset('images/games/'.$game->game_image)}}" alt="">

						</picture>
						<div class="gameCard-title">{{ $game->game_name }}</div>
						<picture class="gameCard-icon">
							<img src="{{asset('frontend/images/global-battleIconWhiteStroke.png')}}" alt="">
						</picture>
					</a>
				</div>
				
				@endforeach
				<!--<div class="gameCard-container">
					<span class="blink text-danger d-block text-right">╤В╨е╨┤тХи╨в╤В╨е╨╕тХитХЦ╤В╨е╨╕тХи╨╣ LIVE</span>
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
					<span class="blink text-danger d-block text-right">╤В╨е╨┤тХи╨в╤В╨е╨╕тХитХЦ╤В╨е╨╕тХи╨╣ Live</span>
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
					<span class="blink text-danger d-block text-right">╤В╨е╨┤тХи╨в╤В╨е╨╕тХитХЦ╤В╨е╨╕тХи╨╣ Live</span>
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
					<span class="blink text-danger d-block text-right">╤В╨е╨┤тХи╨в╤В╨е╨╕тХитХЦ╤В╨е╨╕тХи╨╣ Comming Soon</span>
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
					<span class="blink text-danger d-block text-right">╤В╨е╨┤тХи╨в╤В╨е╨╕тХитХЦ╤В╨е╨╕тХи╨╣ Comming Soon</span>
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
					<span class="blink text-danger d-block text-right">╤В╨е╨┤тХи╨в╤В╨е╨╕тХитХЦ╤В╨е╨╕тХи╨╣ Comming Soon</span>
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
					<span class="blink text-danger d-block text-right">╤В╨е╨┤тХи╨в╤В╨е╨╕тХитХЦ╤В╨е╨╕тХи╨╣ Comming Soon</span>
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
-->

			</div>
		</div>
	</section>



  <!-- Legal Links -->
  <div class="legal-section">
    <div class="legal-links">
      <a href="/terms">Terms</a>
      <a href="/privacy">Privacy</a>
      <a href="/responsible-gaming">Responsible Play</a>
      <a href="/faq">Help Center</a>
    </div>
    <div class="app-download">
      <div class="app-badges">
        <img src="https://cdn-icons-png.flaticon.com/512/2702/2702602.png" alt="Google Play" class="app-badge">
        <img src="https://cdn-icons-png.flaticon.com/512/2538/2538155.png" alt="App Store" class="app-badge">
      </div>
    </div>
  </div>



<style>
/* Modern Attractive Footer Styles */
.modern-footer {
  background: white;
  color: #333;
  font-family: 'Segoe UI', Roboto, sans-serif;
  padding: 40px 20px 20px;
  box-shadow: 0 -5px 30px rgba(0,0,0,0.05);
}

.footer-top {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 40px;
  max-width: 1200px;
  margin: 0 auto 30px;
}

.footer-brand {
  display: flex;
  flex-direction: column;
}

.footer-logo {
  width: 180px;
  height: auto;
  margin-bottom: 15px;
}

.tagline {
  font-size: 1.1rem;
  color: #666;
  margin-bottom: 20px;
}

.social-icons {
  display: flex;
  gap: 15px;
}

.social-icons img {
  width: 30px;
  height: 30px;
  transition: transform 0.3s;
}

.social-icons img:hover {
  transform: scale(1.1);
}

.footer-features {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 20px;
}

.feature-card {
  background: #f9f9f9;
  border-radius: 10px;
  padding: 20px;
  transition: all 0.3s;
}

.feature-card:hover {
  background: #f0f0f0;
  transform: translateY(-5px);
}

.feature-icon {
  width: 40px;
  height: 40px;
  margin-bottom: 10px;
}

.feature-card h4 {
  color: #2c3e50;
  margin: 0 0 8px 0;
  font-size: 1.1rem;
}

.feature-card p {
  color: #666;
  margin: 0;
  font-size: 0.9rem;
}

/* Enhanced Payment Section */
.payment-section {
  max-width: 1200px;
  margin: 0 auto 30px;
  padding: 20px 0;
}

.payment-title {
  text-align: center;
  color: #2c3e50;
  margin-bottom: 25px;
  font-size: 1.3rem;
  font-weight: 600;
}

.payment-methods-grid {
  display: flex;
  flex-direction: column;
  gap: 15px;
}

.payment-row {
  display: flex;
  justify-content: center;
  flex-wrap: wrap;
  gap: 15px;
}

.upi-row {
  margin-bottom: 10px;
}

.payment-method {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  background: white;
  border-radius: 10px;
  padding: 12px 15px;
  box-shadow: 0 3px 10px rgba(0,0,0,0.08);
  transition: all 0.3s;
  min-width: 100px;
}

.upi-method {
  background: #f5f9ff;
  border: 1px solid #e0ebff;
}

.payment-method:hover {
  transform: translateY(-3px);
  box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.payment-method img {
  width: 40px;
  height: 40px;
  object-fit: contain;
  margin-bottom: 8px;
}

.payment-method span {
  font-size: 0.85rem;
  color: #444;
  font-weight: 500;
}

/* Legal Section */
.legal-section {
  max-width: 1200px;
  margin: 0 auto 30px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  flex-wrap: wrap;
  gap: 20px;
}

.legal-links {
  display: flex;
  flex-wrap: wrap;
  gap: 15px;
}

.legal-links a {
  color: #555;
  text-decoration: none;
  font-weight: 500;
  transition: color 0.2s;
  font-size: 0.9rem;
  white-space: nowrap;
}

.legal-links a:hover {
  color: #3498db;
}

.app-badges {
  display: flex;
  gap: 10px;
}

.app-badge {
  height: 40px;
  border-radius: 7px;
  transition: transform 0.3s;
}

.app-badge:hover {
  transform: scale(1.05);
}

/* Copyright Section */
.copyright-section {
  text-align: center;
  color: #777;
  font-size: 0.9rem;
  padding-top: 20px;
  border-top: 1px solid #eee;
  max-width: 1200px;
  margin: 0 auto;
}

.disclaimer {
  color: #e74c3c;
  font-size: 0.8rem;
  margin-top: 10px;
  font-style: italic;
}

/* Mobile Responsive Design */
@media (max-width: 768px) {
  .footer-top {
    grid-template-columns: 1fr;
    gap: 30px;
  }
  
  .footer-features {
    grid-template-columns: 1fr;
    gap: 15px;
  }
  
  .payment-method {
    min-width: 80px;
    padding: 10px;
  }
  
  .payment-method img {
    width: 30px;
    height: 30px;
  }
  
  .payment-method span {
    font-size: 0.75rem;
  }
  
  .legal-section {
    flex-direction: column;
    text-align: center;
  }
  
  .legal-links {
    justify-content: center;
  }
  
  .footer-logo {
    width: 140px;
    margin: 0 auto 15px;
  }
  
  .tagline, .social-icons {
    text-align: center;
    justify-content: center;
  }
}

@media (max-width: 480px) {
  .payment-row {
    gap: 10px;
  }
  
  .payment-method {
    min-width: 70px;
    padding: 8px 5px;
  }
  
  .feature-card {
    padding: 15px;
  }
  
  .legal-links a {
    font-size: 0.8rem;
  }
  
  .app-badge {
    height: 35px;
  }
}
</style>
@endsection
