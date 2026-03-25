@extends('layouts.master')

@section('head')
<title>Play Games Online and Earn Money | Ludo, Cricket, Chess, Carrom &amp;amp; Many More Game</title>

@endsection



@section('content')
<div class="main-area" style="padding-top: 60px;">
	<div class="row">
	<div class="container">
		<div class="col mx-auto">
			<div class="card text-center mt-3">
				<div class="card-body " style="padding: 15px;">
					<h4 class="pt-1 text-left"><b>Withdraw through</b></h4>
					<div>
					<form action="{{ url('withdraw-now') }}" method="post">
					<input type="hidden" name="userid" value="{{ Auth::user()->id }}">
					<input type="hidden" name="get_amount_via" value="UPI Transfer">
					@csrf
						<div class="row bg-light p-1 ">
							<div class="text-left w-100 container" style="background: white;">
								<div class=" my-3" style="padding-top: 0px; height: 60px;">
									<div class="d-flex align-items-center" style="background-color: rgb(250, 250, 250); border: 1px solid grey; border-radius: 7px;">
										<div class="d-flex align-items-center" style="height: 60px; display: flex; text-align: center;"><img width="45px" src="{{asset('/frontend/images/UPI.png')}}" alt="" style="margin-left: 7px; padding-bottom: 10px; padding-left: 3px; padding-top: 5px;"></div>
										<div class="d-flex justify-content-center flex-column ml-4">
											<div class="text-left"><strong>Withdraw through UPI</strong><br><small class="text-warning">Minimum withdrawal amount ₹95</small></div>
											<div class="jss31"></div>
										</div><a href="{{ url('/withdraw-check') }}" class="btn btn-info ml-auto mr-3" >Edit</a>
									</div>
								</div>
								<div class="">
									<div>
										<div>
										<label for="username " class="mr-5"><i class="fa fa-university" aria-hidden="true"></i> Account holder name</label>
										
										<div class="col-12 mb-3 p-0">
										<input type="text" class="form-control" placeholder="Enter Account Name" name="upi_account_holder_name" value="@if(isset($user_bank_details)) {{ $user_bank_details->upi_account_holder_name }}  @endif" required="" >
										</div>
										</div>
										<label for="username " class="mr-5"><i class="fa fa-university" aria-hidden="true"></i> UPI ID </label>
										<div class="col-12 mb-3 p-0">
										<input type="text" class="form-control"  placeholder="Enter UPI ID" name="upi_id"  value="@if(isset($user_bank_details)) {{ $user_bank_details->upi_id }}  @endif  " required >
										</div>
									</div>
								</div>
							</div>
							<div class="container">
							<div>
							<label for="username " class="mr-5" style="float:left">
							<i class="fa fa-money" aria-hidden="true"></i> Amount</label>
							</div>
							<div class="field col-12 p-0 mt-1 mb-3">
							<input type="tel" class="form-control search-slt" name="amount" placeholder="amount" required>
							</div>
							<div class="col-12 p-0 mt-2 pt-3">
							<button type="submit" class=" btn-block btn-sm" style="height: 40px; background-color: rgb(15, 125, 44); color: white; border-radius: 21px;">Withdraw</button></div>
							</div>
						</div>
					</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>

@endsection
