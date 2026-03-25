@extends('layouts.master')

@section('head')
<title>Play Games Online and Earn Money | Ludo, Cricket, Chess, Carrom &amp;amp; Many More Game</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
	#output {
		width: 100%;
		border: 1px solid black;
		padding: 5px;
	}

	.showhide {
		display: none;
	}

</style>
@endsection



@section('content')
<script>

</script>

<div class="main-area" style="padding-top: 60px;">
	<div class="battleCard-bg">
		<div class="battleCard">
			<div class="players cxy pt-2">
				<div class="flex-column cxy">
					<h5></h5><img src="{{asset('frontend/images/Avatar2.png')}}" width="50px" height="50px" alt="" style="border-radius: 50%;">
					<div style="line-height: 1;"><span class="Home_betCard_playerName__57U-C">{{$creator_detail->vplay_id}} </span></div>
				</div><img class="mx-3" src="{{asset('frontend/images/versus.png')}}" width="23px" alt="">
				<div class="flex-column cxy ">
					<h5> </h5><img src="{{asset('frontend/images/Avatar2.png')}}" width="50px" height="50px" alt="" style="border-radius: 50%;">
					<div style="line-height: 1;"><span class="Home_betCard_playerName__57U-C">{{$joiner_detail->vplay_id}} </span></div>
				</div>
			</div>
			<div class="amount cxy mt-2"><span style="opacity: 0.8;">Playing for</span><img class="mx-1" src="{{asset('frontend/images/global-rupeeIcon.png')}}" width="25x" alt=""><span style="font-size: 1.2em; font-weight: 700; opacity: 0.8;">{{ $battle_details->entry_fee}}</span></div>
			<div class="thin-divider-x my-3"></div>
		<div class="roomCode cxy flex-column">
				<div class="text-center">
					<div>Room Code</div><span><input type="hidden" id="roomCode1" value="{{ $battle_details->LOBBY_ID }}">{{ $battle_details->LOBBY_ID }}</span>
				</div><button class="bg-green playButton position-static mt-2" id="btn" >Copy Code</button>
			</div>

			<div class="cxy app-discription flex-column"><span style="opacity: 0.8;"> Play ludo game in Ludo King App</span>
				<div class="mt-2"><a href="https://play.google.com/store/apps/details?id=com.ludo.king" target="_blank" rel="noopener noreferrer"><img class="mr-2" src="{{asset('frontend/images/android.jpg')}}" width="128px" height="38px" alt=""></a><a href="https://itunes.apple.com/app/id993090598" target="_blank" rel="noopener noreferrer"><img src="{{asset('frontend/images/ios.png')}}" width="128px" height="38px" alt=""></a></div>
			</div>
			<div class="thin-divider-x my-3"></div>
			<div class="rules"><span class="cxy mb-1"><u>Game Rules</u></span>
				<ol class="list-group list-group-numbered">
					<li class="list-group-item">Record every game while playing.</li>
					<li class="list-group-item">For cancellation of game, video proof is necessary.</li>
					<li class="list-group-item">50 Penality will be charged for updating wrong result.</li>
					<li class="list-group-item">25 Penality will be charged for not updating result.</li>
				</ol>
			</div>

			<div class="match-status-border row">
				<div class="col-6" style="font-size:20px; font-weight:800">Match Status</div>
			</div>
			@if($battle_details->creator_result == null && $battle_details->joiner_result == null)

			@elseif($battle_details->joiner_result != null)
			<div class="match-status-border row">
				<div class="col-6" style="font-size:15px; font-weight:600">@if($battle_details->joiner_id == Auth::user()->id) You @else Opponent @endif Submit {{ $battle_details->joiner_result }}</div>
			</div>
			@elseif($battle_details->creator_result != null)
			<div class="match-status-border row">
				<div class="col-6" style="font-size:15px; font-weight:600">@if($battle_details->creator_id == Auth::user()->id) You @else Opponent @endif Submit {{ $battle_details->creator_result }}</div>
			</div>
			@endif


			@if($battle_details->joiner_id == Auth::user()->id && $battle_details->joiner_result != null)
			
			@elseif($battle_details->creator_id == Auth::user()->id && $battle_details->creator_result != null)

			@else
			<label class="radio-inline">
				<input type="radio" name="battleResult" id="won_div" value="win" onchange="chooseResult(this);" required> I Won
			</label>
			<label class="radio-inline">
				<input type="radio" name="battleResult" id="lost_div" value="lost" onchange="chooseResult(this);" required> I Lost
			</label>
			<label class="radio-inline">
				<input type="radio" name="battleResult" id="cancel_div" value="cancel" onchange="chooseResult(this);" required> Cancel
			</label>
			@endif
			
			
			
		
