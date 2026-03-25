@extends('admin.master')


@section('head')
<title>View Notification</title>
@endsection


@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-2 text-gray-800"><a href="{{ url()->previous() }}" class="btn btn-secondary"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Back</a> View Notification</h1>
	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Notification VIEW</h6>
		</div>
		<div class="card-body">
			<table class="table table-stripped">
		    	<tr>
					 <th>ID</th>
					 <td>{{ $game->id }}</td>
		 		</tr>
		 		<tr>
					 <th>Message</th>
					 <td>{{ $game->message }}</td>
		 		</tr>
		 		
		 		<tr>
					 <th>Status</th>
					 <td>@if($game->status=='active') Active @else De-Active @endif</td>
		 		</tr>
			</table>
		</div>
	</div>

</div>
<!-- /.container-fluid -->


@endsection
