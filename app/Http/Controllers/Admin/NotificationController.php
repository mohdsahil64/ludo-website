<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Notification;
use App\Battle;
use App\UserBankDetail;
use App\UserData;
use App\TransactionHistory;

class NotificationController extends Controller
{
   
    public function index()
    {
		$notification  = Notification::orderBy('id', 'DESC')->get();
        return view('admin.notifications.notification',compact('notification'));
    }

	 public function create()
    {
        return view('admin.notifications.notification_create');
    }
	
	
	 public function store(Request $request)
    {
                                  Notification::create([
                                      'message' => $request->message,
                                      'status' => $request->status,
                                ]);
                                   
                 return redirect('admin/notifications/')->with('success',' Inserted Succefully !!');
                                   
                               
    }
	
	
	public function show($id)
    {
        $game  = Notification::where('id',$id)->first();
		
		return view('admin.notifications.notification_view', compact('game'));
    }
	 /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $game  = Notification::where('id',$id)->first();
		
		return view('admin.notifications.notification_create', compact('game'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
		$game = Notification::find($id);
		$game->message = $request->message;
		$game->status = $request->status;
		$game->save();
		
		return redirect('admin/notifications')->with('success',' Updated Succefully !!');
		
       }
	
	
	 public function destroy($id)
    {
		  
         $notifications  = Notification::where('id',$id)->delete();
		 
		 return redirect('admin/notifications/')->with('success','notifications Deleted !!');
    }
 
}
