@extends('layouts.master') 

@section('content')


<div class="main-area">
				<div style="overflow-y: hidden;">
					<div class="splash-overlay"></div>
					<div class="splash-screen">
						<figure><img width="100%" src="{{asset('frontend/images/global-gameSheetSplash.png')}}" alt=""></figure>
					</div>
					<form name="loginform" action="{{ route('loginWithOtpSubmit') }}" method="post">
					@csrf
					<div class="position-absolute w-100 center-xy mx-auto" style="top: 45%; z-index: 4;">
						<div class="d-flex text-white font-15 mb-4">Sign in or Sign up</div>
						<div class="bg-white px-4 cxy flex-column height-70" id="incheight" style="width: 85%;  border-radius: 5px;">
						
							<div class="input-group" style="transition: top 0.5s ease 0s;">
								<div class="input-group-prepend">
									<div class="input-group-text" style="width: 100px;">+91</div>
								</div><input class="form-control" name="mobile" id="mobile" type="number" placeholder="Mobile number" min="0000000000" maxlength="10"  style="transition: all 3s ease-out 0s;" required>
							</div>
							 <span id="error" class="error"></span>
							<div class="input-group pt-2 otp" style="transition: left 0.5s ease 0s; ">
								<div class="input-group-prepend">
									<div class="input-group-text" style="width: 100px;">OTP</div>
								</div><input class="form-control" name="otp" type="number" placeholder="Enter OTP" autocomplete="off" value=""  required>
								<div class="invalid-feedback">Enter a correct OTP</div>
							</div> 
						</div>
						<button type="submit" class="bg-green refer-button cxy mt-4 otp" style="width: 85%;">lOGIN</button>
						<a href="#" class="bg-green refer-button cxy mt-4 send-otp" onclick="sendOtp()" style="width: 85%;">Send OTP</a>
					</div>
					
					</form>
					
				<div class="login-footer">By proceeding, you agree to our <a href="/term-condition">Terms of Use</a>, <a href="/privacy-policy">Privacy Policy</a> and that you are 18 years or older. You are not playing from Assam, Odisha, Nagaland, Sikkim, Meghalaya, Andhra Pradesh, or Telangana.</div>
				</div>
			</div>



    <script>
        $('.otp').hide();
        function sendOtp() {
			let mobile = document.forms["loginform"]["mobile"].value;
			  if (mobile == "" || mobile.length < 10) {
					error.textContent = "Please enter a valid number"
					error.style.color = "red"
				
				return false;
			  }
			
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            //alert($('#mobile').val());
            $.ajax( {
                url:'sendOtp',
                type:'post',
                data: {'mobile': $('#mobile').val()},
                success:function(data) {
                    
                    // alert(data);
                    //if(data != 0){
                        $('.otp').show();
                        $('.error').hide();
                        $('.send-otp').hide();
                        sendotpDetails(mobile);
						const incHeight = document.getElementById("incheight");
			             incHeight.classList.add("height-120");
                   /* }else{
                        alert('Mobile No not found');
                    }*/
                },
                error:function () {
                    console.log('error');
                }
            });
        }
        
        
        
        
        function sendotpDetails(mobile)
        {
                // console.log(mobile);
                const xhttp = new XMLHttpRequest();
                xhttp.onload = function() {
                    var demo_show = this.responseText;
                    // console.log(demo_show);
                }
                xhttp.open("GET", "sendotptomobile.php?mobile="+mobile);
                xhttp.send();
        }
    </script>
    <style>
		.height-70{
			height: 70px;
		}
		.height-120{
			height: 120px;
		}
		
    </style>
@endsection