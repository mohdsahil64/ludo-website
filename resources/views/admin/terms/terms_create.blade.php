@extends('admin.master')


@section('head')
 @if(isset($terms)) <title>Edit terms</title> @else <title>Add terms</title> @endif
@endsection


@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-2 text-gray-800"> @if(isset($terms)) Edit @else Add @endif </h1>
	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary"> @if(isset($terms)) EDIT @else CREATE @endif</h6>
		</div>
		<div class="card-body">
		@if(isset($terms))
		  
		    <form action="{{ url('admin/terms/update/'.$terms->id) }}" method="post" >
		@else
		   <form action="{{ url('admin/terms') }}" method="post" enctype="multipart/form-data">
		@endif
			
				@csrf

				<div class="com-md-12">
					<div class="form-group row">
						<label for="staticEmail" class="col-sm-2 col-form-label">Content Type</label>
						<div class="col-sm-10">
						    <input type='text' name='content_type' class='form-control' @if(isset($terms)) value="{{ $terms->content_type }}"  @else  placeholder="Enter Type"  @endif />
						</div>
					</div>
					<div class="form-group row">
						<label for="staticEmail" class="col-sm-2 col-form-label">Content</label>
						<div class="col-sm-10">
						    <textarea class='form-control' name='content' row='30' col='30' required >@if(isset($terms)){{ $terms->content }}@endif</textarea>
						</div>
					</div>
				</div>
				
				
				
				
				<div class="com-md-12">
					<div class="form-group row">
					<label for="staticEmail" class="col-sm-2 col-form-label"></label>
					<div class="col-sm-10">
					@if(isset($terms)) 
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
