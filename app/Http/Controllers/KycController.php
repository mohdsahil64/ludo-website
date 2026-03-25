<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Alert;
use App\User;
use App\UserData;

class KycController extends Controller
{
	 
 /*  public function index(Request $request){
	    
		  
	  $user_id = Auth::user()->id;
	  $vplay_id = Auth::user()->vplay_id;
	  $user_details = User::where('id', $user_id)->first();
	  $user_data_count = UserData::where('user_id', $user_id)->count();
	  $user_data_details = UserData::where('user_id', $user_id)->first();
	  
	   
		  		if($user_data_count>0){
				
					if(isset($request->next1)){ 
						
						
						 $DOCUMENT_NAME = $request->DOCUMENT_NAME;
						if(strlen($request->DOCUMENT_NUMBER_UID)>0){
							$NUMBER = $request->DOCUMENT_NUMBER_UID;
						}
						if(strlen($request->DOCUMENT_NUMBER_DL)>0){
							$NUMBER = $request->DOCUMENT_NUMBER_DL;
						}
						if(strlen($request->DOCUMENT_NUMBER_VID)>0){
							$NUMBER = $request->DOCUMENT_NUMBER_VID;
						}
						
		                 $DOCUMENT_NUMBER = $NUMBER;
						
						UserData::where('user_id', $user_id)->where('vplay_id', $vplay_id)
								   ->update([
									   'DOCUMENT_NAME' => $DOCUMENT_NAME,
									   'DOCUMENT_NUMBER' => $DOCUMENT_NUMBER
									]);
						return redirect('/complete-kyc');
					}
					
					
					if(isset($request->next2)){
						 $firstName = $request->firstName;
						 $lastName = $request->lastName;
						 $dob = $request->dob;
						 $state = $request->state;
					   
						UserData::where('user_id', $user_id)->where('vplay_id', $vplay_id)
								   ->update([
									   'DOCUMENT_FIRST_NAME' => $firstName,
									   'DOCUMENT_LAST_NAME' => $lastName,
									   'DOCUMENT_DOB' => $dob,
									   'DOCUMENT_STATE' => $state,
									   ]);
						return redirect('/complete-kyc');
					}
					
					if(isset($request->complete)){
						 $firstName = $request->firstName;
						 $lastName = $request->lastName;
						
						if ($request->hasFile('frontPic')) {
						  $frontPic = $request->file('frontPic');
						  $frontPic_name = time().'frontpic.'.$frontPic->getClientOriginalExtension();
                          $destinationPath = public_path('/images/kycdata/'.$user_id.'/');
                          $frontPic->move($destinationPath, $frontPic_name);
						}
						if ($request->hasFile('backPic')) {
						  $backPic = $request->file('backPic');
						  $backPic_name = time().'backPic.'.$backPic->getClientOriginalExtension();
                          $destinationPath = public_path('/images/kycdata/'.$user_id.'/');
                          $backPic->move($destinationPath, $backPic_name);
						}
						
						UserData::where('user_id', $user_id)->where('vplay_id', $vplay_id)
								   ->update([
									   'DOCUMENT_FRONT_IMAGE' => $frontPic_name,
									   'DOCUMENT_BACK_IMAGE' => $backPic_name,
									   ]);
					  Alert::success('', 'We are verifying your details. You will be notified when your KYC is completed.');
						return redirect('/complete-kyc');
					} 
					
					return view('user.kycform',compact('user_data_details'));
			    }
	   
   }*/
	