<style>
	.result-section {
		border: 2px solid #ccc;
		background: #f9f9f9;
		padding: 20px;
		border-radius: 12px;
		margin-bottom: 30px;
		box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
		transition: transform 0.3s ease;
	}
	.result-section:hover {
		transform: scale(1.02);
	}

	.result-title {
		font-size: 22px;
		font-weight: bold;
		margin-bottom: 15px;
	}

	.result-icon {
		font-size: 40px;
		margin-bottom: 10px;
	}

	.result-win {
		color: #28a745;
	}

	.result-lose {
		color: #dc3545;
	}

	.result-cancel {
		color: #ffc107;
	}

	.btn-submit {
		margin-top: 15px;
	}
</style>

<!-- Winner Form -->
<div id="win" class="result-section text-center">
	<form action="{{ url('/battle-result/'.$battle_details->id) }}" enctype="multipart/form-data" method="post">
		@csrf
		<input type="hidden" name="player_id" value="{{ Auth::user()->id }}">
		<input type="hidden" name="battleResult" value="win">

		<div class="result-icon result-win">🏆</div>
		<div class="result-title text-success">You Won!</div>

		<p>Please upload a screenshot of your win.</p>
		<input type="file" name="screenshot" id="imgInp" class="form-control mb-2" required>
		<a class="btn btn-primary mb-2" onclick="myFunction()">Preview</a><br>

		<input type="submit" class="btn btn-success btn-submit" value="Submit Result">
	</form>
</div>

<!-- Loser Form -->
<div id="lose" class="result-section text-center">
	<form id="loseForm" action="{{ url('/battle-result/'.$battle_details->id) }}" enctype="multipart/form-data" method="post">
		@csrf
		<input type="hidden" name="player_id" value="{{ Auth::user()->id }}">
		<input type="hidden" name="battleResult" value="lost">

		<div class="result-icon result-lose">😞</div>
		<div class="result-title text-danger">You Lost?</div>

		<p>Click the button below if you lost this battle.</p>

		<!-- Lost Confirmation Banner -->
		<div id="lost_banner" class="alert alert-danger" style="display: none;">
			<strong>Are you sure you lost?</strong><br><br>
			<button type="button" class="btn btn-outline-danger" onclick="submitLost()">Yes, I Lost</button>
			<button type="button" class="btn btn-outline-secondary" onclick="cancelLost()">No, Go Back</button>
		</div>

		<!-- Submit Button (Triggers Banner) -->
		<div id="lost_submit_button">
			<input type="button" class="btn btn-danger btn-submit" value="Submit Result" onclick="showLostBanner()">
		</div>
	</form>
</div>

<script>
	function showLostBanner() {
		document.getElementById('lost_banner').style.display = 'block';
		document.getElementById('lost_submit_button').style.display = 'none';
	}

	function cancelLost() {
		document.getElementById('lost_banner').style.display = 'none';
		document.getElementById('lost_submit_button').style.display = 'block';
	}

	function submitLost() {
		document.getElementById('loseForm').submit();
	}
</script>


