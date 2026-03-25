<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Battle;
use App\Comission;
use App\TransactionHistory;

class BattleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function new_battle()
    {
	   $battles  = Battle::where('game_status','1')->orderBy('id', 'DESC')->get();
        return view('admin.battles.battle_new', compact('battles'));
    }

   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function new_battle_table()
    {
        $battles  = Battle::where('game_status','1')->orderBy('id', 'DESC')->get();
		
    	return view('admin.battles.battle_new_table', compact('battles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function running_battle()
    {
		
		$battles  = Battle::where('game_status','2')->where('is_running','yes')->orderBy('id', 'DESC')->get();
        return view('admin.battles.battle_running', compact('battles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function running_battle_table()
    {
        $battles  = Battle::where('game_status','2')->where('is_running','yes')->orderBy('id', 'DESC')->get();
		
    	return view('admin.battles.battle_running_table', compact('battles'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function battle_result()
    {
	   $battles  = Battle::where('game_status','3')->where('approve','approved')->orderBy('id', 'DESC')->get();
	   $b1= "0";
       return view('admin.battles.battle_result', compact('battles','b1'));
    }
	 public function battle_dispute()
    {
	   $battles  = Battle::where('game_status','3')->where('approve','under_review')->orderBy('id', 'DESC')->get();
	   $b1= "1";
       return view('admin.battles.battle_result', compact('battles','b1'));
    }
	public function battle_result_table()
    {
       
		
    	return view('admin.battles.battle_running_table', compact('battles'));
    }
	
	public function battle_view($id){
		 $battle = Battle::where('id',$id)->first();
		$creator_details = User::where('id', $battle->creator_id)->first(); 
		$joiner_details = User::where('id', $battle->joiner_id)->first(); 
       return view('admin.battles.battle_view', compact('battle', 'creator_details', 'joiner_details'));
	}
	
	public function battle_pending($id){
		 $battle = Battle::where('id',$id)->first();
		$creator_details = User::where('id', $battle->creator_id)->first(); 
		$joiner_details = User::where('id', $battle->joiner_id)->first(); 
       return view('admin.battles.battle_pending', compact('battle', 'creator_details', 'joiner_details'));
	}

	public function update_result(Request $request, $id){
		 $battle = Battle::where('id',$id)->first(); 
		 $creator_details = User::where('id', $battle->creator_id)->first(); 
		 $joiner_details = User::where('id', $battle->joiner_id)->first(); 
		 
		$prize = $battle->prize;
		
		$winner = $request->winner;
		
		if($battle->creator_id == $winner){
			$battle = Battle::find($id);
			$battle->creator_result = 'win';
			$battle->joiner_result = 'lost';
			$battle->winner_id = $winner;
			$battle->loser_id = $battle->joiner_id;
			$battle->approve = 'approved';
			$battle->is_running = 'no';
			$battle->save();
			
			$user_g = User::where('id',$battle->creator_id)->first();
			$old_wallet = $user_g->wallet;
			$old_game_win = $user_g->total_win;
			
			$creator_details = User::find($battle->creator_id); 
			$creator_details->wallet = $old_wallet + $prize;
			$creator_details->total_win = $old_game_win+1;
			$creator_details->save();
			
			 if(strlen($creator_details->reffered_by)==0){
				     $joining_amount = $battle->entry_fee;
				  
				     $comission = Comission::where('id','1')->first();
				     //$admin_comission = $comission->battle_comission_without_referral;
				  
			         /*$admin_commision = ($joining_amount*2)*$admin_comission/100;
				     $admin_details = User::where(['is_admin'=>1,'user_type'=>1])->first();
				     $admin_old_wallet = $admin_details->wallet;
				     $admin = User::where(['is_admin'=>1,'user_type'=>1])->first();
				     $admin->wallet = $admin_old_wallet+$admin_commision;
				     $admin->save();*/
				  
				      //commision update in battle table
					  $battle_com_A = Battle::find($id);
					  //$battle_com_A->admin_commision = $admin_commision;
					  $battle_com_A->save();
				  
				  
			  }else{
				     $joining_amount = $battle->entry_fee;
				  
				     $comission = Comission::where('id','1')->first();
				    // $admin_comission = $comission->battle_comission_with_referral;
				     $reffer_comission = $comission->refferal_comission;
				  
			       /*$admin_commision = ($joining_amount*2)*$admin_comission/100;
				     $admin_details = User::where('id',1)->first();
				     $admin_old_wallet = $admin_details->wallet;
				     $admin = User::find(1);
				     $admin->wallet = $admin_old_wallet+$admin_commision;
				     $admin->save();*/
				  
				     $reffer_user_comission = ($joining_amount*2)*$reffer_comission/100;
				     $reffer_by = $creator_details->reffered_by;
				     $refer_user = User::where('referral_code',$reffer_by)->first();
				     $old_wallet_reffer = $refer_user->wallet_reffer;
				  
				     $reffer_user = User::find($refer_user->id);
				     $reffer_user->wallet_reffer = $old_wallet_reffer+$reffer_user_comission;
				     $reffer_user->save();
				  
				      //commision update in battle table
					  $battle_com = Battle::find($id);
					  //$battle_com->admin_commision = $admin_commision;
					  $battle_com->reffer_id = $refer_user->id;
					  $battle_com->reffer_comission = $reffer_user_comission;
					  $battle_com->save();
				  
				  
		   	//for creater win
		            $battle_his = new BattleHistory;
			        $battle_his->user_id = $winner;
			        $battle_his->battle_id = $battle_id;
			        $battle_his->day = date('d');
			        $battle_his->month = date('M');
			        $battle_his->year = date('Y');
			        $battle_his->paying_time = date('h:i A');
			        $battle_his->match_result = 'Win';
			        $battle_his->another_player_id = $battle->joiner_id;
			        $battle_his->winning_amount = $prize;
			        $battle_his->lossing_amount = $battle_details->entry_fee;
			        $battle_his->closing_balance = $winner_details->wallet;
			 		$battle_his->save();
				     
			  }
					 
			 
		}
		
		if($battle->joiner_id == $winner){
			$battle = Battle::find($id);
			$battle->creator_result = 'lost';
			$battle->joiner_result = 'win';
			$battle->winner_id = $winner;
			$battle->loser_id = $battle->creator_id;
			$battle->approve = 'approved';
			$battle->is_running = 'no';
			$battle->save();
			
			$user_o = User::where('id',$battle->creator_id)->first();
			$old_wallet = $user_o->wallet;
			$old_game_win = $user_o->total_win;
			
			$joiner_details = User::find($battle->joiner_id);
			$joiner_details->wallet = $old_wallet+$prize;
			$joiner_details->total_win = $old_game_win+1;
			$joiner_details->save();
			
			 if(strlen($joiner_details->reffered_by)==0){
				     $joining_amount = $battle->entry_fee;
				  
				     $comission = Comission::where('id','1')->first();
				     //$admin_comission = $comission->battle_comission_without_referral;
				  
			        /* $admin_commision = ($joining_amount*2)*$admin_comission/100;
				     $admin_details = User::where('id',1)->first();
				     $admin_old_wallet = $admin_details->wallet;
				     $admin = User::find(1);
				     $admin->wallet = $admin_old_wallet+$admin_commision;
				     $admin->save();*/
				  
				      //commision update in battle table
					  $battle_com_A = Battle::find($id);
					  //$battle_com_A->admin_commision = $admin_commision;
					  $battle_com_A->save();
				  
				  
			  }else{
				     $joining_amount = $battle->entry_fee;
				  
				     $comission = Comission::where('id','1')->first();
				     //$admin_comission = $comission->battle_comission_with_referral;
				     $reffer_comission = $comission->refferal_comission;
				  
			         /*$admin_commision = ($joining_amount*2)*$admin_comission/100;
				     $admin_details = User::where('id',1)->first();
				     $admin_old_wallet = $admin_details->wallet;
				     $admin = User::find(1);
				     $admin->wallet = $admin_old_wallet+$admin_commision;
				     $admin->save();*/
				  
				     $reffer_user_comission = ($joining_amount*2)*$reffer_comission/100;
				     $reffer_by = $joiner_details->reffered_by;
				     $refer_user = User::where('referral_code',$reffer_by)->first();
				     $old_wallet_reffer = $refer_user->wallet_reffer;
				  
				     $reffer_user = User::find($refer_user->id);
				     $reffer_user->wallet_reffer = $old_wallet_reffer+$reffer_user_comission;
				     $reffer_user->save();
				  
				      //commision update in battle table
					  $battle_com = Battle::find($id);
					  //$battle_com->admin_commision = $admin_commision;
					  $battle_com->reffer_id = $refer_user->id;
					  $battle_com->reffer_comission = $reffer_user_comission;
					  $battle_com->save();
					  
			//for joiner win
			        $battle_his->user_id = $winner;
			        $battle_his->battle_id = $battle_id;
			        $battle_his->day = date('d');
			        $battle_his->month = date('M');
			        $battle_his->year = date('Y');
			        $battle_his->paying_time = date('h:i A');
			        $battle_his->match_result = 'Win';
			        $battle_his->another_player_id = $battle->creator_id;
			        $battle_his->winning_amount = $prize;
			        $battle_his->lossing_amount = $battle_details->entry_fee;
			        $battle_his->closing_balance = $winner_details->wallet;
			 		$battle_his->save();
				  
				     
			  }
					 
			 
		}
		
		
		return redirect('admin/battles-result')->with('success','Battle Updated Successfully.');
	}
	
	
	public function cancel_battle($id){
		
		    $battle = Battle::find($id);
			$battle->creator_result = 'cancel';
			$battle->joiner_result = 'cancel';
			$battle->is_running = 'no';
			$battle->save();
			
	
		    $battle_details = Battle::where('id',$id)->first();
		    $entry_fee = $battle_details->entry_fee;
		    $creator_id = $battle_details->creator_id;
		    $joiner_id = $battle_details->joiner_id;
		    
		    $joiner = User::where('id',$joiner_id)->first();
		    $j_old_wallet = $joiner->wallet;
		
		    $joiner  = User::find($joiner_id);
		    $joiner->wallet = $j_old_wallet + $entry_fee;
		    $joiner->save();
		
		
		    $creator = User::where('id',$creator_id)->first();
		    $c_old_wallet = $creator->wallet;
		
		    $creator  = User::find($creator_id);
		    $creator->wallet = $c_old_wallet + $entry_fee;
		    $creator->save();
		    /*
			        $battle_his->user_id = $creator_id;
			        $battle_his->battle_id = $id;
			        $battle_his->day = date('d');
			        $battle_his->month = date('M');
			        $battle_his->year = date('Y');
			        $battle_his->paying_time = date('h:i A');
			        $battle_his->match_result = 'cancel';
			        $battle_his->another_player_id = $joiner_id;
			 		$battle_his->save();
			 		
			 		$battle_his = new BattleHistory;
			        $battle_his->user_id = $joiner_id;
			        $battle_his->battle_id = $id;
			        $battle_his->day = date('d');
			        $battle_his->month = date('M');
			        $battle_his->year = date('Y');
			        $battle_his->paying_time = date('h:i A');
			        $battle_his->match_result = 'cancel';
			        $battle_his->another_player_id = $creator_id;
			 		$battle_his->save(); */
		   
		    
		   
		    
			return redirect('admin/battles-result')->with('success','Battle Updated Successfully.');
		
	}
	
	public function delete_battle($id){
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
		
		 Battle::where('id',$id)->delete();
		}
		 return redirect()->back();
	}
	
	public function add_penalty(Request $request){

		$penalty=$request->penalty;
		$user_id=$request->loser;
		
		$user_details = User::where('id', $user_id)->first();
		$old_wallet = $user_details->wallet;
		$new_wallet =  $old_wallet-$penalty;
		             
		 $user = User::find($user_id);
		 $user->wallet = $new_wallet;
		 $user->save();
		 
		    $order_id = 'Penalty_'.rand(00000000,99999999);
                $Trans_hist = new TransactionHistory;
			 $Trans_hist->user_id = $user_id;
			 $Trans_hist->payment_id = 0;
			 $Trans_hist->order_id = $order_id;
			 $Trans_hist->day = date('d');
		   	 $Trans_hist->month = date('M');
			 $Trans_hist->year = date('Y');
			 $Trans_hist->paying_time = date('h:i A');
			 $Trans_hist->amount = $penalty;
			 $Trans_hist->add_or_withdraw = 'Penalty';
			 $Trans_hist->closing_balance = $new_wallet;
			 
			 $Trans_hist->withdraw_status = 'success';
			 $Trans_hist->remark = 'Penalty';
			 $Trans_hist->save();
			 return redirect()->back();
	}
	
}
