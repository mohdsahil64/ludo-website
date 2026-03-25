<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game;
use App\Battle;
use Alert;

class HomeController extends Controller
{
  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
         $battle_running = Battle::where('is_running','yes')->orderBy('id', 'DESC')->get();
	$battle_count = Battle::where('is_running','yes')->orderBy('id', 'DESC')->count();
		$games = Game::where('status',1)->get();
		return view('welcome',compact('battle_running','battle_count','games'));
    }
}
