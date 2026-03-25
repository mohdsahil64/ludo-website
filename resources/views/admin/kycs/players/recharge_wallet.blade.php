@extends('admin.master')


@section('head')
<title> Players </title>
@endsection


@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-2 text-gray-800">Players</h1>
	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Recharge Wallet of "{{ $user->mobile }}"</h6>
		</div>
		<div class="card-body">
			<form method="post" action="{{ url('/admin/rechage-now') }}">
			  @csrf
			  <input type="hidden" name="id" value="{{ $user->id }}">
			  <input type="hidden" name="wallet" value="{{ $user->wallet }}">
				<div class="form-group row">
					<label for="staticEmail" class="col-sm-2 col-form-label">UserID</label>
					<div class="col-sm-10">
						<input type="text" readonly class="form-control-plaintext" id="staticEmail" name="vplay_id" value="{{ $user->vplay_id }}">
					</div>
				</div>
                <div class="form-group row">
					<label for="staticEmail" class="col-sm-2 col-form-label">Mobile No.</label>
					<div class="col-sm-10">
						<input type="text" readonly class="form-control-plaintext" id="staticEmail" name="mobile" value="{{ $user->mobile }}">
					</div>
				</div>
				 <div class="form-group row">
					<label for="staticEmail" class="col-sm-2 col-form-label">Amount to be Add</label>
					<div class="col-sm-10">
						<input type="number" value="0" name="amount" class="form-control">
					</div>
				</div>
				<div class="form-group row">
					<label for="staticEmail" class="col-sm-2 col-form-label"></label>
					<div class="col-sm-10">
						<input type="submit" value="Recharge Balance" class="btn btn-success">
					</div>
				</div>
			</form>
		</div>
	</div>

</div>
<!-- /.container-fluid -->


@endsection
