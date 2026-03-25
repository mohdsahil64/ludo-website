@extends('layouts.master')

@section('head')
<title>Play Games Online and Earn Money | Ludo, Cricket, Chess, Carrom &amp;amp; Many More Game</title>
<style>
	.resp-r {
		margin-left: 70px !important;
	}

	@media screen and (min-width: 480px) {
		.resp-r {
			margin-left: 130px !important;
		}
	}

	.Home_bgSecondary__0O2kV {
    background-color: #6c757d!important;
}
	.Home_playButton__V95wM {
    border: none;
    border-bottom-left-radius: 5px;
    border-color: initial;
    border-image-outset: 0;
    border-image-repeat: initial;
    border-image-slice: 100%;
    border-image-source: none;
    border-image-width: 1;
    border-radius: 5px;
    border-bottom-right-radius: 5px;
    border-top-left-radius: 5px;
    border-top-right-radius: 5px;
    bottom: 10px;
    font-size: .7em!important;
    height: 30px;
    padding: 0 22px;
    position: absolute;
    right: 10px;
}
	
	.Home_cxy__fI4uz {
    align-items: center;
    display: flex;
    justify-content: center;
}
</style>

<script>
	var auto_refresh = setInterval(
		function() {
			$('#openBat').load('<?php echo url('/battle_end/'.$game_id); ?>');
		}, 1000);

</script>
<script>
	var auto_refresh = setInterval(
		function() {
			$('#openBattle').load('<?php echo url('/battle_open/'.$game_id); ?>');
		}, 1000);

</script>


<script>
	var auto_refresh = setInterval(
		function() {
			$('#runningBattle').load('<?php echo url('/battle_running/'.$game_id); ?>');
		}, 1000);

</script>
@endsection



@section('content')

<div class="main-area" style="padding-top: 60px;">

	<!---------------------------
	-----------------------------
	Code For SET BATTLE START
	-----------------------------
	---------------------------->
	<span class="cxy battle-input-header">Create a Battle!</span>
	<div class=" d-flex my-2 w-60 resp-r">
		<form action="{{ url('create-lobby') }}" method="post">
			<input type="hidden" name="game_url" value="{{ $url }}">
			<input type="hidden" name="manual" value="{{$manual}}">
			@csrf
			<div>
				<input class="form-control" type="number" min="10" name="amount" placeholder="Amount" value="" required style="width:79%;">
				@if($manual == "yes")
				<input class="form-control" type="text" maxlength="8" minlength="8" name="code" placeholder="Room code" value="" required style="width:79%; margin-top:10px">
				@endif
				<button class="bg-green playButton cxy position-static" type="submit" style="margin: -35px; margin-right: -27px; float:right">Set</button>
			
 

			</div>

			<!--
			//ADD LEVEL BOX (DO NOT DELETE)
			<div style="margin-top:10px">
				<input type="number" class="form-control" type="tel" name="label" placeholder="Add Level" value="" style="float:left; width:79%;">
				<a href="{{ url('info-conditions') }}"><img class="ml-2" src="{{asset('frontend/images/global-grey-iButton.png')}}" alt="" style="float:right; margin-top:7px; margin-right:1px"></a>
			</div>
			//ADD LEVEL BOX (DO NOT DELETE)
			-->
			
		</form>
	</div>


	<!---------------------------
	-----------------------------
	Code For SET BATTLE END
	-----------------------------
	---------------------------->

	<div class="divider-x"></div>


	<div class="px-4 py-3">
		<div class="mb-2">
			<img src="{{asset('frontend/images/global-battleIconWhiteStroke.png')}}" width="20px" alt="">
			<span class="ml-2 games-section-title">Open Battles</span>
			<a href="{{ url('rules') }}"><span class="games-section-headline text-uppercase position-absolute mt-2 font-weight-bold" style="right: 1.5rem; top: 9.7rem;">Rules
					<img class="ml-2" src="{{asset('frontend/images/global-grey-iButton.png')}}" alt=""></span></a>
		</div>
		<div id="myOpenBattles"></div>

		<!--//Open Battle is here-->
		<div id="openBattle">

		</div>
		


	</div>
	<!---------------------------
	-----------------------------
	Code For OPEN BATTLE END
	-----------------------------
	---------------------------->

	<div class="divider-x"></div>


	<!---------------------------
	-----------------------------
	Code For Running Battle start
	-----------------------------
	---------------------------->
	<div class="px-4 py-3">
		<div class="mb-2"><img src="{{asset('frontend/images/global-battleIconWhiteStroke.png')}}" width="20px" alt=""><span class="ml-2 games-section-title">Running Battles </span></div>
		
		<div id="myRunningBattles"></div>
		


		<div id="runningBattle">


		</div>
		<div id="openBat">

		</div>
	</div>
	<!---------------------------
	-----------------------------
	Code For Running Battle end
	-----------------------------
	---------------------------->

</div>




@endsection
