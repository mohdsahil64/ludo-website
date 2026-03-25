<div class="menu-items">
						<a class="box" href="{{ url('add-funds') }}">
							<picture class="moneyIcon-container"><img src="{{asset('frontend/images/global-rupeeIcon.png')}}" alt=""></picture>
							<div class="">
								<div class="moneyBox-header">Cash</div>
								<div class="moneyBox-text">₹{{ Auth::user()->wallet }}</div>
							</div>
							<picture class="moneyBox-add"><img src="{{asset('frontend/images/global-addSign.png')}}" alt=""></picture>
						</a>
						</div>
						<span class="mx-5">
							
						</span>