	public function step1(){
		$user_id = Auth::user()->id;
		$user_data_details = UserData::where('user_id',$user_id)->first();
		
		if($user_data_details->DOCUMENT_NAME == null && $user_data_details->DOCUMENT_NUMBER == null && $user_data_details->DOCUMENT_FIRST_NAME==null  && $user_data_details->DOCUMENT_LAST_NAME==null  && $user_data_details->DOCUMENT_DOB==null  && $user_data_details->DOCUMENT_STATE==null  && $user_data_details->DOCUMENT_FRONT_IMAGE==null  && $user_data_details->DOCUMENT_BACK_IMAGE==null){
				return view('user.kyc_step1', compact('user_data_details'));
			}
		
		if($user_data_details->DOCUMENT_NAME != null && $user_data_details->DOCUMENT_NUMBER != null && $user_data_details->DOCUMENT_FIRST_NAME==null  && $user_data_details->DOCUMENT_LAST_NAME==null  && $user_data_details->DOCUMENT_DOB==null  && $user_data_details->DOCUMENT_STATE==null  && $user_data_details->DOCUMENT_FRONT_IMAGE==null  && $user_data_details->DOCUMENT_BACK_IMAGE==null){
				return view('user.kyc_step2', compact('user_data_details'));
			}
		 
		if($user_data_details->DOCUMENT_NAME != null && $user_data_details->DOCUMENT_NUMBER != null && $user_data_details->DOCUMENT_FIRST_NAME!=null  && $user_data_details->DOCUMENT_LAST_NAME!=null  && $user_data_details->DOCUMENT_DOB!=null  && $user_data_details->DOCUMENT_STATE!=null  && $user_data_details->DOCUMENT_FRONT_IMAGE==null  && $user_data_details->DOCUMENT_BACK_IMAGE==null){
				return view('user.kyc_step3', compact('user_data_details'));
			}
		
		if($user_data_details->DOCUMENT_NAME != null && $user_data_details->DOCUMENT_NUMBER != null && $user_data_details->DOCUMENT_FIRST_NAME!=null  && $user_data_details->DOCUMENT_LAST_NAME!=null  && $user_data_details->DOCUMENT_DOB!=null  && $user_data_details->DOCUMENT_STATE!=null  && $user_data_details->DOCUMENT_FRONT_IMAGE!=null  && $user_data_details->DOCUMENT_BACK_IMAGE!=null){
				return view('user.kyc_submit');
			}
	}
	
	
	public function step2(Request $request){
		 
		$user_id = Auth::user()->id;
			 //FORM DATA 
			 $document_name = $request->DOCUMENT_NAME;
			 $document_number = $request->DOCUMENT_NUMBER;
		
		     $user_data_details = UserData::where('user_id', $user_id)->first();
		
			
		
			UserData::where('user_id', $user_id)  // find your user by their email
			               ->update(array(
							   'DOCUMENT_NAME' => $request->DOCUMENT_NAME,
							   'DOCUMENT_NUMBER' => $request->DOCUMENT_NUMBER,
						   ));  // update the record in the DB. 
		
		
		
		    return view('user.kyc_step2', compact('user_data_details'));
		
	}
	
	public function step3(Request $request){
		 
		     $user_id = Auth::user()->id;
			
		     //FORM DATA 
			  $firstName = $request->firstName;
			  $lastName = $request->lastName;
			  $dob = $request->dob;
			  $state = $request->state;
		
		     $user_data_details = UserData::where('user_id', $user_id)->first();
		
			
		
			UserData::where('user_id', $user_id)  // find your user by their email
			               ->update(array(
							   'DOCUMENT_FIRST_NAME' => $firstName,
							   'DOCUMENT_LAST_NAME' => $lastName,
							   'DOCUMENT_DOB' => $dob,
							   'DOCUMENT_STATE' => $state,
						   ));  // update the record in the DB. 
		
		
		
		    return view('user.kyc_step3', compact('user_data_details'));
		
	}
	
public function kyc_submit(Request $request){
		 
		     $user_id = Auth::user()->id;
			
		     //FORM DATA 
			  $firstName = $request->firstName;
			  $lastName = $request->lastName;
			  $dob = $request->dob;
			  $state = $request->state;
		
		     $user_data_details = UserData::where('user_id', $user_id)->first();
		
				if ($request->hasFile('frontPic')) {
						  $frontPic = $request->file('frontPic');
						  $frontPic_name = time().'frontpic.'.$frontPic->getClientOriginalExtension();
                          $destinationPath = public_path('/images/kycdata/'.$user_id.'/');
                          $frontPic->move($destinationPath, $frontPic_name);
						}
						if ($request->hasFile('backPic')) {
						  $backPic = $request->file('backPic');
						  $backPic_name = time().'backPic.'.$backPic->getClientOriginalExtension();
                          $destinationPath = public_path('/images/kycdata/'.$user_id.'/');
                          $backPic->move($destinationPath, $backPic_name);
						}
						
						UserData::where('user_id', $user_id)
								   ->update([
									   'DOCUMENT_FRONT_IMAGE' => $frontPic_name,
									   'DOCUMENT_BACK_IMAGE' => $backPic_name,
									   'verify_status' => '0',
									   ]);
					  Alert::success('', 'We are verifying your details. You will be notified when your KYC is completed.');
		
	    return view('user.kyc_submit');
		
	}

}
