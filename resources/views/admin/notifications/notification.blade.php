@extends('admin.master')


@section('head')
<title> Notification </title>
@endsection


@section('content')

     <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Notification</h1>
                     @if(session()->has('success'))
							<div class="alert alert-success">
								{{ session()->get('success') }}
							</div>
							@endif
            <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
							<h6 class="m-0 font-weight-bold text-primary">ALL Notifications <a href="{{ url('admin/notifications/create') }}" style="float:right" class="btn btn-primary btn-sm"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add notification</a></h6>
                        </div>
                        <div class="card-body">
                           
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>ID</th>
                                            <th>Message</th>
                                            <th>Status</th>
                                            <th>Action </th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                  
                                      <?php $i=1; ?>
                                       @foreach($notification as $game)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $game->id }}</td>
                                            <td>{{ $game->message }}</td>
                                            
											<td>@if($game->status == 'active')
												<span class="text-success">Active</span>
											    @else
											      <span class="text-danger">De-activate</span>
											    @endif
											</td>
											<td>
                                             <a href="{{ url('admin/notifications/'.$game->id) }}" class="btn btn-info btn-sm" >View</a>
                                             
                                             <a href="{{ url('admin/notifications/'.$game->id.'/edit') }}" class="btn btn-warning btn-sm" >Edit</a>
                                             
                                             <a href="{{ url('admin/notifications/destroy/'.$game->id) }}" onclick="return confirm('Do you want to Delete notification ?');" class="btn btn-danger btn-sm" >Delete</a>
                                             </td>
                                        </tr>
                                         <?php $i++; ?>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->   
       

@endsection
