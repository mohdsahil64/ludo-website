@extends('admin.master')


@section('head')
 @if(isset($game)) <title>Edit Notification</title> @else <title>Add Notification</title> @endif
@endsection


@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-2 text-gray-800"> @if(isset($game)) Edit @else Add @endif Notification</h1>
	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Notification @if(isset($game)) EDIT @else CREATE @endif</h6>
		</div>
		<div class="card-body">
		@if(isset($game))
		  
		    <form action="{{ url('admin/notifications/update/'.$game->id) }}" method="post" enctype="multipart/form-data">
		@else
		   <form action="{{ url('admin/notifications') }}" method="post" enctype="multipart/form-data">
		@endif
			
				@csrf

				<div class="com-md-12">
					<div class="form-group row">
						<label for="staticEmail" class="col-sm-2 col-form-label">Message</label>
						<div class="col-sm-10">
						    <textarea class="form-control"  name="message" @if(isset($game)) value="{{ $game->message }}"  @else  placeholder="Enter Notification"  @endif required></textarea>
						</div>
					</div>
				</div>
				
				
				<div class="com-md-12">
					<div class="form-group row">
						<label for="staticEmail" class="col-sm-2 col-form-label">Status</label>
						<div class="col-sm-10">
							<select name="status" id="" class="form-control" required>
								<option value="active" @if(isset($game)) @if($game->status=='active') selected @endif @endif>Active</option>
								<option value="inactive"  @if(isset($game)) @if($game->status=='inactive') selected @endif @endif>De-Active</option>
							</select>
						</div>
					</div>
				</div>
				
				<div class="com-md-12">
					<div class="form-group row">
					<label for="staticEmail" class="col-sm-2 col-form-label"></label>
					<div class="col-sm-10">
					@if(isset($game)) 
					 	<input type="submit" value="Update" class="btn btn-primary">
					@else  
						<input type="submit" value="Submit" class="btn btn-primary">
					@endif
						
						<a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
						</div>
					</div>
				</div>
				
		
				</form>
			</form>
		</div>
	</div>

</div>
<!-- /.container-fluid -->


@endsection
