@extends('layouts.master')

@section('head')
<title>Play Games Online and Earn Money | Ludo, Cricket, Chess, Carrom &amp;amp; Many More Game</title>

@endsection



@section('content')
<div class="main-area" style="padding-top: 60px;">
	<div class="m-3">
		<h2>JKLudo Rules</h2>
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="/">Home</a></li>
				<li class="breadcrumb-item active" aria-current="page">JKLudo Rules</li>
			</ol>
		</nav>
		<div class="row">
			<div class="col-12">
				<h4>Game Rules:</h4>
				<ol class="rules-list">
					<li>Game will be conducted between 2 players.</li>
					<li>You will get "SIX" on dice roll, if your dice roll not got "SIX" for consecutive 10 turns.</li>
					<li>For every turn in game, user have 30 seconds to play move, else your token will get moved automatically.</li>
					<li>On disconnect/leaving from game, your turn will be automatically played for max 5 times.</li>
					<li>On sixth (6th) miss/timeout move, player will be considered as looser.</li>
					<li>If all your tokens are at home and your opponent get disconnected, game will be considered as "cancelled".</li>
					<li>If your opponent leaves/disconnect from game at starting or middle of game, result will be declared as mentioned above :<ul><b>50% Win</b>, if only 3 tokens are out from home or your score is less than 34.</ul>
						<ul><b>100% Win</b>, if atlest 4 tokens are out from home or your score is more than 34.</ul>
					</li>
					<li>A player must have to record every game, and if any player is hacking or cheating in a game, please contact support with video proof.</li>
					<li>If you don't have any proof against player cheating and error in the game, then you will be considered as lost for a particular battle.</li>
				</ol>
			</div>
		</div>
	</div>
</div>

@endsection
