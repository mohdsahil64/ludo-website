@extends('admin.master')


@section('head')
<title> Players </title>
@endsection


@section('content')

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
     <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Players</h1>
            <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">ALL PLAYERS</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>User ID</th>
                                            <th>Mobile No</th>
                                            <th>Wallet</th>
                                            <th>Refferal Code</th>
                                            <th colspan="2">Total Game Played </th>
                                            <th>Joined At </th>
                                            <th>Action </th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>User ID</th>
                                            <th>Mobile No</th>
                                            <th>Wallet</th>
                                            <th>Refferal Code</th>
                                            <th colspan="2">Total Game Played </th>
                                            <th>Joined At </th>
                                            <th>Action </th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                  
                                      <?php $i=1; ?>
                                       @foreach($users as $user)
                                        <?php $userDATA = App\UserData::where('user_id', $user->id)->first(); ?>
                                        <?php $userDATA1 = App\UserData::where('user_id', $user->id)->count(); ?>
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td><a href="{{ url('admin/player-view/'.$user->id) }}">
                                                @if($userDATA1 != 0)
                                                  @if($userDATA->verify_status==1) 
                                                  <img src="{{ asset('/backend/img/verify.png') }}" style="width:18px; float:left">
                                                  @endif
                                                  @if($userDATA->verify_status!=1) 
                                                   <img src="{{ asset('/backend/img/unverify.png') }}" style="width:18px; float:left">
                                                  @endif 
                                                 @endif &nbsp; {{ $user->vplay_id }}</a></td>
                                            <td><i class="fa-solid fa-phone-volume"></i> {{ $user->mobile }}</td>
											<td><form method="get" action="{{url('/admin/player-edit/'. $user->id)}}" > <input style="border:0px;text-align:center;margin:0px;" type="number" name="wallet" value="{{ $user->wallet }}" />
												<!--<a href="{{ url('admin/rechage-wallet/'.$user->id) }}" class="btn btn-success btn-sm" style="float:right">Recharge</a>
                                            </td>-->
                                            <td>{{ $user->referral_code }}</td>
											<td><span class="text-success"><img src="{{ asset('frontend/images/win.png') }}" style="width:30px"> {{ $user->total_win }}</span></td>
											<td><span class="text-danger"><img src="{{ asset('frontend/images/lost.png') }}" style="width:30px">{{ $user->total_lost }}</span></td>
                                            <?php 
											$date_time = explode(" ", $user->created_at);
											$date = $date_time[0];
											$date_explode = explode("-", $date);
											$year = $date_explode[0];
											$month = $date_explode[1];
											$day = $date_explode[2];
											$time = $date_time[1];
											?>
                                            <td><i class="fa-regular fa-clock"></i> {{$day}} / {{ $month }} / {{ $year }}  {{$time}}</td>
											<td><a href="{{ url('admin/transaction-history/'.$user->id) }}" class="btn btn-info btn-sm"><i class="fa-solid fa-rupee-sign"></i> <i class="fa-solid fa-clock"></i></a>
                                             <button type="submit" class="btn btn-success"><i class="fa-solid fa-check"></i></button>
                                             </form>
                                             <a href="{{ url('admin/block-user/'.$user->id) }}" class="btn btn-danger btn-sm" title="Block User" onclick="return confirm('Do you want to BLOCK this Player ?')"><i class="fa-solid fa-ban"></i></a></td>
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
