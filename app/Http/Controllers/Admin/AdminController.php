<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Mode;
use App\Battle;
use App\Bonus;
use App\Comission;
use App\UserData;
use App\Payment;

class AdminController extends Controller
{
    public function settings(){
	 $comission = Comission::first();
	 $mode = Mode::first();
     $bonus=Bonus::first();
		return view('admin.admins.settings', compact('comission','mode','bonus'));

	}

	public function update_commision(Request $request, $id){
	   $comisson = Comission::find($id);
	   $comisson->battle_comission_with_referral = $request->battle_comission_with_referral;
	   $comisson->refferal_comission = $request->refferal_comission;
	   $comisson->battle_comission_without_referral = $request->battle_comission_without_referral;
	   $comisson->save();

		return redirect()->back()->with('success','Details Changed!!');
	}
		public function mode(Request $request ){
		 $id = 1 ;
	    $mode = Mode::first();
	    $mode->mode=$request->mode;
	    $mode->save();
	    return redirect()->back()->with('success','Details Changed!!');
	}

    public function signupbonus(Request $request ){

       $mode = Bonus::first();
       if(empty($mode)){
        $mode=new Bonus();
       }
       $mode->amount=$request->signupbonus;
       $mode->bonus_type='SignUp';
       $mode->save();
       return redirect()->back()->with('success','Details Updated!!');
   }
}
