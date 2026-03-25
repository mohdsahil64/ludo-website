@extends('admin.master')


@section('head')
<title> Player View </title>
@endsection


@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-2 text-gray-800">Player View </h1>
	<!-- DataTales Example -->
	<div class="card shadow mb-4">

		<div class="card-body">
			<div class="co-md-12" style="padding:30px">
				<div class="row">
					<div class="col-md-6">
						<img
                        @if (!empty($user_details->profile_pic))
                    src="{{ asset('images/profile') }}/{{ $user_details->id }}/{{ $user_details->profile_pic }}"
                    @else
                    src="{{asset('frontend/images/avatars/Avatar2.png')}}"
                @endif
                         style="width:120px; height:auto; border:5px solid #395fcf; border-radius:50%; float:left ">

						<div style="float:left; margin-top:20px;  margin-bottom:40px; margin-left:20px; color: #395fcf">
							<h3><i class="fa-solid fa-id-card-clip"></i> {{ $user_details->vplay_id }}</h3>
							<h3><i class="fa-solid fa-phone-volume"></i> {{ $user_details->mobile }}</h3>
						</div>
					</div>
					<div class="col-md-1">
						<div class="win" style="padding-top:24px">
							<img src="{{ asset('frontend/images/win.png') }}" style="width:60px">
							<div style="font-size:40px; color:green; float:right">{{ $user_details->total_win }}</div>
						</div>
					</div>
					<div class="col-md-1"></div>
					<div class="col-md-1">
						<div class="lost" style="padding-top:24px">
							<img src="{{ asset('frontend/images/lost.png') }}" style="width:60px"> <span style="font-size:40px; color:red; float:right">{{ $user_details->total_lost }}</span>
						</div>
					</div>
					<div class="col-md-1"></div>
					<div class="col-md-2">
						<div class="status" style="padding-top:24px">
						    @if($user_kyc_det != 0)
							@if($user_kyc_details->verify_status==1)
							<img src="{{ asset('/backend/img/verify.png') }}" style="width:50px; float:left">
							&nbsp; <span style="font-size:25px; color:Green;">Verified</span>
							@endif
							@if($user_kyc_details->verify_status!=1)
							<img src="{{ asset('/backend/img/unverify.png') }}" style="width:50px; float:left">&nbsp; <span style="font-size:25px; color:red;">Un-Verified</span>
							@endif
							@endif
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
					    @if($user_kyc_det != 0)
						<table class="table table-bordered">
							<tr style="background-color:#4e73df; color:white; font-weight:600">
								<th colspan="2">
									<h5> KYC Documents Details</h5>
								</th>
							</tr>
							<tr>
								<th>Document Name</th>
								<td>{{ $user_kyc_details->DOCUMENT_NAME }}</td>
							</tr>
							<tr>
								<th>Document Number</th>
								<td>{{ $user_kyc_details->DOCUMENT_NUMBER }}</td>
							</tr>
							<tr>
								<th>First Name </th>
								<td>{{ $user_kyc_details->DOCUMENT_FIRST_NAME }}</td>
							</tr>
							<tr>
								<th>Last Name </th>
								<td>{{ $user_kyc_details->DOCUMENT_LAST_NAME }}</td>
							</tr>
							<tr>
								<th>Date Of Birth </th>
								<td>{{ $user_kyc_details->DOCUMENT_DOB }}</td>
							</tr>
							<tr>
								<th>State </th>
								<td>{{ $user_kyc_details->DOCUMENT_STATE }}</td>
							</tr>
							<tr>
								<th>Front Side Image</th>
								<td align="center"><a href="{{ asset('/public/images/kycdata/'.$user_kyc_details->user_id.'/'.$user_kyc_details->DOCUMENT_FRONT_IMAGE) }}" target="_blank"><i class="fa-solid fa-image"  style="font-size:35px"></i></a></td>
							</tr>
							<tr>
								<th>Back Side Image</th>
								<td align="center"><a href="{{ asset('/public/images/kycdata/'.$user_kyc_details->user_id.'/'.$user_kyc_details->DOCUMENT_BACK_IMAGE) }}" target="_blank"><i class="fa-solid fa-image"  style="font-size:35px"></i></a></td>
							</tr>
							<tr>
								<th>Verify Document status</th>
								<td>@if($user_kyc_details->verify_status == 0)
									<span class="btn btn-danger"> PENDING </span>
									@else
									<span class="btn btn-success">  VERIFIED</span>
									@endif
								</td>
							</tr>
							@endif
						</table>
					</div>
					<div class="col-md-4">
						<table class="table table-bordered">
							<tr  style="background-color:#4e73df; color:white; font-weight:600">
								<th colspan="2">
									<h5> Bank Account Details</h5>
								</th>
							</tr>

							<tr>
								<th>UPI - Account Holder Name</th>
								<td>@if($user_bank_details) {{ $user_bank_details->upi_account_holder_name }}  @else Not Avaliable @endif</td>
							</tr>
							<tr>
								<th>UPI - Id</th>
								<td>@if($user_bank_details) {{ $user_bank_details->upi_id }} @else Not Avaliable  @endif</td>
							</tr>
							<tr>
								<th>Bank Account - Holder Name</th>
								<td>@if($user_bank_details) {{ $user_bank_details->bank_account_holder_name }} @else Not Avaliable  @endif</td>
							</tr>
							<tr>
								<th>Bank Account - Bank Account Number</th>
								<td>@if($user_bank_details) {{ $user_bank_details->bank_account_number }} @else Not Avaliable  @endif</td>
							</tr>
							<tr>
								<th>Bank Account - IFSC Code</th>
								<td>@if($user_bank_details) {{ $user_bank_details->ifsc_code }} @else Not Avaliable  @endif</td>
							</tr>

							<tr>
								<th>Created at</th>
								<td>@if($user_bank_details) {{ $user_details->created_at }} @else Not Avaliable  @endif</td>
							</tr>

						</table>
					</div>

					<div class="col-md-4">
						<table class="table table-bordered">
							<tr  style="background-color:#4e73df; color:white; font-weight:600">
								<th colspan="2">
									<h5> Other Details</h5>
								</th>
							</tr>
							<tr>
								<th>Email</th>
								<td>{{ $user_details->email }}</td>
							</tr>
							<tr>
								<th>Wallet</th>
								<td><img src="{{asset('frontend/images/global-rupeeIcon.png')}}" style="width:25px" alt="">{{ $user_details->wallet }} <form method="get" action="{{url('/admin/player-edit/'. $user_details->id)}}" > <input type="number" name="wallet"  /></td>
							</tr>
							<tr>
								<th>Refferal Code</th>
								<td>{{ $user_details->referral_code }}</td>
							</tr>
							<tr>
								<th>Reffered By</th>
								<td>{{ $user_details->reffered_by }}</td>
							</tr>

							<tr>
								<th>Created at</th>
								<td>{{ $user_details->created_at }}</td>
							</tr>
						</table>
						<div class="form-group row">
					<label for="staticEmail" class="col-sm-2 col-form-label"></label>
					<div class="col-sm-10">
						<input type="submit" name="submit"  class="btn btn-info" value="Update Now">
					</div>
					</form>
				</div>
					</div>

				</div>

			</div>
			<div class="col-md-6">
 <form action="{{ route('admin.add.penalty') }}" method="post">
							@csrf
								<div class="form-group row">
									<label for="staticEmail" class="col-sm-2 col-form-label">Penalty</label>
									<div class="row">
									    <div class="col">
									        <input type="hidden" class="form-control" name="loser" value="{{ $user_details->id }}">
									       
									    </div>
									    <div class="col">
									        <div class="col">
										<input type="number" class="form-control" placeholder="Amount" name="penalty">
									</div>
									    </div>
									</div>
									
								</div>
								<div class="form-group row">
									<label for="inputPassword" class="col-sm-2 col-form-label"></label>
									<div class="col-sm-10">
										<button type="submit" class="btn btn-primary">Submit</button>
									</div>
								</div>
							</form>
			</div>
		</div>
		
		<div class="table-responsive">
		    <h1>Transaction History</h1>
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <!--<table class="table table-stripped" width="100%" cellspacing="0">-->
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Order ID</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Amount</th>
                                            <th>Type</th>
                                            <th>Remark</th>
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                        @php
                                        $i=1;
                                        @endphp
                                        @foreach($trans_history as $trans)
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td>{{ $trans->order_id }}</td>
                                                <td>{{ $trans->day }}-{{ $trans->month }}-{{ $trans->year }}</td>
                                                <td>{{ $trans->paying_time }}</td>
                                                <td>{{ $trans->amount }}</td>
                                                <td>{{ $trans->add_or_withdraw }}</td>
                                                <td>{{ $trans->remark }}</td>
                                            </tr>
                                            @php
                                            $i++;
                                            @endphp
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            
	</div>
</div>
</div>

</div>
<!-- /.container-fluid -->


@endsection
