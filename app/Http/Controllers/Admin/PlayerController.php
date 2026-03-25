<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\UserBankDetail;
use App\UserData;
use App\TransactionHistory;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$users  = User::where('id','!=','1')->where('is_blocked','!=','1')->orderBy('id', 'DESC')->get();
		 $userDATA = UserData::where('user_id', 333)->first();
        return view('admin.players.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function recharge_wallet($user_id)
    {
		$user = User::where('id', $user_id)->first();
		return view('admin.players.recharge_wallet', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function recharge_now(Request $request)
    {
        $id = $request->id;
        $wallet = $request->wallet;
        $user_id = $request->vplay_id;
        $mobile = $request->mobile;
        $amount = $request->amount;
		$order_id = 'order_'.rand(1111111111,9999999999);
		$new_amount = $wallet+$amount;

		$user = User::find($id);
		$user->wallet = $new_amount;
		$user->save();

		     $Trans_hist = new TransactionHistory;
			 $Trans_hist->user_id = $id;
			 $Trans_hist->payment_id = 0;
			 $Trans_hist->order_id = $order_id;
			 $Trans_hist->day = date('d');
		   	 $Trans_hist->month = date('M');
			 $Trans_hist->year = date('Y');
			 $Trans_hist->paying_time = date('h:i A');
			 $Trans_hist->amount = $amount;
			 $Trans_hist->add_or_withdraw = 'add';
			 $Trans_hist->closing_balance = $new_amount;
			 $Trans_hist->remark = 'By Admin';
			 $Trans_hist->save();

		return redirect('admin/recharge-user');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function player_view($id)
    {
       $user_details  = User::where('id',$id)->first();
       $user_bank_details  = UserBankDetail::where('user_id',$id)->first();
       $user_kyc_details  = UserData::where('user_id',$user_details->id)->first();
       $user_kyc_det  = UserData::where('user_id',$user_details->id)->count();
       $trans_history = TransactionHistory::where('user_id',$id)->orderBy('id','desc')->get();

	   return view('admin.players.player_view ', compact('user_details', 'user_bank_details', 'user_kyc_details' , 'user_kyc_det','trans_history'));
    }


    public function player_edit(Request $request, $id)
    {


		$user = User::find($id);

        $wallet = $user->wallet;
        $amount = $request->wallet;
		$order_id = 'order_'.rand(1111111111,9999999999);
		$new_amount = $wallet+$amount;

		$user->wallet = $new_amount;
		$user->save();

		     $Trans_hist = new TransactionHistory;
			 $Trans_hist->user_id = $id;
			 $Trans_hist->payment_id = 0;
			 $Trans_hist->order_id = $order_id;
			 $Trans_hist->day = date('d');
		   	 $Trans_hist->month = date('M');
			 $Trans_hist->year = date('Y');
			 $Trans_hist->paying_time = date('h:i A');
			 $Trans_hist->amount = $amount;
			 $Trans_hist->add_or_withdraw = 'add';
			 $Trans_hist->closing_balance = $new_amount;
			 $Trans_hist->remark = 'Added in Wallet';
			 $Trans_hist->save();

        // $user = User::find($id);
		// $user->wallet = $request->wallet;
		// $user->save();

		return redirect('admin/players');


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function block_user($id)
    {
        $user = User::find($id);
		$user->is_blocked = '1';
		$user->save();

		return redirect('admin/players');
    }

	public function unblock_user($id)
    {
        $user = User::find($id);
		$user->is_blocked = '0';
		$user->save();

		return redirect('admin/players-blocked');
    }

	  public function block_players_list()
    {
        $blocked_users  = User::where('id','!=','1')->where('is_blocked','1')->orderBy('id', 'DESC')->get();
        return view('admin.players.block_players_list',compact('blocked_users'));
    }
}
