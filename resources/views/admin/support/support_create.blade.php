@extends('admin.master')


@section('head')
 @if(isset($support)) <title>Edit Support</title> @else <title>Add Support</title> @endif
@endsection


@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-2 text-gray-800"> @if(isset($support)) Edit @else Add @endif Notification</h1>
	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Notification @if(isset($support)) EDIT @else CREATE @endif</h6>
		</div>
		<div class="card-body">
		@if(isset($support))
		  
		    <form action="{{ url('admin/support/update/'.$support->id) }}" method="post" >
		@else
		   <form action="{{ url('admin/support') }}" method="post" enctype="multipart/form-data">
		@endif
			
				@csrf

				<div class="com-md-12">
					<div class="form-group row">
						<label for="staticEmail" class="col-sm-2 col-form-label">Support No</label>
						<div class="col-sm-10">
						    <input type='text' name='support_no' class='form-control' @if(isset($support)) value="{{ $support->support_no }}"  @else  placeholder="Enter Support No"  @endif />
						</div>
					</div>
					<div class="form-group row">
						<label for="staticEmail" class="col-sm-2 col-form-label">Support Type</label>
						<div class="col-sm-10">
						    <input type='text' name='support_type' class='form-control' @if(isset($support)) value="{{ $support->support_type }}"  @else  placeholder="Enter Support Type"  @endif />
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
