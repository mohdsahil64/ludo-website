@extends('layouts.master')

@section('head')
<title>Play Games Online and Earn Money | Ludo, Cricket, Chess, Carrom &amp;amp; Many More Game</title>

@endsection



@section('content')
<div class="main-area" style="padding-top: 60px;">
	<div class="px-4 py-3">
		<div class="games-section">
			<div class="d-flex position-relative align-items-center">
				<div class="games-section-title">Choose amount to add</div>
			</div>
		</div>
			@if($activated_gateway->name == 'Paytm')
			  <form action="{{ url('paytm-Gateway') }}" method="post">
			@endif
			@if($activated_gateway->name == 'Cashfree')
			  <form action="{{ route('store') }}" method="post">
			@endif
			@if($activated_gateway->name == 'UPI Gateway')
              <form action="{{ url('upigateway/create') }}" method="post">
			@endif

			@csrf
			<input type="hidden" class="form-control" name="mobile" id="mobile" value="{{ Auth::user()->mobile }}" placeholder="mobile">
			<input type="hidden" class="form-control" name="vplay_id" id="vplay_id" value="{{ Auth::user()->vplay_id }}" placeholder="Vplay Id">

			<div class="pb-3">

				<div class="MuiFormControl-root mt-4 MuiFormControl-fullWidth">
					<div class="MuiFormControl-root MuiTextField-root"><label class="MuiFormLabel-root MuiInputLabel-root MuiInputLabel-formControl MuiInputLabel-animated MuiInputLabel-shrink" data-shrink="true">Enter Amount</label>
						<div class="MuiInputBase-root MuiInput-root MuiInput-underline jss1 MuiInputBase-formControl MuiInput-formControl MuiInputBase-adornedStart">
							<div class="MuiInputAdornment-root MuiInputAdornment-positionStart">
								<p class="MuiTypography-root MuiTypography-body1 MuiTypography-colorTextSecondary">₹</p>
							</div>

						@if($activated_gateway->name == 'Paytm')
						 <input name="amount"  type="number" class="MuiInputBase-input" id="Textfield"   min="{{ $activated_gateway->min_add_amount }}" max="{{ $activated_gateway->max_add_amount }}" required autocomplete="off">
						@endif
						@if($activated_gateway->name == 'Cashfree')
						   <input name="amount"  type="number" class="MuiInputBase-input "  id="Textfield"  min="{{ $activated_gateway->min_add_amount }}" max="{{ $activated_gateway->max_add_amount }}" required autocomplete="off">
						@endif
						@if($activated_gateway->name == 'UPI Gateway')
						    <input name="amount"  type="number" class="MuiInputBase-input" id="Textfield"   min="{{ $activated_gateway->min_add_amount }}" max="{{ $activated_gateway->max_add_amount }}" required autocomplete="off">
						@endif


						</div>
						<p class="MuiFormHelperText-root">

						@if($activated_gateway->name == 'Paytm')
						  Min: {{ $activated_gateway->min_add_amount }}, Max: {{ $activated_gateway->max_add_amount }}
						@endif
						@if($activated_gateway->name == 'Cashfree')
						  Min: {{ $activated_gateway->min_add_amount }}, Max: {{ $activated_gateway->max_add_amount }}
						@endif
						@if($activated_gateway->name == 'UPI Gateway')
						   Min: {{ $activated_gateway->min_add_amount }}, Max: {{ $activated_gateway->max_add_amount }}
						@endif

						</p>
					</div>
				</div>
				<div class="games-window">
					<div class="gameCard-container" id="amount1">
						<div class="add-fund-box">
							<div style="display: flex; align-items: baseline;">
								<div class="collapseCard-title mr-1" style="font-size: 0.9em;">₹</div>
								<div class="collapseCard-title" style="font-size: 1.5em;">100</div>
							</div>
						</div>
					</div>
					<div class="gameCard-container" id="amount2">
						<div class="add-fund-box">
							<div style="display: flex; align-items: baseline;">
								<div class="collapseCard-title mr-1" style="font-size: 0.9em;">₹</div>
								<div class="collapseCard-title" style="font-size: 1.5em;">200</div>
							</div>
						</div>
					</div>
					<div class="gameCard-container" id="amount3">
						<div class="add-fund-box">
							<div style="display: flex; align-items: baseline;">
								<div class="collapseCard-title mr-1" style="font-size: 0.9em;">₹</div>
								<div class="collapseCard-title" style="font-size: 1.5em;">500</div>
							</div>
						</div>
					</div>
					<div class="gameCard-container" id="amount4">
						<div class="add-fund-box">
							<div style="display: flex; align-items: baseline;">
								<div class="collapseCard-title mr-1" style="font-size: 0.9em;">₹</div>
								<div class="collapseCard-title" style="font-size: 1.5em;">1000</div>
							</div>
						</div>
					</div>
				</div>

			</div>
			<div class="refer-footer">
				<!--<button disabled class="refer-button cxy w-100 bg-secondary disabledButton">Next</button>-->
				<button type="submit" class="disabledButton btn btn-primary btn-lg" style="width:100%" >DEPOSITE NOW</button>
			</div>
		</form>
	</div>
</div>
<script>
	/*$('#Textfield').keyup(function() {
		var textBox = $('#Textfield').val() * 1;
		if ((textBox >= 10) && (textBox <= 20000)) {
			$('.disabledButton').prop("disabled", false);
		} else {
			$('.disabledButton').prop("disabled", true);
		}
	});
*/

	//change amount on div click
	document.getElementById("amount1").onclick = function() {
		changeAmount1()
	};
	document.getElementById("amount2").onclick = function() {
		changeAmount2()
	};
	document.getElementById("amount3").onclick = function() {
		changeAmount3()
	};
	document.getElementById("amount4").onclick = function() {
		changeAmount4()
	};

	function changeAmount1() {
		document.getElementById('Textfield').value = '100';
		var textBox = $('#Textfield').val() * 1;
		if ((textBox >= 10) && (textBox <= 20000)) {
			$('.disabledButton').prop("disabled", false);
		} else {
			$('.disabledButton').prop("disabled", true);
		}
	}

	function changeAmount2() {
		document.getElementById('Textfield').value = '200';
		var textBox = $('#Textfield').val() * 1;
		if ((textBox >= 10) && (textBox <= 20000)) {
			$('.disabledButton').prop("disabled", false);
		} else {
			$('.disabledButton').prop("disabled", true);
		}
	}

	function changeAmount3() {
		document.getElementById('Textfield').value = '500';
		var textBox = $('#Textfield').val() * 1;
		if ((textBox >= 10) && (textBox <= 20000)) {
			$('.disabledButton').prop("disabled", false);
		} else {
			$('.disabledButton').prop("disabled", true);
		}
	}

	function changeAmount4() {
		document.getElementById('Textfield').value = '1000';
		var textBox = $('#Textfield').val() * 1;
		if ((textBox >= 10) && (textBox <= 20000)) {
			$('.disabledButton').prop("disabled", false);
		} else {
			$('.disabledButton').prop("disabled", true);
		}
	}

</script>

@endsection
