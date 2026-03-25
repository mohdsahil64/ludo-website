<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

use App\Support;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function index()
    {
		$support  = Support::orderBy('id', 'DESC')->get();
        return view('admin.support.support',compact('support'));
    }

	 public function create()
    {
        return view('admin.support.support_create');
    }
	
	
	 public function store(Request $request)
    {
        Support::create([
            'support_no' => $request->support_no,
            'support_type' => $request->support_type,
        ]);
        return redirect('admin/support/')->with('success',' Inserted Succefully !!');
    }
	
	 
    public function edit($id)
    {
        $support  = Support::where('id',$id)->first();
		return view('admin.support.support_create', compact('support'));
    }

    
    public function update(Request $request, $id)
    {
		$game = Support::find($id);
		$game->support_no = $request->support_no;
		$game->support_type = $request->support_type;
		$game->save();
		return redirect('admin/support')->with('success',' Updated Succefully !!');
       }
	
}
