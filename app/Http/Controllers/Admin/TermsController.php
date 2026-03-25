<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

use App\Terms;
use Illuminate\Http\Request;

class TermsController extends Controller
{
    public function index()
    {
		$terms  = Terms::orderBy('id', 'DESC')->get();
        return view('admin.terms.terms',compact('terms'));
    }

	 public function create()
    {
        return view('admin.terms.terms_create');
    }
	
	
	 public function store(Request $request)
    {
        Terms::create([
            'content_type' => $request->content_type,
            'content' => $request->content,
        ]);
        return redirect('admin/terms/')->with('success',' Inserted Succefully !!');
    }
	
	 
    public function edit($id)
    {
        $terms  = Terms::where('id',$id)->first();
		return view('admin.terms.terms_create', compact('terms'));
    }

    
    public function update(Request $request, $id)
    {
		$game = Terms::find($id);
		$game->content_type = $request->content_type;
		$game->content = $request->content;
		$game->save();
		return redirect('admin/terms')->with('success',' Updated Succefully !!');
       }
	
}
