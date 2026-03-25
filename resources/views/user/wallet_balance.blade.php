<div class="menu-items">
						<a class="box" href="{{ url('add-funds') }}">
							<picture class="moneyIcon-container"><img  src="{{asset('frontend/images/global-rupeeIcon.png')}}" alt=""></picture>
							<div class="mt-1 ml-1">
								<div class="moneyBox-header">Cash</div>
								<div class="moneyBox-text">₹{{ Auth::user()->wallet }}</div>
							</div>
							<picture class="moneyBox-add"><img src="{{asset('frontend/images/global-addSign.png')}}" alt=""></picture>
						</a>
						<a class="box ml-2" href="{{ url('comission-reedem') }}">
							<picture class="moneyIcon-container"><img src="{{asset('frontend/images/notification2.png')}}" alt=""></picture>
							<div class="mt-1 ml-1">
								<div class="moneyBox-header">Rafers</div>
								<div class="moneyBox-text">₹{{ Auth::user()->wallet_reffer }}</div>
							</div>
							
						</a>
					
						</div>
						