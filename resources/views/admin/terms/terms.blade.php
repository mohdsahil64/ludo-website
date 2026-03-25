@extends('admin.master')


@section('head')
<title> terms </title>
@endsection


@section('content')

     <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">terms</h1>
                     @if(session()->has('success'))
							<div class="alert alert-success">
								{{ session()->get('success') }}
							</div>
							@endif
            <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
							<!--<h6 class="m-0 font-weight-bold text-primary">terms <a href="{{ url('admin/terms/create') }}" style="float:right" class="btn btn-primary btn-sm"><i class="fa fa-plus-circle" aria-hidden="true"></i>  terms</a></h6>-->
                        </div>
                        <div class="card-body">
                           
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>ID</th>
                                            <th>Type</th>
                                            <th>Action </th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                  
                                      <?php $i=1; ?>
                                       @foreach($terms as $game)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $game->id }}</td>
                                            <td>{{ $game->content_type }}</td>
                                            
											
											<td>
                                             <!--<a href="{{ url('admin/terms/'.$game->id) }}" class="btn btn-info btn-sm" >View</a>-->
                                             
                                             <a href="{{ url('admin/terms/'.$game->id.'/edit') }}" class="btn btn-warning btn-sm" >Edit</a>
                                             
                                             <!--<a href="{{ url('admin/terms/destroy/'.$game->id) }}" onclick="return confirm('Do you want to Delete notification ?');" class="btn btn-danger btn-sm" >Delete</a>-->
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
