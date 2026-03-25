<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alert;
use Auth;
use App\User;
use App\BattleHistory;
use App\TransactionHistory;
use App\UserData;
use App\Support;

class ProfileController extends Controller
{
	 public $successStatus = 200;

   public function profile(){
	   $user_id = Auth::user()->id;
	    $user = User::where('id',$user_id)->first();
	   $userData= UserData::where('user_id','=',$user_id)->get();
	 $userDatac= UserData::where('user_id','=',$user_id)->count();

	    return view('user.profile', compact('user','userData','userDatac'));
   }

	public function saveVplayID(Request $request){
	    $user_id = Auth::user()->id;
	    $username = $request->username;

		$user = User::where('id','=',$user_id)->update(['vplay_id' => $username]);
		$user_data = UserData::where('user_id','=',$user_id)->update(['vplay_id' => $username]);
		$data = User::where('vplay_id' ,'=', $username)->first();
        // send otp to mobile no using sms api
        return response()->json($data);
	}

	public function update_email(Request $request){
		     $user_id = Auth::user()->id;
		       $user  = User::where('id', $user_id)->first();
				 $user->email  = $request->email;
				 $user->save();

		return redirect('/profile');
	}

    public function update_profile(Request $request){
        $user_id = Auth::user()->id;
          $user  = User::where('id', $user_id)->first();

          if ($request->hasFile('profilepic')) {
            $profilepic = $request->file('profilepic');
            $profilepic_name = time().'profilepic.'.$profilepic->getClientOriginalExtension();
            $destinationPath = public_path('/images/profile/'.$user_id.'/');
            $profilepic->move($destinationPath, $profilepic_name);
          }

            $user->profile_pic  = $profilepic_name;
            $user->save();

   return redirect('/profile');
}


	public function game_history(){
		$user_id =  Auth::user()->id;
		$battle_history = BattleHistory::where('user_id',$user_id)->orderBy('id','desc')->get();
		return view('user.game_history', compact('user_id','battle_history'));
	}

	public function transaction_history(){
		$user_id =  Auth::user()->id;
		$trans_history = TransactionHistory::where('user_id',$user_id)->orderBy('id','desc')->get();
		return view('user.transaction_history ', compact('user_id','trans_history'));
	}


	public function notification(){
		$user_id =  Auth::user()->id;
		return view('user.notification ', compact('user_id'));
	}
	public function support(){
		$user_id =  Auth::user()->id;
		$support=Support::all();

		return view('user.support ', compact('user_id','support'));
	}

	public function saveRefferBy(Request $request){
	     $user_id = Auth::user()->id;
	     $refferalID = $request->refferalID;
		$is_exist = User::where('referral_code',$refferalID)->first();
		if($is_exist){
			$user = User::where('id','=',$user_id)->update(['reffered_by' => $refferalID]);
		   $data = User::where('id' ,'=', $user_id)->first();
            // send otp to mobile no using sms api
            return response()->json($data);
		}else{
			$data = "No any Referral ID Found";
			return response()->json($data);

		}

	}
}
