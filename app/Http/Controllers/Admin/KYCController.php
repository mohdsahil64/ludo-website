<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\UserBankDetail;
use App\UserData;
use App\TransactionHistory;

class KYCController extends Controller
{
   
    public function kyc_pending()
    {
		$pending = UserData::where('verify_status','0')->where('DOCUMENT_NAME','!=',null)->where('DOCUMENT_NUMBER','!=',null)->where('DOCUMENT_FIRST_NAME','!=',null)->where('DOCUMENT_LAST_NAME','!=',null)->where('DOCUMENT_DOB','!=',null)->where('DOCUMENT_STATE','!=',null)->where('DOCUMENT_FRONT_IMAGE','!=',null)->where('DOCUMENT_BACK_IMAGE','!=',null)->get();
		 return view('admin.kycs.pending',compact('pending'));
    }
	
	  public function kyc_view($id)
    {
		  $user_id = $id;
	     $user_kyc_details = UserData::where('user_id',$user_id)->first();
		 $user_details = User::where('id',$user_id)->first();
		 $user_bank_details = UserBankDetail::where('user_id',$user_id)->first();
		 return view('admin.kycs.kyc_view',compact('user_details','user_kyc_details','user_bank_details'));
    }

	public function kyc_approved()
    {
		$approved = UserData::where('verify_status','1')->get();
        return view('admin.kycs.approved',compact('approved'));
    }
	
	
	
	public function kyc_verify($id)
    {
		$userData = UserData::find($id);
		$userData->verify_status = '1';
		$userData->save();
		
        return redirect('/admin/kyc-pending');
    }
	
	public function kyc_rejected($id)
    {
		$userData = UserData::find($id);
		$userData->DOCUMENT_NAME = null;
		$userData->DOCUMENT_NUMBER = null;
		$userData->DOCUMENT_FIRST_NAME = null;
		$userData->DOCUMENT_LAST_NAME = null;
		$userData->DOCUMENT_DOB = null;
		$userData->DOCUMENT_STATE = null;
		$userData->DOCUMENT_FRONT_IMAGE = null;
		$userData->DOCUMENT_BACK_IMAGE = null;
		$userData->verify_status = null;
		$userData->save();
		
        return redirect('/admin/kyc-pending');
    }
	
	
	
  
}
