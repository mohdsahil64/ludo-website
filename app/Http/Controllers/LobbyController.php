<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Alert;
use App\User;
use App\Mode;
use App\Battle;
use App\Comission;
use App\BattleHistory;
use App\Game;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class LobbyController extends Controller
{
	
	
   public function index($url){
	   $game_detail = Game::where('url',$url)->first();
	   $game_id = $game_detail->id;
	   
	   $battle_created = Battle::where('game_status',1)->where('is_running','no')->where('game_id',$game_id)->orderBy('id', 'DESC')->get();
	   
	   $battle_running = Battle::where('is_running','yes')->where('game_id',$game_id)->orderBy('id', 'DESC')->get();
	   $mode= Mode::first();
	   $manual = $mode['mode'];
	   
	   return view('user.battleground', compact('battle_created', 'battle_running','url','game_id','manual'));
   }
	
	
	public function create(Request $request){
		
		
	
		$game_url = $request->game_url;
	    $manual = $request->manual;
		$game_details = Game::where('url',$game_url)->first();
		 
		
		$all_running_battle = Battle::where('is_running','yes')->where('game_id',$game_details->id)->get();
		
		if($all_running_battle){
		    	
		foreach($all_running_battle as $one_battle){
		    
			$creator_id = Auth::user()->id;
			$check_game = Battle::where('is_running', 'yes')
                            ->where('game_id', $game_details->id)
                            ->where(function($query) use ($creator_id) {
                                $query->where('creator_id', $creator_id)
                                      ->orWhere('joiner_id', $creator_id);
                            })
                            ->exists();
			if($check_game != 0){
				Alert::error('', 'You are already in a game.');
				return redirect()->back();
			}
		 }
		}
	
    	 $all_created_battle = Battle::where('creator_id',Auth::user()->id)->where('request_status','0')->where('is_running','no')->where('game_status','!=','3')->where('game_id',$game_details->id)->get();
		if($all_created_battle){
		foreach($all_created_battle as $one_battle){
			$creator_id = Auth::user()->id;
			$check_game = Battle::where('is_running','no')->where('game_id',$game_details->id)->where('creator_id',$creator_id)->get();
			if($check_game){
				Alert::error('', 'You already created a Battle');
				return redirect()->back();
			}else{
				exit();
			}
		 }
		}
		
		if($manual == "yes"){
			//$resp = file_get_contents($game_details->api_url);
	    
		//$obj = json_decode($resp);
		$code = $request->code;
		//$token = $obj->room_code; 
		//$token = '07867908';
		$token = $code;    
		}
		else{
		   

    $url = $game_details->api_url;

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
 


		 //  $resp = file_get_contents($game_details->api_url);
	    
	
		$obj = json_decode($resp);
	
$token = $obj->room_code; 
		//$token = '07867908';
	
		}
		
		
 
	$user_details = User::where('id',Auth::user()->id)->first();
	$old_wallet = $user_details->wallet;
		if($old_wallet<$request->amount){
		  
			Alert::error('Insufficient Fund !', 'Please Recharge Your Wallet');
			return redirect('/lobby/Ludo%20Classic');;
	
		}else{
			if($request->amount<50 || $request->amount>=15000){
			     Alert::error('Invalid Amount', ' Enter 50 and less then 15000.');
		
				
			}else{
				if($request->amount % 50){
					 Alert::error('Set battle domination of 50 like 50, 100, 150, 200 ThankYou');
					return redirect('/lobby/Ludo%20Classic');
			    }else{ 
					
					$amount = $request->amount;
                    $prize_pre = ($amount+$amount)*5/100;
					if($amount==10){
                        $prize='18';
                    }elseif($amount==20){
                        $prize='36';
                    }elseif($amount==30){
                        $prize='54';
                    }else{
                        $prize = ($amount+$amount)-$prize_pre;
                    }
						 $game_id = $game_details->id;
						 $battle_id = time().rand(11,99);
						 $lobby_id = $token;
						 $label = $request->label;
						 $creator_id = Auth::user()->id;
						 $entry_fee = $amount;
						 $game_status = 1;


						$battle = new Battle;
						$battle->game_id = $game_id;
						$battle->battle_id = $battle_id;
						$battle->LOBBY_ID = $lobby_id;
						$battle->amount = $amount;
						$battle->creator_id = $creator_id;
						$battle->entry_fee = $entry_fee;
						$battle->prize = $prize;
						$battle->game_status = $game_status;
						$battle->label = $label;
						$battle->save();


						$new_wallet = $old_wallet-$amount;
						$user = User::find($creator_id);
						$user->wallet = $new_wallet;
						$user->save();
					
					    
					
				}
			}
			
		}
		
		 return back();
		
	   
   }
   
	public function delete($id){
		$battle_details = Battle::where('id',$id)->first();
		$battle_detailsc = Battle::where('id',$id)->count();
		if($battle_detailsc != 0){
		$battle_amount = $battle_details->amount;
		$battle_creator_id = $battle_details->creator_id;
		
		$user_details = User::where('id', $battle_creator_id)->first();
		$old_wallet = $user_details->wallet;
		$new_wallet =  $old_wallet+$battle_amount;
		             
		 $user = User::find($battle_creator_id);
		 $user->wallet = $new_wallet;
		 $user->save();
		
		 Battle::where('id',$id)->delete();}
		 
	
		 return redirect()->back();
	}
	
	public function send_request($id){
		$joiner_id = Auth::user()->id;
	$battlec = Battle::where('joiner_id',$joiner_id)->where('game_status',1)->count();
	   $battlej = Battle::where('creator_id',$joiner_id)->where('game_status',1)->count();
		
		
	   $battlesc = Battle::where('joiner_id',$joiner_id)->where('game_status',2)->count();
	   $battlesj = Battle::where('creator_id',$joiner_id)->where('game_status',2)->count();
		
		if($battlec ==0 && $battlej==0 && $battlesc ==0 && $battlesj==0  ){
		$battle_details = Battle::where('id',$id)->first();
		$entry_fee = $battle_details->entry_fee;
		if($battle_details->joiner_id == null){
		$user_details = User::where('id', $joiner_id)->first();
		
		if($user_details->wallet < $entry_fee ){
			  Alert::error('Insufficient Funds !!', 'Please Recharge Your Wallet. ');
			 return redirect()->back();
		}else{
			$old_wallet = $user_details->wallet;
		    $new_wallet =  $old_wallet-$entry_fee;
			
			 $user = User::find($joiner_id);
		     $user->wallet = $new_wallet;
		     $user->save();
			
			 $battle = Battle::find($id);
			 $battle->joiner_id = $joiner_id;
			 $battle->request_status = 2;
			 $battle->send_request_time = date('Y-m-d H:i:s');
			 $battle->save();
			 
			 return redirect('view-battle/'.$battle_details->battle_id);
			
			 //return redirect()->back();
		}
		}
		else{
		     Alert::error('Battel joined Another Players');
			 return redirect()->back();
		}}
		else{
		    Alert::error('You already joined or created Battel');
			 return redirect()->back();
		}
		
	}
	
	 /* public function cancel_request($id){
		$joiner_id = Auth::user()->id;
		
		 $battle = Battle::find($id);
		 $battle->joiner_id = null;
		 $battle->request_status = 0;
		 $battle->save();
		
		 return redirect()->back(); 
		
	}

	
	 /* public function reject_request($id){
		$battle_details = Battle::where('id',$id)->first();
		$battle_amount = $battle_details->amount;
		$battle_creator_id = $battle_details->creator_id;
		$battle_joiner_id = $battle_details->joiner_id;
		
		$user_details_c = User::where('id', $battle_creator_id)->first();
		$old_wallet_c = $user_details_c->wallet;
		$new_wallet_c =  $old_wallet_c+$battle_amount;
		             
		 $user_c = User::find($battle_creator_id);
		 $user_c->wallet = $new_wallet_c;
		 $user_c->save();
		
		$user_details_j = User::where('id', $battle_joiner_id)->first();
		$old_wallet_j = $user_details_j->wallet;
		$new_wallet_j =  $old_wallet_j+$battle_amount;
		             
		 $user_j = User::find($battle_joiner_id);
		 $user_j->wallet = $new_wallet_j;
		 $user_j->save();
		
		
		 Battle::where('id',$id)->delete();
	
		 return redirect()->back();
	} */
	
	 /*public function reject_request_joiner($id){
		$battle_details = Battle::where('id',$id)->first();
		$battle_amount = $battle_details->amount;
		$battle_joiner_id = $battle_details->joiner_id;
			
		$user_details_j = User::where('id', $battle_joiner_id)->first();
		$old_wallet_j = $user_details_j->wallet;
		$new_wallet_j =  $old_wallet_j+$battle_amount;
		             
		 $user_j = User::find($battle_joiner_id);
		 $user_j->wallet = $new_wallet_j;
		 $user_j->save();
		
		 $battle = Battle::find($id);
		 $battle->request_status = '0';
		 $battle->save();
	
		 return redirect()->back();
	} */
	

	
	public function start($id){
		
	     $battle_details = Battle::where('id',$id)->first();
		 $creator_id = Auth::user()->id;
		 $joiner_id = $battle_details->joiner_id;
		 
		 $battlec = Battle::where('creator_id',$creator_id)->where('game_status',1)->count();
		$battlej = Battle::where('joiner_id',$joiner_id)->count();
		
		 $battle = Battle::find($id);
		 $battle->request_status = 3;
		 $battle->is_running = 'yes';
		 $battle->game_status = 2;
		 $battle->accept_request_time = date('Y-m-d H:i:s');;
		 $battle->save(); 
		
		 return redirect('view-battle/'.$battle_details->battle_id);
		
	}
	
	public function join_battle($id){
		 
		 $battle_details = Battle::where('id',$id)->first();
		 $creator_id = Auth::user()->id;
		 $joiner_id = $battle_details->joiner_id;
		
		 $battle = Battle::find($id);
		 $battle->request_status = 2;
		 $battle->request_status = 2;
		 $battle->is_running = 'yes';
		 $battle->save();
		
		 return redirect('view-battle/'.$battle_details->battle_id);
		
	}
	
	public function view_battle($battle_id){
		 
	$battle_details = Battle::where('battle_id',$battle_id)->first();
	    	$creator_id = $battle_details->creator_id;
	        $winner_details= $battle_details->creator_result;
	        $joiner_details= $battle_details->joiner_result;
	         
		    $joiner_id = $battle_details->joiner_id;
		$creator_detail = User::where('id',$creator_id)->first();
		$joiner_detail =  User::where('id',$joiner_id)->first();
		
		return view('user.view_room_code',compact('creator_detail', 'joiner_detail', 'battle_details'));
		
	}
	
	public function battle_result($battle_id, Request $request){
		
		$battle = Battle::find($battle_id);
		
		 $battle->request_status = 0;
		 $battle->game_status = 3; 
		 $battle->is_running = 'yes';
		 $battle->save();
		$battle_de = Battle::find($battle_id);
		 $creator_i=$battle_de->creator_id;
		 $creator_r=$battle_de->creator_result;
		 $joiner_r=$battle_de->joiner_result;
		 if($joiner_r == null or $creator_r == null ){
		$joiner_i=$battle_de->joiner_id;
		$game_details  = Game::where('id',$battle->game_id)->first();
		
	    	$player_id = $request->player_id;
	    	$battle_result = $request->battleResult;
	    	
		   $current_date_time = date('Y-m-d H:i:s');
		   if($creator_i == $player_id){
		  
		   
		   
		 Battle::where('id',$battle_id)->where('creator_id', $player_id)->update([
								"creator_result" => $battle_result,
			                     "creator_result_time" => $current_date_time,
			                    
								]);
								
								
			
		   }
		   else{
		     
		       
		   
		Battle::where('id',$battle_id)->where('joiner_id', $player_id)->update([
								
			                     "joiner_result" => $battle_result,	
			                    "joiner_result_time" => $current_date_time
								]);
		   
	}
		
		
		$battle_details = Battle::where('id',$battle_id)->first();
		$login_user_id = Auth::user()->id;
				
				if($login_user_id == $battle_details->creator_id){
					$battle = Battle::find($battle_id);
				    $battle->approve = "under_review";
				       if ($request->hasFile('screenshot')) {
						   	$image = $request->file('screenshot');
							$image_name = time().'.'.$image->getClientOriginalExtension();
							$destinationPath = public_path('/images/screenshots/');
							$image->move($destinationPath, $image_name);

						   
						   	  
						   $battle_details->creator_screenshot=$image_name;
							
					  } 
				  $battle_details->save();
				}
		
			   if($login_user_id == $battle_details->joiner_id){
					$battle = Battle::find($battle_id);
				    $battle->approve = "under_review";
				       if ($request->hasFile('screenshot')) {
						     $image_name = time().'_'.rand(11,99).'.'.$request->file('screenshot')->getClientOriginalExtension();
				        	 @$request->file('screenshot')->move(public_path('/images/screenshots/'), $image_name);
						   
						   
						/*   	$image = $request->file('screenshot');
						    $image_name = time().'.'.$image->getClientOriginalExtension();
					    	$destinationPath = public_path('/images/screenshots/');
						    $image->move($destinationPath, $image_name);	*/
						$battle_details->joiner_screenshot=$image_name;
					  } 
				  $battle_details->save();
				}
			
		if(strlen($battle_details->creator_result)>0 && strlen($battle_details->joiner_result)>0){
			
			$battle_details = Battle::where('id',$battle_id)->first();
		 if($battle_details->creator_result == 'win' && $battle_details->joiner_result == 'lost'){
					 
					/* echo "One Win One Loss";
					 die();*/
			
				 $battle = Battle::find($battle_id);
					 $battle->winner_id = $battle_details->creator_id;
					 $battle->loser_id = $battle_details->joiner_id;
					
				
					  $battle->approve = "approved";
					  $battle->save();

					
					$prize = $battle_details->prize;
					$creator = User::where('id',$battle_details->creator_id)->first();
					$old_wallet = $creator->wallet;
					$old_game_win = $creator->total_win;
			 
			 //update wining amount to user
					$creator_details = User::find($battle_details->creator_id);
					$creator_details->wallet = $old_wallet+$prize;
					$creator_details->total_win = $old_game_win+1;
					 $creator_details->save();
			 
			 //update admin comission  & refferal commision
			  if(strlen($creator->reffered_by)==0){
				     $joining_amount = $battle->entry_fee;
				  
				     /*$comission = Comission::where('id','1')->first();
				     $admin_comission = $comission->battle_comission_without_referral;
				  
			         $admin_commision = ($joining_amount*2)*$admin_comission/100;
				     $admin_details = User::where(['is_admin'=>1,'user_type'=>1])->first();
				     $admin_old_wallet = $admin_details->wallet;
				     $admin = User::find($admin_details->id);
				     $admin->wallet = $admin_old_wallet+$admin_commision;
				     $admin->save();
				  
				      //commision update in battle table
					  $battle_com_A = Battle::find($battle_id);
					  $battle_com_A->admin_commision = $admin_commision;
					  $battle_com_A->save(); */
				  
				  
			  }else{
				     $joining_amount = $battle->entry_fee;
				  
				     $comission = Comission::where('id','1')->first();
				    // $admin_comission = $comission->battle_comission_with_referral;
				     $reffer_comission = $comission->refferal_comission;
				  
			     /* ($joining_amount*2)*$admin_comission/100;
				     //$admin_details = User::where(['is_admin'=>1,'user_type'=>1])->first();
				     //$admin_old_wallet = $admin_details->wallet;
				     //$admin = User::find($admin_details->id);
				     //$admin->wallet = $admin_old_wallet+$admin_commision;
				     //$admin->save(); */
				  
				     $reffer_user_comission = ($joining_amount*2)*$reffer_comission/100;
				     $reffer_by = $creator->reffered_by;
				     $refer_user = User::where('referral_code',$reffer_by)->first();
				     $old_wallet_reffer = $refer_user->wallet_reffer;
				  
				     $reffer_user = User::find($refer_user->id);
				     $reffer_user->wallet_reffer = $old_wallet_reffer+$reffer_user_comission;
				     $reffer_user->save();
				  
				      //commision update in battle table
					  $battle_com = Battle::find($battle_id);
					//  $battle_com->admin_commision = $admin_commision;
					  $battle_com->reffer_id = $refer_user->id;
					  $battle_com->reffer_comission = $reffer_user_comission;
					  $battle_com->save();
				  
				     
			  }
					 
			  $battle = Battle::find($battle_id);
		     $battle->is_running = 'no';
		 	 $battle->save();
			 //set history
			       $battle_id = $battle->battle_id;
			       $winner_id = $battle_details->creator_id;
			       $loser_id = $battle_details->joiner_id;
			       $prize = $prize;
			       $joining_amount = $battle->entry_fee;
			 
			
			 
			        $this->update_history_win($battle_id, $winner_id, $loser_id, $prize, $joining_amount);
			      
			       
				}
		
			if($battle_details->creator_result == 'lost' && $battle_details->joiner_result == 'win'){
			       /* echo "One Loss One win";
					 die();*/
					 $battle = Battle::find($battle_id);
					 $battle->winner_id = $battle_details->joiner_id;
					 $battle->loser_id = $battle_details->creator_id;
					 
					  $battle->loser_id = $battle_details->creator_id;
					  $battle->approve = "approved";
					  $battle->save();

					
					$prize = $battle_details->prize;
					$joiner = User::where('id',$battle_details->joiner_id)->first();
					$old_wallet = $joiner->wallet;
					$old_total_win = $joiner->total_win;
					$joiner_details = User::find($battle_details->joiner_id);
					$joiner_details->wallet = $old_wallet+$prize;
					$joiner_details->total_win = $old_total_win+1;
					$joiner_details->save();
				
				  $battle = Battle::find($battle_id);
		     $battle->is_running = 'no';
		 	 $battle->save();
				 
			 //update admin comission  & refferal commision
			  if(strlen($joiner->reffered_by)==0){
				     $joining_amount = $battle->entry_fee;
				  
				 /*   $comission = Comission::where('id','1')->first();
				    $admin_comission = $comission->battle_comission_without_referral;
				  
			         $admin_commision = ($joining_amount*2)*$admin_comission/100;
				     $admin_details = User::where(['is_admin'=>1,'user_type'=>1])->first();
				     $admin_old_wallet = $admin_details->wallet;
				     $admin = User::find($admin_details->id);
				     $admin->wallet = $admin_old_wallet+$admin_commision;
				     $admin->save();
				  
				    //commision update in battle table
					  $battle_com_A = Battle::find($battle_id);
					  $battle_com_A->admin_commision = $admin_commision;
					  $battle_com_A->save(); */
				  
			  }else{
				     $joining_amount = $battle->entry_fee;
				  
				     $comission = Comission::where('id','1')->first();
				    // $admin_comission = $comission->battle_comission_with_referral;
				     $reffer_comission = $comission->refferal_comission;
				  
			        /*$admin_commision = ($joining_amount*2)*$admin_comission/100;
				     $admin_details = User::where(['is_admin'=>1,'user_type'=>1])->first();
				     $admin_old_wallet = $admin_details->wallet;
				     $admin = User::find($admin_details->id);
				     $admin->wallet = $admin_old_wallet+$admin_commision;
				     $admin->save(); */
				  
				     $reffer_user_comission = ($joining_amount*2)*$reffer_comission/100;
				     $reffer_by = $joiner->reffered_by;
				     $refer_user = User::where('referral_code',$reffer_by)->first();
				     $old_wallet_reffer = $refer_user->wallet_reffer;
				  
				     $reffer_user = User::find($refer_user->id);
				     $reffer_user->wallet_reffer = $old_wallet_reffer+$reffer_user_comission;
				     $reffer_user->save();
				  
				      //commision update in battle table
					  $battle_com = Battle::find($battle_id);
					 // $battle_com->admin_commision = $admin_commision;
					  $battle_com->reffer_id = $refer_user->id;
					  $battle_com->reffer_comission = $reffer_user_comission;
					  $battle_com->save();
				  
				     
			  }
				
			
				//create history
				   $battle_id = $battle->battle_id;
			       $winner_id = $battle_details->joiner_id;
			       $loser_id = $battle_details->creator_id;
			       $prize = $prize;
			       $joining_amount = $battle->entry_fee;
				
				
			 
			        $this->update_history_win($battle_id, $winner_id, $loser_id, $prize, $joining_amount);
			       
				}
		
			if($battle_details->creator_result == 'lost' && $battle_details->joiner_result == 'lost'){
					/*echo "One Loss One win";
					 die();*/
				 $battle = Battle::find($battle_id);
				 $battle->is_running = 'yes';
				 $battle->save();
				
				  $battle = Battle::find($battle_id);
				  $battle->approve = "under_review";
				  $battle->save();
			}

			if($battle_details->creator_result == 'win' && $battle_details->joiner_result == 'win'){
					/*echo "One win One win";
					 die();*/
				$battle = Battle::find($battle_id);
				  $battle->approve = "under_review";
				      
				  $battle->save();
				  
				
				 $battle = Battle::find($battle_id);
				 $battle->is_running = 'yes';
				 $battle->save();
				 
			}
		
			if($battle_details->creator_result == 'win' && $battle_details->joiner_result == 'cancel'){

				/*echo "One win One cancel";
					 die();*/
				  $battle = Battle::find($battle_id);
				  $battle->approve = "under_review";
				  $battle->save();
				
				 $battle = Battle::find($battle_id);
				 $battle->is_running = 'yes';
				 $battle->save();
			}
		
			if($battle_details->creator_result == 'cancel' && $battle_details->joiner_result == 'win'){

					/*echo "One cancel One win";
					 die();*/
					
					  $battle = Battle::find($battle_id);
					  $battle->approve = "under_review";
					  $battle->save();
				
				 $battle = Battle::find($battle_id);
				 $battle->is_running = 'yes';
				 $battle->save();
				}

			if($battle_details->creator_result == 'lost' && $battle_details->joiner_result == 'cancel'){

					/*echo "One loss One cancel";
					 die();*/
					  $battle = Battle::find($battle_id);
					  $battle->approve = "under_review";
					  $battle->save();
				
				 $battle = Battle::find($battle_id);
				 $battle->is_running = 'yes';
				 $battle->save();
				}


			if($battle_details->creator_result == 'cancel' && $battle_details->joiner_result == 'lost'){
						/*echo "One cancel One loss";
						die();*/
					  $battle = Battle::find($battle_id);
					  $battle->approve = "under_review";
					  $battle->save();
				
				 $battle = Battle::find($battle_id);
				 $battle->is_running = 'yes';
				 $battle->save();
				}

			if($battle_details->creator_result == 'cancel' && $battle_details->joiner_result == 'cancel'){

				     	/*echo "One cancel One cancel";
						die();*/
					  $battle = Battle::find($battle_id);
					  $battle->approve = "approved";
					  $battle->cancel_reason = $request->cancel_reason;
					  $battle->save();

					$entry_fee = $battle_details->entry_fee;
					$creator = User::where('id',$battle_details->creator_id)->first();
					$old_wallet_creator = $creator->wallet;

					$joiner = User::where('id',$battle_details->joiner_id)->first();
					$old_wallet_joiner = $joiner->wallet;

					$user_creator = User::find($battle_details->creator_id);
					$user_creator->wallet = $old_wallet_creator+$entry_fee;
					$user_creator->save();

					$user_joiner = User::find($battle_details->joiner_id);
					$user_joiner->wallet = $old_wallet_joiner+$entry_fee;
					$user_joiner->save();
				
				
				 $battle = Battle::find($battle_id);
				 $battle->is_running = 'no';
				 $battle->save();
				}
		
			
	         Alert::success('', 'Your Result Submited Please Wait Opponent Result And Updated Shortly');
             return redirect('/lobby/'.$game_details->url);
		
			
		}else{
			
		  
			Alert::success('', 'Your Result Submited Please Wait Opponent Result And Updated Shortly.');
             return redirect('/lobby/'.$game_details->url);
		}}
		else{
		    $battle = Battle::find($battle_id);
		
		 $battle->request_status = 0;
		 $battle->game_status = 3; 
		 $battle->is_running = 'no';
		 $battle->save();
		    Alert::success('', 'Your Result Submited Please Wait Opponent Result And Updated Shortly.');
             return redirect('/lobby/Ludo%20Classic');
		}
		  
	}
	
	
	public function update_history_win($battle_id, $winner_id, $loser_id, $prize, $joining_amount){
		
		$battle_details = Battle::where('battle_id',$battle_id)->first();
		$loser_details = User::where('id',$loser_id)->first();
		$winner_details = User::where('id',$winner_id)->first();
		
		//for winner
		            $battle_his = new BattleHistory;
			        $battle_his->user_id = $winner_id;
			        $battle_his->battle_id = $battle_id;
			        $battle_his->day = date('d');
			        $battle_his->month = date('M');
			        $battle_his->year = date('Y');
			        $battle_his->paying_time = date('h:i A');
			        $battle_his->match_result = 'win';
			        $battle_his->another_player_id = $loser_id;
			        $battle_his->winning_amount = $prize;
			        $battle_his->lossing_amount = $battle_details->entry_fee;
			        $battle_his->closing_balance = $winner_details->wallet;
			 		$battle_his->save();
		
		//for loser	 
			        $battle_his = new BattleHistory;
			        $battle_his->user_id = $loser_id;
			        $battle_his->battle_id = $battle_id;
			        $battle_his->day = date('d');
			        $battle_his->month = date('M');
			        $battle_his->year = date('Y');
			        $battle_his->paying_time = date('h:i A');
			        $battle_his->match_result = 'lost';
			        $battle_his->another_player_id = $winner_id;
			        $battle_his->winning_amount = 0;
			        $battle_his->lossing_amount = $battle_details->entry_fee;
			        $battle_his->closing_balance = $loser_details->wallet;
			 		$battle_his->save();
			 
	}
	
	
	public function battle_open($game_id){
		 $battle_created =  Battle::where('game_status',1)->where('is_running','no')->where('game_id',$game_id)->orderBy('id', 'DESC')->get();
		
    	return view('user.battle_open', compact('battle_created'));
	}
	
	
	public function battle_running($game_id){
	   date_default_timezone_set('Asia/Karachi');
	 $battle_running = Battle::where('is_running','yes')->where('game_id',$game_id)->orderBy('id', 'DESC')->get();
	 $battle_runningc = Battle::where('is_running','yes')->where('game_id',$game_id)->orderBy('id', 'DESC')->count();
	 
	 if($battle_runningc!=0){
	     if($battle_running[0]->creator_result_time != null){
	 $selectedTime = $battle_running[0]->creator_result_time;}
	 else{
	   $selectedTime = $battle_running[0]->joiner_result_time;  
	 }
	 if($selectedTime != null){
    $endTime = strtotime("+10 minutes", strtotime($selectedTime));

    $endTime2 = strtotime("now");

    $battle_id=$battle_running[0]->battle_id;
if($endTime2 > $endTime) {
                        $battle = Battle::where('battle_id',$battle_id)->first();
					  $battle->approve = "under_review";
					
				 $battle->is_running = 'no';
				 $battle->save();
} 
	 }}
	  
		
    	return view('user.battle_running', compact('battle_running'));
	}
}
