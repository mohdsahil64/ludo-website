<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\UserData;
use App\UserBankDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Validator;
use Alert;
use App\Bonus;
use App\BonusHistory;
use App\TransactionHistory;

class UserController extends Controller
{
    public $successStatus = 200;

    public function login(Request $request){
		echo $request->referral_code;
        Log::info($request);
        if(Auth::attempt(['mobile' => request('mobile'), 'password' => request('password')])){
            return view('home');
        }
        else{
            return Redirect::back ();
        }
    }

    public function loginWithOtp(Request $request ){



		$mobile = $request->mobile;
		 $otp = $request->otp;

        $user  = User::where('mobile', $mobile)->first();
	    if($user){
			$user_re  = User::where('mobile', $mobile)->where('otp', $otp)->first();
			if($user_re){
            Auth::login($user, true);
            User::where('mobile','=',$request->mobile)->update(['otp' => '0']);
			if($user->user_type==1){
				return redirect('/admin/dashboard');
			}elseif($user->user_type==2){
				return redirect('/user/dashboard');
			}else{
				return redirect('/employee/dashboard');
			}
            }else{
				Alert::error('','Invalid OTP');
				return redirect()->back();
			}
        }else{
			$vplay_id = substr(str_shuffle(str_repeat("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ", 5)), 0, 5).rand(111,999);
			$referral_code = substr(str_shuffle(str_repeat("ABCDEFGHIJKLMNOPQRSTUVWXYZ", 2)), 0, 2).substr($request->mobile, -4);


            $signup_bonus=Bonus::first();

			$user = new User;
			$user['vplay_id'] = $vplay_id;
			$user['mobile'] = $request->mobile;
			$user['user_type'] = '2';
			$user['referral_code'] = $referral_code;
            if(!empty($signup_bonus)){
                $user['wallet']=$signup_bonus->amount;
            }
			$user->save();


			$user_id = $user->id;
			$user_data = new UserData;
			$user_data['user_id'] = $user_id;
			$user_data['vplay_id'] = $vplay_id;
			$user_data->save();

            if(!empty($signup_bonus)){
                $bonus=new BonusHistory();
                $bonus->user_id=$user_id;
                $bonus->amount=$signup_bonus->amount;
                $bonus->bonus_type='SignUp';
                $bonus->save();

                $order_id = 'order_'.rand(00000000,99999999);
                $Trans_hist = new TransactionHistory;
			 $Trans_hist->user_id = $user_id;
			 $Trans_hist->payment_id = 0;
			 $Trans_hist->order_id = $order_id;
			 $Trans_hist->day = date('d');
		   	 $Trans_hist->month = date('M');
			 $Trans_hist->year = date('Y');
			 $Trans_hist->paying_time = date('h:i A');
			 $Trans_hist->amount = $signup_bonus->amount;
			 $Trans_hist->add_or_withdraw = 'add';
			 $Trans_hist->closing_balance = $signup_bonus->amount;
			 $Trans_hist->remark = 'Signup Bonus';
			 $Trans_hist->save();
            }


			$user_bank = new UserBankDetail;
			$user_bank['user_id'] = $user_id;
			$user_bank->save();

			$user_GG  = User::where('mobile', $mobile)->first();
			if($user_GG){
            Auth::login($user, true);
           	return redirect('/user/dashboard');
			}else{
			Alert::error('','Invalid OTP');
				return redirect()->back();
			}
        }
    }

    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'mobile' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
        ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        User::create($input);

        return redirect('login');
    }

    public function sendOtp(Request $request){
        $otp = rand(000000,999999);

		$key = "YzTklB2qcVVj4S4im2rJtTWAAwsbar8aRin0ir5UWFpvIa0uMdVq78VPO6Ab";
		$route = "q";
		$sender_id = "FTWSMS";
        $message = "Your OTP for ludomaster.site verification is: ".$otp.". Please do not share this code with anyone. It is valid for 10 minutes.";
        $language = "english";
        $flash = "0";
        $numbers = $request->mobile;

		$message = urlencode($message);

	    $data = "authorization=".$key."&route=".$route."&sender_id=".$sender_id."&message=".$message."&language=".$language."&flash=".$flash."&numbers=".$numbers;
// 		echo 'https://www.fast2sms.com/dev/bulkV2?'.$data;exit;
		$ch =   curl_init('https://www.fast2sms.com/dev/bulkV2?'.$data);
		        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				 $response = curl_exec($ch);
				 curl_close($ch);


		$user = User::where('mobile','=',$request->mobile)->update(['otp' => $otp]);


        return response()->json([$user],200);
    }

	public function loginWithOtpForm(){
		 return view('auth/OtpLogin');
	}
		public function loginWithOtpForm1(){
		 return redirect("/referral");
	}

	public function rules(){
		return view('user.rules');
	}

	public function info_conditions(){
		return view('user.info_conditions');
	}
}
