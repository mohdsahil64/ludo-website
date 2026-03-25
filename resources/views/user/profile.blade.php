@extends('layouts.master')

@section('head')
<title>Play Games Online and Earn Money | Ludo, Cricket, Chess, Carrom &amp;amp; Many More Game</title>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
@endsection



@section('content')

<div class="main-area" style="padding-top: 60px;">
	<div class="p-3" style="background: rgb(250, 250, 250);">
		<div class="center-xy py-2">
		    <form action="{{ route('update.profile') }}" method="post" id="profileform" enctype="multipart/form-data">
                    @csrf
			<picture>
			    <label>
                    <input type="file" style="display:none"  name="profilepic" >
			    <img class="border-50" height="80px" width="80px"
                @if (!empty($user->profile_pic))
                    src="{{ asset('images/profile') }}/{{ $user->id }}/{{ $user->profile_pic }}"
                    @else
                    src="{{asset('frontend/images/avatars/Avatar2.png')}}"
                @endif
                 alt="">
                 </label>
                 </picture>
                  <!--<button type="submit" class="btn btn-success">Update</button>-->
                </form>
			<span class="battle-input-header mr-1">+91{{ e($user->mobile) }}</span>
                
            </span>
			<div class="text-bold my-3 vplay_id">{{ $user->name ?? __('Guest User') }}</div>

			
			</div>
			<div class="vplay_new_id" style="padding:30px;">
				<div class="MuiFormControl-root MuiTextField-root" style="vertical-align: bottom;">
					<div class="MuiInputBase-root MuiInput-root MuiInput-underline MuiInputBase-formControl MuiInput-formControl">
						<input aria-invalid="false" type="text" placeholder="Enter Username" class="MuiInputBase-input MuiInput-input username" value="">
					</div>
				</div><img onclick="saveVplayId()" class="ml-2" width="20px" src="{{asset('frontend/images/select-blue-checkIcon.png')}}" alt="">
			</div>
			<a class="d-flex align-items-center profile-wallet w-100" href="/wallet">
				<picture class="ml-4"><img width="32px" src="{{asset('frontend/images/sidebar-wallet.png')}}" alt=""></picture>
				<div class="ml-5 mytext text-muted ">My Wallet</div>
			</a>
		</div>
	</div>
	<div class="divider-x"></div>
	<div class="p-3">
		<div class="text-bold">Complete Profile</div>
		<div class="d-flex ">

			<div style="overflow-x: hidden;">
				<div class="react-swipeable-view-container" style="flex-direction: row; transition: transform 0.35s cubic-bezier(0.15, 0.3, 0.25, 1) 0s; direction: ltr; display: flex; will-change: transform; transform: translate(0%, 0px);">

					<div aria-hidden="false" data-swipeable="true" style="width: 100%; flex-shrink: 0; overflow: auto;">
					@if($userDatac != 0)
				        @if($userData[0]->verify_status == 1)
						   <a class="d-flex align-items-center profile-wallet bg-light mx-1 my-4 py-3" href="#">
							<picture class="ml-4"><img width="50px" src="{{asset('frontend/images/kyc-icon-new.png')}}" alt=""></picture>
							   <div class="ml-5 mytext text-muted "><span style="float:left; margin-top:9px;"> &nbsp;  </span><img src="{{ asset('/backend/img/approved.png') }}" style="width:40px;"></div>
						</a>
						@elseif($userData[0]->verify_status == null)
						<a class="d-flex align-items-center profile-wallet bg-light mx-1 my-4 py-3" href="{{url('/complete-kyc/step1')}}">
							<picture class="ml-4"><img width="32px" src="{{asset('frontend/images/kyc-icon-new.png')}}" alt=""></picture>
							<div class="ml-5 mytext text-muted "><span style="float:left; margin-top:8px;">KYC Rejected &nbsp;  </span><img src="{{ asset('/backend/img/rejected.png') }}" style="width:35px;"></div>
						</a>
						@else
						   @if($userData[0]->DOCUMENT_NAME == null && $userData[0]->DOCUMENT_NUMBER == null && $userData[0]->DOCUMENT_FIRST_NAME == null && $userData[0]->DOCUMENT_LAST_NAME == null && $userData[0]->DOCUMENT_DOB == null && $userData[0]->DOCUMENT_STATE == null && $userData[0]->DOCUMENT_FRONT_IMAGE == null && $userData[0]->DOCUMENT_BACK_IMAGE == null)
								<a class="d-flex align-items-center profile-wallet bg-light mx-1 my-4 py-3" href="{{url('/complete-kyc/step1')}}">
									<picture class="ml-4"><img width="32px" src="{{asset('frontend/images/kyc-icon-new.png')}}" alt=""></picture>
									<div class="ml-5 mytext text-muted ">Complete Your KYC</div>
								</a>
							@else
							    <a class="d-flex align-items-center profile-wallet bg-light mx-1 my-4 py-3" href="{{url('/complete-kyc/step1')}}">
									<picture class="ml-4"><img width="32px" src="{{asset('frontend/images/kyc-icon-new.png')}}" alt=""></picture>
									<div class="ml-5 mytext text-muted "><span style="float:left; margin-top:8px;">KYC Under Review&nbsp;  </span><img src="{{ asset('/backend/img/under_review.png') }}" style="width:35px;"></div>
								</a>

								@endif
						@endif
						@endif
					</div>

					<div aria-hidden="true" data-swipeable="true" style="width: 100%; flex-shrink: 0; overflow: auto;"><a class="d-flex align-items-center profile-wallet bg-light mx-1 my-4 py-3" onclick="showUpdateForm()">
							<picture class="ml-4"><img width="32px" src="{{asset('frontend/images/sahil2.png')}}" alt=""></picture>
							<div class="ml-5 mytext text-muted ">
							@if(isset($user->email))
							   EMAIL UPDATED ✅
						    	 @else
						    	 Update Email ID
							   @endif
							</div>
						</a>
					</div>
				</div>
			</div>

		</div>
	</div>
	<div class="divider-x"></div>
	<div class="px-3 py-1">
		<div class="d-flex align-items-center position-relative" style="height: 84px;">
			<picture><img height="32px" width="32px" src="{{asset('frontend/images/sidebar-referEarn.png')}}" alt=""></picture>
			@if(empty($user->reffered_by))
			<div class="pl-4">
				<div class="text-uppercase moneyBox-header" style="font-size: 0.8em;">Apply Direct Refer Code</div>
				<div class="refferForm">
					<div class="MuiFormControl-root MuiTextField-root" style="vertical-align: bottom;">
						<div class="MuiInputBase-root MuiInput-root MuiInput-underline MuiInputBase-formControl MuiInput-formControl"><input aria-invalid="false" type="text" class="MuiInputBase-input MuiInput-input refferalID" value=""></div>
					</div><img class="ml-2" onclick="saveRefferBy()" width="100px" src="{{asset('frontend/images/select-blue-checkIcon.png')}}" alt="">
				</div>

				<div class="refferIdshow">
					<div class="MuiFormControl-root MuiTextField-root" style="vertical-align: bottom;">
						<div class="MuiInputBase-root MuiInput-root MuiInput-underline MuiInputBase-formControl MuiInput-formControl"></div>
					</div>
				</div>
			</div>
			@else
			<div class="pl-4">
				<div class="text-uppercase moneyBox-header" style="font-size: 0.8em;">Your are Reffered By</div>
				<div class="refferForm">
					<div class="MuiFormControl-root MuiTextField-root" style="vertical-align: bottom;">
						<div class="MuiInputBase-root MuiInput-root MuiInput-underline MuiInputBase-formControl MuiInput-formControl">{{  $user->reffered_by }} </div>
					</div>
				</div>
				<div class="refferIdshow">

				</div>
			</div>
			@endif
		</div>
	</div>
	<div class="px-3 py-1">
		<div class="d-flex align-items-center position-relative" style="height: 84px;">
			<picture><img height="40px" width="40px" src="{{asset('frontend/images/global-cash-won-green-circular.png')}}" alt=""></picture>
			<div class="pl-4">
				<div class="text-uppercase moneyBox-header" style="font-size: 0.8em;">Total Cash Won</div>
				<div>
					<picture class="mr-1"><img height="auto" width="25px" src="{{asset('frontend/images/global-rupeeIcon.png')}}" alt=""></picture>
					<?php
					$battle_details = App\Battle::where('winner_id', Auth::user()->id)->get();
					$total_won_amount = 0;
					foreach($battle_details as $battle){
						$total_won_amount+=($battle->prize - $battle->entry_fee);
					}

				?>
					<span class="moneyBox-text" style="font-size: 1em; bottom: -1px;">₹ {{ $total_won_amount }}</span>
				</div><span class="thin-divider-x"></span>
			</div>
		</div>
	</div>
		<div class="px-3 py-1">
		<div class="d-flex align-items-center position-relative" style="height: 84px;">
			<picture><img height="50px" width="50px" src="{{asset('frontend/images/refer.png')}}" alt=""></picture>
			<div class="pl-4">
				<div class="text-uppercase moneyBox-header" style="font-size: 0.8em;">Total Referal Earnings:&nbsp;</div>
				<b><img src="{{asset('frontend/images/global-rupeeIcon.png')}}" height="auto" width="25px">    ₹{{ $user->wallet_reffer }}  </a></b></div>

	</div>
	</div>
	<div class="px-3 py-1">
		<div class="d-flex align-items-center position-relative" style="height: 84px;">
			<picture><img height="40px" width="40px" src="{{asset('frontend/images/global-purple-battleIcon.png')}}" alt=""></picture>
			<div class="pl-4">
			<?php
			$battle_created = App\Battle::where('creator_id', Auth::user()->id)->count();
			$battle_joined = App\Battle::where('joiner_id', Auth::user()->id)->count();
			$total_battle_played = $battle_created+$battle_joined;
				?>
				<div class="text-uppercase moneyBox-header" style="font-size: 0.8em;">Battle Played</div>
				<div><span class="moneyBox-text" style="font-size: 1em; bottom: -1px;">{{ $total_battle_played }}</span></div>
			</div>
		</div>
	</div>
	<div class="divider-x"></div>
	<div class="p-3"><a href="{{ route('logout') }}" onclick="event.preventDefault();  document.getElementById('logout-form').submit();" class="center-xy text-muted text-uppercase py-4 font-weight-bolder">Log Out</a></div>
	<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: Success;">
		@csrf
	</form>

	<div class="kyc-select">
		<div class="overlay"></div>
		<div class="box" style="bottom: 0px; position: absolute;">
			<div class="bg-white">
				<div class="header cxy flex-column">
					<picture><img class="border-50" height="80px" width="80px" src="{{asset('frontend/images/avatars/Avatar2.png')}}" alt=""></picture>
					<div class="custom-file mt-4">
						<input type="file" class="custom-file-input" id="profilePic" name="profilePic" accept="image/*">
						<label class="custom-file-label" for="screenshot">Browse your profile pic</label>
					</div>
					<span class="mt-2">OR</span>
					<div class="header-text mt-2">Choose Avatar</div>
				</div>
				<div class="mx-3 pb-3" style="padding-top: 300px;">
					<div class="row justify-content-between col-10 mx-auto">
						<img height="50px" width="50px" src="{{asset('frontend/images/avatars/Avatar1.png')}}" alt="">
						<img height="50px" width="50px" src="{{asset('frontend/images/avatars/Avatar2.png')}}" alt="">
						<img height="50px" width="50px" src="{{asset('frontend/images/avatars/Avatar3.png')}}" alt="">
						<img height="50px" width="50px" src="{{asset('frontend/images/avatars/Avatar4.png')}}" alt="">
					</div>
					<div class="row justify-content-between col-10 mx-auto mt-3">
						<img height="50px" width="50px" src="/images/avatars/Avatar5.png" alt="">
						<img height="50px" width="50px" src="{{asset('frontend/images/avatars/Avatar6.png')}}" alt="">
						<img height="50px" width="50px" src="{{asset('frontend/images/avatars/Avatar7.png')}}" alt="">
						<img height="50px" width="50px" src="{{asset('frontend/images/avatars/Avatar8.png')}}" alt="">
					</div>
				</div>
			</div>
		</div>
	</div>


	<div class="kyc-select" >
		<div class="overlay" id="overlay_id" onclick="closeUpdateForm()" style="pointer-events: auto; opacity: 0.87;"></div>
		<div class="box kyc-select-enter-done" style="bottom: 0px; position: absolute;">
			<div class="bg-white">
				<div class="header cxy flex-column">
					<div class="header-text mt-2">Update Email</div>
				</div>
				<div class="mx-3 pb-3" style="padding-top: 130px;">
				<form action="{{ url('user/update-email') }}" method="post">
			     @csrf
				   <div class="MuiFormControl-root MuiTextField-root d-flex m-auto w-80">
				       
						<div class="MuiInputBase-root MuiInput-root MuiInput-underline MuiInputBase-formControl MuiInput-formControl">
						    <!--<label class="MuiFormLabel-root MuiInputLabel-root MuiInputLabel-formControl MuiInputLabel-animated" data-shrink="false">Enter Email</label>-->
						<input aria-invalid="false" type="email" name="email" class="MuiInputBase-input MuiInput-input" value="@if(isset($user->email)) {{$user->email}} @else  @endif">
						</div>
					</div><button class="btn btn-success mt-3 text-uppercase d-flex mx-auto" style="font-weight: 500;">Update</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>


