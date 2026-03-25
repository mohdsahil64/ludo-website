<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Battle;
use App\UserData;
use App\Payment;
use App\WithdrawRequest;


class DashboardController extends Controller
{
    public function index(){
		$battles = Battle::orderBy('id','desc')->skip(0)->take(10)->get();
		 $no_of_users = User::where('id','!=','1')->count();
		
		$all_users = User::get();
		
		$total_user_wallet_balance = 0;
		foreach($all_users as $user){
			$total_user_wallet_balance+=$user->wallet;
		}
		
		$current_date = date('Y-m-d');
		
		$today_user = User::where('created_at', 'like', '%' . $current_date . '%')->count();
		
		$blocked_user = User::where('is_blocked', '1')->count();
		
		$today_battle = Battle::where('created_at', 'like', '%' . $current_date . '%')->count();
		
		$all_battle = Battle::count();
		
		$today_succes_game = Battle::where('created_at', 'like', '%' . $current_date . '%')->where('game_status','3')->count();
		
		$total_cancel_game = Battle::where('creator_result', 'cancel')->where('joiner_result', 'cancel')->count();
		
		$battles = Battle::get();
		$total_admin_comission = 0;
		foreach($battles as $battle){
			$total_admin_comission+=$battle->admin_commision;
		}
		
		$battles = Battle::where('created_at', 'like', '%' . $current_date . '%')->get();
		$today_admin_comission = 0;
		foreach($battles as $battle){
			$today_admin_comission+=$battle->admin_commision;
		}
		
		
		 $payments = Payment::where('created_at', 'like', '%' . $current_date . '%')->where('status', 'PAID')->get();
		
		
		$today_total_deposite = 0;
		foreach($payments as $payment){
			$today_total_deposite+=$payment->amount;
		}
		
		$total_pending_KYC = UserData::where('verify_status', '0')->count();
		$total_approved_KYC = UserData::where('verify_status', '1')->count();
		
		
		$battles = Battle::where('created_at', 'like', '%' . $current_date . '%')->get();
		$today_won_amount = 0;
		foreach($battles as $battle){
			$today_won_amount+=($battle->prize - $battle->entry_fee);
		}
		
		$withdraw = WithdrawRequest::where('created_at', 'like', '%' . $current_date . '%')->where('status', 'success')->get();
		$withdraw_amount = 0;
		foreach($withdraw as $withdraw){
			$withdraw_amount+=$withdraw->amount;
		}
		
// 		echo "<pre>";
// 		print_r($all_users);
// 		exit;
		
		
		return view('admin.dashboard', compact('battles', 'no_of_users', 'total_user_wallet_balance', 'today_user', 'blocked_user', 'today_battle', 'all_battle', 'today_succes_game', 'total_cancel_game', 'total_admin_comission', 'today_admin_comission', 'today_total_deposite','total_pending_KYC','total_approved_KYC', 'today_won_amount','withdraw_amount'));
		
	}
}
