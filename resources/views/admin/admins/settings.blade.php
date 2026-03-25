@extends('admin.master')


@section('head')
<title> Dashboard</title>
@endsection


@section('content')


<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Admin Settings</h1>
	</div>


	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Set Admin Commission and Credentials</h6>
		</div>
		 @if(session()->has('success'))
							<div class="alert alert-success">
								{{ session()->get('success') }}
							</div>
							@endif
		<div class="card-body">
			<form action="{{ url('admin/update-comission/'.$comission->id) }}" method="post">
			@csrf
				<h6 class="text-primary"><u>Comission Settings</u></h6>
				<div class="form-group row">
					<label for="staticEmail" class="col-sm-2 col-form-label">Battle Comission (With Refferal)</label>
					<div class="col-sm-10">
						<input type="number" name="battle_comission_with_referral" required class="form-control" id="staticEmail" value="{{ $comission->battle_comission_with_referral }}">
					</div>
				</div>
				<div class="form-group row">
					<label for="staticEmail" class="col-sm-2 col-form-label">Refferal Comission</label>
					<div class="col-sm-10">
						<input type="number" name="refferal_comission" required class="form-control" id="staticEmail" value="{{ $comission->refferal_comission }}">
					</div>
				</div>
				<div class="form-group row">
					<label for="staticEmail" class="col-sm-2 col-form-label">Battle Comission (Without Refferal)</label>
					<div class="col-sm-10">
						<input type="number" name="battle_comission_without_referral" required class="form-control" id="staticEmail" value="{{ $comission->battle_comission_without_referral }}">
					</div>
				</div>
				<div class="form-group row">
					<label for="staticEmail" class="col-sm-2 col-form-label"></label>
					<div class="col-sm-10">
						<input type="submit" name="submit"  class="btn btn-info" value="Update Now">
					</div>
				</div>
			</form>
		</div>

        <div class="card-body">
			<form action="{{ route('admin.signup.bonus') }}" method="post">
			@csrf
				<h6 class="text-primary"><u>Sign Up Bonus</u></h6>
				<div class="form-group row">
					<label for="bonus" class="col-sm-2 col-form-label">Set SignUp Bonus Amount</label>
					<div class="col-sm-10">
					   <input type="number" name="signupbonus" class="form-control" id="bonus" value="{{ $bonus->amount }}" required>
				</div>

				<div class="form-group row">
					<label for="staticEmail" class="col-sm-2 col-form-label"></label>
					<div class="col-sm-10">
						<input type="submit" name="submit"  class="btn btn-info">
					</div>
				</div>
			</form>
		</div>

			<div class="card-body">
			<form action="{{ url('admin/mode') }}" method="post">
			@csrf
				<h6 class="text-primary"><u>Game Settings</u></h6>
				<div class="form-group row">
					<label for="staticEmail" class="col-sm-2 col-form-label">Mode</label>
					<div class="col-sm-10">
					   <select name="mode" id="mode">
					    	<option value="{{$mode['mode']}}">@if($mode['mode']=='yes')
					    	Manual RoomCode
					    	@endif
					    	@if($mode['mode']!='yes')
					        Auto RoomCode
					    	@endif
					    	</option>
			<option value="yes">Manual RoomCode</option>
			<option value="no">Auto RoomCode</option>
		</select>
				</div>

				<div class="form-group row">
					<label for="staticEmail" class="col-sm-2 col-form-label"></label>
					<div class="col-sm-10">
						<input type="submit" name="submit"  class="btn btn-info" value="Update Now">
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- /.container-fluid -->



@endsection