<script>
	$('.vplay_new_id').hide();

	function editVplayID() {
		$('.vplay_new_id').show();
		$('.vplay_id').empty();

	}

</script>

<script>
	function saveVplayId() {
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		//alert($('.username').val());
		$.ajax({
			url: 'saveVplayID',
			type: 'post',
			data: {
				'username': $('.username').val()
			},
			success: function(data) {
				// alert(data);
				//console.log('success');
				//console.log(data);
				//console.log(data.vplay_id);
				if (data != 0) {
					$('.vplay_new_id').hide();
					$('.vplay_id').append(data.vplay_id + '<img class="ml-2" width="20px" src="{{asset('frontend/images/icon-edit.jpg')}}" alt="" onclick="editVplayID()">');

				} else {
					alert('Refferal Code Not Updated!');
				}

			},
			error: function() {
				console.log('error');
			}
		});
	}


	function saveRefferBy() {
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		//alert($('.refferalID').val());
		$.ajax({
			url: 'saveRefferBy',
			type: 'post',
			data: {
				'refferalID': $('.refferalID').val()
			},
			success: function(data) {
				// alert(data);
				//console.log('success');
				//console.log(data);
				//console.log(data.referral_code);
				if (data != 0) {
					$('.refferForm').remove();
					$('.MuiInputBase-root').append(data.reffered_by);

				} else {
					alert('User Name Not Updated!');
				}
			},
			error: function() {
				console.log('error');
			}
		});
	}

</script>


<script>
 $(document).ready(function()
 {
    $('.kyc-select').hide();
 });
</script>
<script>
    $('input[type=file]').change(function(){
   $('#profileform').submit()
})
</script>
<script>
function showUpdateForm(){
	$('.kyc-select').show();
}
function closeUpdateForm(){
     $('.kyc-select').hide();
}
</script>


@endsection
