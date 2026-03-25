@foreach($battle_running as $row) <!-- battle running-->
		<?php $creator = App\User::where('id', $row->creator_id)->first(); 
				$joiner = App\User::where('id', $row->joiner_id)->first(); 
			 ?>
		<div id="633c3b4e85a962efab2f95db" class="betCard mt-1">
			<div class="d-flex"><span class="betCard-title pl-3 d-flex align-items-center text-uppercase">ENTRY FEE<img class="mx-1" src="{{asset('frontend/images/global-rupeeIcon.png')}}" width="23px" alt="">{{ $row->amount }}</span>
			
			@if($row->creator_id==Auth::user()->id || $row->joiner_id==Auth::user()->id)
				<div class=" d-flex align-items-center text-uppercase"><span class="ml-auto mr-3"><a href="{{url('/view-battle/'.$row->battle_id) }}" class="btn btn-info btn-sm" style="padding:3px; font-size:11px;">View</a></span></div>
			@endif
				<div class="betCard-title d-flex align-items-center text-uppercase"><span class="ml-auto mr-3">WINING PRIZE<img class="mx-1" src="{{asset('frontend/images/global-rupeeIcon.png')}}" width="23px" alt="">{{ $row->prize }}</span></div>
			</div>
			<div class="py-1 row">
				<div class="pr-3 text-center col-5">
					<div class="pl-2"><img class="border-50" src="{{asset('frontend/images/avatars/Avatar2.png')}}" width="28px" height="28px" alt=""></div>
					<div style="line-height: 1;"><span class="betCard-playerName">{{ $creator->vplay_id }} </span></div>
				</div>
				<div class="pr-3 text-center col-2 cxy">
					<div><img src="{{asset('frontend/images/versus.png')}}" width="21px" alt=""></div>
				</div>
				<div class="text-center col-5">
					<div class="pl-2"><img class="border-50" src="{{asset('frontend/images/avatars/Avatar2.png')}}" width="28px" height="28px" alt=""></div>
					<div style="line-height: 1;"><span class="betCard-playerName">{{$joiner->vplay_id}}</span></div>
				</div>
			</div>
		</div>
		@endforeach