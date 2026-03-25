<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Str;
use App\Payment;
use App\PaymentSetting;
use App\User;
use App\TransactionHistory;
use Alert;

class UPIGatewayController extends Controller
{
     public function create(Request $request)
     {
		/*echo "jhjk";
		 die();*/
		   $upi_gateway_details = PaymentSetting::where('name','UPI Gateway')->first();
		 
		   $key = $upi_gateway_details->parameter_one;
		 
		
		   // you can get your key from https://merchant.upigateway.com/user/api_credentials
		   $firstname = $_POST['vplay_id'];
		   $txnid = 'ORD/UPI'.rand(00000000,9999999);
		   $user_id = $_POST['vplay_id'];
		   $phone = $_POST['mobile'];
		   $amount = $_POST['amount'];
		    $datejoinds=date("d-m-Y");

		 
			 $content = json_encode(array(
					"key"=> $key,
					"client_txn_id"=> $txnid, // order id or your own transaction id
					"amount"=> $amount, 
					"p_info"=> "Game",
					"customer_name"=> $firstname, // customer name
					"customer_email"=> "JKLudo@gmail.com", // customer email
					"customer_mobile"=> $phone, // customer mobile number
					"redirect_url"=> "https://ludomaster.site/upigateway/transaction-status", // redirect url after payment, with ?client_txn_id=&txn_id=
			 ));
		 
		
		 $payment = new Payment;
		 $payment->order_id = $txnid;
		 $payment->vplay_id = $user_id;
		 $payment->user_id = Auth::user()->id;
		 $payment->mobile = $phone;
		 $payment->amount = $amount;
		 $payment->status = 'ACTIVE';
		 $payment->upigateway_date = $datejoinds;
		 $payment->save();
		 
		 
	        $url = "https://merchant.upigateway.com/api/create_order";
		 
			 $curl = curl_init($url);
			 curl_setopt($curl, CURLOPT_HEADER, false);
			 curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			 curl_setopt($curl, CURLOPT_HTTPHEADER,
					array("Content-type: application/json"));
			 curl_setopt($curl, CURLOPT_POST, true);
			 curl_setopt($curl, CURLOPT_POSTFIELDS, $content);
		 
			 $json_response = curl_exec($curl);
			 $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
		
		  
		   
		    
		 
			 if ( $status != 200 ) {
				die("Error: call to URL $url failed with status $status, response $json_response, curl_error " . curl_error($curl) . ", curl_errno " . curl_errno($curl));
			 }
			 curl_close($curl);
			 $response = json_decode($json_response, true);

			 if($response["status"] == true){

				header("Location: ".$response["data"]["payment_url"]);
				die();

			 }else{
                return redirect('add-funds');
			 }          
     }
	
	
	public function transaction_status(Request $request){
			$client_txn_id = $request->client_txn_id;
			$txn_id = $request->txn_id;
		
		    $payment_details = Payment::where('order_id', $client_txn_id)->first();
		    $payment_date = $payment_details->upigateway_date;

			$upi_gateway_details = PaymentSetting::where('name','UPI Gateway')->first();
			$key = $upi_gateway_details->parameter_one;

			 $content = json_encode(array(
				"key"=> $key,
				"client_txn_id"=> $client_txn_id,
				"txn_date"=> $payment_date
			 ));


			$url = "https://merchant.upigateway.com/api/check_order_status";

			 $curl = curl_init($url);
			 curl_setopt($curl, CURLOPT_HEADER, false);
			 curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			 curl_setopt($curl, CURLOPT_HTTPHEADER,
					array("Content-type: application/json"));
			 curl_setopt($curl, CURLOPT_POST, true);
			 curl_setopt($curl, CURLOPT_POSTFIELDS, $content);
			 $json_response = curl_exec($curl);
			 $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
			 if ( $status != 200 ) {
				// You can handle Error yourself.
				die("Error: call to URL $url failed with status $status, response $json_response, curl_error " . curl_error($curl) . ", curl_errno " . curl_errno($curl));
			 }
			 curl_close($curl);
			 $response = json_decode($json_response, true);

			/* echo "<pre>";
			print_r($response); die();*/
			if($response['msg']=="Record not found"){
			
					Payment::where('order_id', $client_txn_id)
						   ->update([
							   'order_token' => $txn_id,
							   'status' => 'FAILED'
							]);
		 
				
				return redirect('/add-funds');
				
			}else{
				if($response['data']['status'] != "failure"){
			
					Payment::where('order_id', $client_txn_id)
						   ->update([
							   'order_token' => $txn_id,
							   'status' => 'PAID'
							]);
					
					
						$user_data = User::where('id', $payment_details->user_id)->first();
						$wallet = $user_data->wallet;
						$new_amount = $payment_details->amount;
						$user_id = $payment_details->user_id;
			 
					 $user  = User::where('id', $user_id)->first();
					 $user->wallet  = $wallet + $new_amount;
					 $user->save();
					
					 $Trans_hist = new TransactionHistory;
					 $Trans_hist->user_id = $user_id;
					 $Trans_hist->payment_id = $payment_details->id;
					 $Trans_hist->order_id = $client_txn_id;
					 $Trans_hist->day = date('d');
					 $Trans_hist->month = date('M');
					 $Trans_hist->year = date('Y');
					 $Trans_hist->paying_time = date('h:i A');
					 $Trans_hist->amount = $new_amount;
					 $Trans_hist->add_or_withdraw = 'add';
					 $Trans_hist->closing_balance = $wallet+$new_amount;
					 $Trans_hist->save();
					
					Alert::success('Transaction Successfull !!', '');
					 return redirect('/add-funds');
				
					 }else{
						Payment::where('order_id', $client_txn_id)
							   ->update([
								   'order_token' => $txn_id,
								   'status' => 'FAILED'
								]);
						Alert::error('Payment Canceled!!', '');
						 return redirect('/add-funds');
					}
			} 
	}
}