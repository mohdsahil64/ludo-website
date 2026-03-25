<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\UserData;
use App\UserBankDetail;
use App\WithdrawRequest;
use App\TransactionHistory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Validator;
use Alert;



class WithdrawController extends Controller
{
   public function withdraw_check(){
	    $user_id = Auth::user()->id;
	    $user_kyc = UserData::where('user_id',$user_id)->first();
	    return view('user.withdraw_kyc_check', compact('user_kyc'));
   } 
	
	public function withdraw_through_upi(){
	    $user_id = Auth::user()->id;
	    $user_bank_details = UserBankDetail::where('user_id',$user_id)->first();
	    return view('user.withdraw_through_upi', compact('user_bank_details'));
   }
	
	public function withdraw_now(Request $request){
	   
	   $upi_account_holder_name = $request->upi_account_holder_name;
	   $upi_id = $request->upi_id;
	   $amount = $request->amount;
	   $userid = $request->userid;
		 
		$search_data = UserBankDetail::where('user_id', $userid)->first();
		
		if($search_data){
			    $bank_details = UserBankDetail::find($search_data->id);
				$bank_details->upi_account_holder_name = $upi_account_holder_name;
				$bank_details->upi_id = $upi_id;
				$bank_details->save();
		}else{
				$bank_details = new UserBankDetail;
				$bank_details->upi_account_holder_name = $upi_account_holder_name;
				$bank_details->upi_id = $upi_id;
				$bank_details->user_id = $userid;
				$bank_details->save();
		}
			$user_wallet = User::where('id', Auth::user()->id)->first();
		$old_wallet = $user_wallet->wallet;
		if($old_wallet>=$amount){
		$withdraw  = new WithdrawRequest;
		$withdraw->user_id = $userid;
		$withdraw->bank_details_id = $bank_details->id;
		$withdraw->get_amount_via = $request->get_amount_via;
		$withdraw->amount = $amount;
		$withdraw->save();
		
		$user  = User::where('id',$userid)->first();
		
		$trans  = new TransactionHistory;
		$trans->user_id = $userid;
		$trans->order_id = $withdraw->id;
		$trans->day = date('d');
		$trans->month = date('m');
		$trans->year = date('y');
		$trans->paying_time = date('h:i A');
		$trans->amount = $amount;
		$trans->add_or_withdraw = 'withdraw';
		$trans->closing_balance = ($user->wallet)-($amount);
		$trans->withdraw_status = 'pending';
		$trans->save();
		
	
		
		$old_wallet = $user_wallet->wallet;
		$new_wallet = $old_wallet - $amount;
		
		$user_data = User::find(Auth::user()->id);
		$user_data->wallet = $new_wallet;
		$user_data->save();}
		else{
		    	Alert::error('', 'You have less balance.');
				return redirect()->back();
		}
		
	   return view('user.withdraw_request_success');
   }
	
	public function withdraw_now_bank(Request $request){
	   $bank_account_holder_name = $request->bank_account_holder_name;
	   $bank_account_number = $request->bank_account_number;
	   $ifsc_code = $request->ifsc_code;
	   $amount = $request->amount;
	   $userid = $request->userid;
		
	
		
		$search_data = UserBankDetail::where('user_id', $userid)->first();
		
		if($search_data){
			    $bank_details = UserBankDetail::find($search_data->id);
				$bank_details->bank_account_holder_name = $bank_account_holder_name;
				$bank_details->bank_account_number = $bank_account_number;
				$bank_details->ifsc_code = $ifsc_code;
				$bank_details->save();
		}else{
				$bank_details = new UserBankDetail;
				$bank_details->bank_account_holder_name = $bank_account_holder_name;
				$bank_details->bank_account_number = $bank_account_number;
				$bank_details->ifsc_code = $ifsc_code;
				$bank_details->save();
		}
			$user_wallet = User::where('id', Auth::user()->id)->first();
		
		$old_wallet = $user_wallet->wallet;
		if($old_wallet>=$amount){
		$withdraw  = new WithdrawRequest;
		$withdraw->user_id = $userid;
		$withdraw->bank_details_id = $bank_details->id;
		$withdraw->get_amount_via = $request->get_amount_via;
		$withdraw->amount = $amount;
		$withdraw->save();
		
		$user  = User::where('id',$userid)->first();
		
		$trans  = new TransactionHistory;
		$trans->user_id = $userid;
		$trans->order_id = $withdraw->id;
		$trans->day = date('d');
		$trans->month = date('m');
		$trans->year = date('y');
		$trans->paying_time = date('h:i A');
		$trans->amount = $amount;
		$trans->add_or_withdraw = 'withdraw';
		$trans->closing_balance = $user->wallet;
		$trans->withdraw_status = 'pending';
		$trans->save();
		}
		else{
		    	Alert::error('', 'You have less balance.');
				return redirect()->back();
		}
		
	    return view('user.withdraw_request_success');
   }
	
	public function withdraw_through_bank_transfer(){
	    $user_id = Auth::user()->id;
	    $user_bank_details = UserBankDetail::where('user_id',$user_id)->first();
	    return view('user.withdraw_through_bank_transfer', compact('user_bank_details'));
   }
	
}
