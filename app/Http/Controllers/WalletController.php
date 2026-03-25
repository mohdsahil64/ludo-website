<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\PaymentSetting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Validator;
use Alert;



class WalletController extends Controller
{
   public function add_fund(){
	   $activated_gateway = PaymentSetting::where('status','1')->first();
	    return view('user/add_fund', compact('activated_gateway'));
   }
	
	public function wallet(){
		return view('user/wallet');
	}
	
	public function send_money_form(){
		return view("user.send_money_form");
	}
	
	public function send_money_submit(Request $request){
		$mobile = $request->mobile;
		$amount = $request->amount;
		
		$sender_id = Auth::user()->id;
		$sender_wallet_old = Auth::user()->wallet;
		if($sender_wallet_old > 0){
		    if($sender_wallet_old > $amount){
		
		$users = User::where('mobile',$mobile)->first();
		if($users){
			$old_amount = $users->wallet;
			 User::where('mobile',$mobile)->update([
				  "wallet" => $old_amount+$amount
			]);
			
			 User::where('id',$sender_id)->update([
				  "wallet" => $sender_wallet_old-$amount
			]);
			
			Alert::success('','Amount Sent !!');
			return redirect('/');
		}else{
			Alert::error('','Mobile Number is not Registered With Us.');
			return redirect()->back();
		}}else{
		    	Alert::error('','You have less money');
			return redirect()->back();
		}}
		
		else{
		    	Alert::error('','You have no money');
			return redirect()->back();
		}
		
	}
	
	public function wallet_balance(){
		return view('user.wallet_balance');
	}
	public function wallet_bal(){
		return view('user.earning-balance');
	}
	
	public function withdraw_alert(){
		Alert::error('','You can withdraw Minimum Amount Rs 95');
		
		return redirect()->back();
	}
		
}