<!-- Cancel Form -->
<div id="cancel" class="result-section text-center">
	<form action="{{ url('/battle-result/'.$battle_details->id) }}" enctype="multipart/form-data" method="post">
		@csrf
		<input type="hidden" name="player_id" value="{{ Auth::user()->id }}">
		<input type="hidden" name="battleResult" value="cancel">

		<div class="result-icon result-cancel">⚠️</div>
		<div class="result-title text-warning">Cancel Battle</div>

		<p>Select a reason for cancelling this battle:</p>
		<select name="cancel_reason" class="form-control mb-3" required>
			<option value="">-- Select Reason --</option>
			<option value="Opponent not responding">Opponent not responding</option>
			<option value="Technical issues">Technical issues</option>
			<option value="Started by mistake">Started by mistake</option>
			<option value="Opponent cheated">Opponent cheated</option>
			<option value="Other">Other</option>
		</select>

		<input type="submit" class="btn btn-warning btn-submit" value="Submit Result">
	</form>
</div>

<script>
	function confirmLost() {
		const banner = document.getElementById('lost_banner');
		if (!banner.style.display || banner.style.display === 'none') {
			banner.style.display = 'block';
			return false; // First click shows warning
		}
		return true; // Second click submits
	}
</script>

<script>
    imgInp.onchange = evt => {
  const [file] = imgInp.files
  const url = URL.createObjectURL(file)
  console.log(url)
  
  
}

function myFunction() {
    const [file] = imgInp.files
  const url = URL.createObjectURL(file)
  console.log(url)
  
  window.open(url);
}
</script>

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
    var result = copyToClipboard("{{ $battle_details->LOBBY_ID }}");
    
    alert("Copied the text: " + "{{ $battle_details->LOBBY_ID }}");
};
//  let text = document.getElementById('roomCode1').value;
//   const copyContent = async () => {
//     try {
//       await navigator.clipboard.writeText({{ $battle_details->LOBBY_ID }});
//       alert("Copied the text: " +{{ $battle_details->LOBBY_ID }});
//     } catch (err) {
//       console.error('Failed to copy: ', err);
//     }
//   }

</script>


<script>
	$(function() {

		// listen for changes
		$('input[type="radio"]').on('change', function() {

			// get checked one            
			var $target = $('input[type="radio"]:checked');
			// hide all divs with .showhide class
			$(".showhide").hide();
			// show div that corresponds to selected radio.
			$($target.attr('data-section')).show();

			// trigger the change on page load
		}).trigger('change');

	});

</script>

<script>
	$(document).ready(function() {

		document.getElementById("win").style.display = "none";
		document.getElementById("lose").style.display = "none";
		document.getElementById("cancel").style.display = "none";
	});


	/*$(document).ready(function() {
		$("#won_div").click(function() {
			$("#screen_shot_upload:hidden").show('slow');
			$("#lost_message").hide();
			$("#cancel_reason").hide();
		});

	});

	$(document).ready(function() {
		$("#lost_div").click(function() {
			$("#screen_shot_upload").hide();
			$("#lost_message:hidden").show('slow');
			$("#cancel_reason").hide();
		});

	});


	$(document).ready(function() {
		$("#cancel_div").click(function() {
			$("#screen_shot_upload").hide();
			$("#lost_message").hide();
			$("#cancel_reason:hidden").show('slow');
		});

	});*/

</script>


	<script>
				function chooseResult(that) {
					if (that.value == "win") {
						//alert('win');
						document.getElementById("win").style.display = "block";
						document.getElementById("lose").style.display = "none";
						document.getElementById("cancel").style.display = "none";
					}
					if (that.value == "lost") {
						//alert('lost');
						document.getElementById("win").style.display = "none";
						document.getElementById("lose").style.display = "block";
						document.getElementById("cancel").style.display = "none";
					}
					if (that.value == "cancel") {
						//alert('cancel');
						document.getElementById("win").style.display = "none";
						document.getElementById("lose").style.display = "none";
						document.getElementById("cancel").style.display = "block";
					}
				}

			</script>
@endsection
