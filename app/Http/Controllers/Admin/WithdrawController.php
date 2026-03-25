<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Battle;
use App\UserData;
use App\TransactionHistory;
use App\UserBankDetail;
use App\Payment;
use App\WithdrawRequest;

class WithdrawController extends Controller
{
    public function index(){
		$requests = WithdrawRequest::orderBy('id','DESC')->get();
		return view('admin.payments.withdraw_requests', compact('requests'));
	}
	
	public function withdraw_view($id){
		$request = WithdrawRequest::where('id',$id)->first();
		$userDetails = User::where('id',$request->user_id)->first();
		$userBank = UserBankDetail::where('id',$request->bank_details_id)->first();
		return view('admin.payments.withdraw_view', compact('request', 'userDetails', 'userBank'));
	}
	
	public function withdraw_approved($id){
		$request_w = WithdrawRequest::find($id);
		$request_w->status = 'success';
		$request_w->save();
		
		$trans  = TransactionHistory::where('order_id', $id)->first();
		$trans->withdraw_status = 'success';
		$trans->save();
		
		return redirect('admin/withdraw-request');
	}
	
	public function withdraw_reject($id){
	    $r_a = WithdrawRequest::find($id);
	    $r_u=$r_a->user_id;
	    $a=$r_a->amount;
	    $user=User::find($r_u);
	    $user->wallet=$user->wallet+$a;
	    $user->save();
	    $request_w = WithdrawRequest::find($id);
		$request_w->status = 'reject';
		$request_w->save();
		
		$trans  = TransactionHistory::where('order_id', $id)->first();
		$trans->withdraw_status = 'reject';
		$trans->save();
		
		return redirect('admin/withdraw-request');
	}
	
	
}
