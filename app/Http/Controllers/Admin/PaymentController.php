<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Payment;
use App\PaymentSetting;
use App\User;
use App\TransactionHistory;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$payments = Payment::orderBy('id','DESC')->get();
		
        return view('admin.payments.index',compact('payments'));
    }

   
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function payment_view($id)
    {
       $payment = Payment::where('id',$id)->first();
		$userDetails = User::where('id',$payment->user_id)->first();
		return view('admin.payments.payment_view', compact('payment','userDetails'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function recharge_user()
    {
        return view('admin.payments.recharge_user');
    }
	
	 public function transaction_history($id)
    {
       $user_details  = User::where('id',$id)->first();
	   $trans_history = TransactionHistory::where('user_id',$id)->orderBy('id','desc')->get();
	   return view('admin.players.player_transaction_history ', compact('user_details','trans_history'));
    } 
	
	public function search_user_result(Request $request)
    {
       $keyword  = $request->keyword;
		
	   $searchResult = User::Where('vplay_id', 'like', '%' . $keyword . '%')->orWhere('mobile', 'like', '%' . $keyword . '%')->orWhere('email', 'like', '%' . $keyword . '%')->get();
		
		
	   return view('admin.payments.search_result_show', compact('searchResult'));
    }
	
	public function settings(){
		$paytm = PaymentSetting::where('name','Paytm')->first();
		$cashfree = PaymentSetting::where('name','Cashfree')->first();
		$upi_gateway = PaymentSetting::where('name','UPI Gateway')->first();
		
		$activated_gateway = PaymentSetting::where('status','1')->first();
		return view('admin.payments.payment_settings', compact('paytm', 'cashfree', 'upi_gateway', 'activated_gateway'));
		
	}
	
	public function payment_gateway_update(Request $request){
		$gateway_status = $request->gateway_status;
			
		if($gateway_status == 'paytm'){
			 PaymentSetting::where('name', 'Paytm')  
									->update(array(
										'status' => '1'
									)); 
			 PaymentSetting::where('name', 'Cashfree')  
									->update(array(
										'status' => '0'
									));
			 PaymentSetting::where('name', 'UPI Gateway')  
									->update(array(
										'status' => '0'
									));

		}
		
		if($gateway_status == 'cashfree'){
				PaymentSetting::where('name', 'Paytm')  
										->update(array(
											'status' => '0'
										)); 
				 PaymentSetting::where('name', 'Cashfree')  
										->update(array(
											'status' => '1'
										));
				 PaymentSetting::where('name', 'UPI Gateway')  
										->update(array(
											'status' => '0'
										));
		}
		
		if($gateway_status == 'upi_gateway'){
			   PaymentSetting::where('name', 'Paytm')  
										->update(array(
											'status' => '0'
										)); 
				 PaymentSetting::where('name', 'Cashfree')  
										->update(array(
											'status' => '0'
										));
				 PaymentSetting::where('name', 'UPI Gateway')  
										->update(array(
											'status' => '1'
										));
		}
		
		
		
		return redirect()->back()->with('success','Details Updated !!');
		
	}
	
	public function payment_paytm_update(Request $request, $id){
		$paytm = PaymentSetting::find($id);
		$paytm->parameter_one = $request->PAYTM_Merchant_ID;
		$paytm->parameter_two = $request->PAYTM_Merchant_Key;
		$paytm->min_add_amount = $request->paytm_min_add_amount;
		$paytm->max_add_amount = $request->paytm_max_add_amount;
		$paytm->save();
		
		return redirect()->back()->with('success','Details Updated !!');
		
	}
	
	public function payment_cashfree_update(Request $request, $id){
		$cashfree = PaymentSetting::find($id);
		$cashfree->parameter_one = $request->CASHFREE_API_KEY;
		$cashfree->parameter_two = $request->CASHFREE_API_SECRET;
		$cashfree->min_add_amount = $request->cashfree_min_add_amount;
		$cashfree->max_add_amount = $request->cashfree_max_add_amount;
		$cashfree->save();
		
		return redirect()->back()->with('success','Details Updated !!');
		
	}
	
	public function payment_upigateway_update(Request $request, $id){
		$upigateway = PaymentSetting::find($id);
		$upigateway->parameter_one = $request->UPIGATEWAY_API_KEY;
		$upigateway->min_add_amount = $request->upigateway_min_add_amount;
		$upigateway->max_add_amount = $request->upigateway_max_add_amount;
		$upigateway->save();
		
		return redirect()->back()->with('success','Details Updated !!');
		
	}
}
