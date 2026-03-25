 	@foreach($battle_created as $row)<!-- game is created-->

		<?php $creator = App\User::where('id', $row->creator_id)->first();   ?>
		
		<div id="6345971c71f80dea71bf71cf" class="betCard mt-1"><span class="betCard-title pl-3 d-flex align-items-center text-uppercase">Challenge From<span class="ml-1" style="color: brown;">{{ $creator->vplay_id }}</span>
   	    
				@if($row->creator_id == Auth::user()->id)
		    	    @if($row->request_status == 0)
	    	        <button class="m-1 mb-1 ml-auto btn-danger btn-sm" style="padding:1px 30px 1px 30px"><a href="{{ url('lobby/delete/'.$row->id) }}" style="font-size:9px; color:white; font-weight:800"> DELETE</a></button>
		    	    @endif
		    	    @if($row->request_status == 2)
	    	     
		    	       <a href="{{ url('lobby/start/'.$row->id) }}" class="btn btn-success btn-xs" style="margin-left:55%; margin-top:1px; position: absolute; font-size:9px; color:white; font-weight:800 ">Start Game</a>
		    	    @endif
		    	   
		    	   @endif
		    	   
		    	   
		    	     @if($row->joiner_id == Auth::user()->id)
			         
			        @if($row->request_status == 2)
				     <a href="{{url('/view-battle/'.$row->battle_id) }}" class="btn btn-danger btn-xs btn-can"style="margin-left:68%; margin-top:1px; position: absolute; font-size:11px;" >View Battel</a>
				     @endif
				      @if($row->request_status == 1)
				      <a href="{{ url('lobby/join/'.$row->id) }}" class="bg-success playButton cxy" style="font-weight:1000">Start Game</a> 
				     @endif
				  
				   @endif
			
    	  
	    	    
			</span>
					

			<div class="d-flex pl-2">
				<div class="pr-4 pb-1"><span class="betCard-subTitle">Entry Fee</span>
					<div><img src="{{asset('frontend/images/global-rupeeIcon.png')}}" width="25px" alt=""><span class="betCard-amount">{{ $row->entry_fee }}</span></div>
				</div>
				<div><span class="betCard-subTitle">Prize</span>
					<div><img src="{{asset('frontend/images/global-rupeeIcon.png')}}" width="25px" alt=""><span class="betCard-amount">{{ $row->prize }}</span></div>
				</div>
				<div style="margin-top:17px; margin-left:14px; font-size:11px" align="center">
					<div align="center">@if(isset($row->label))Player Level {{ $row->label }} @endif</div>
				</div>
				
				@if($row->creator_id == Auth::user()->id)
		    	    @if($row->request_status == 0)
	    	       <div class="text-center col-5 ml-auto mt-auto mb-auto"><div class="pl-2 text-center"><img src="data:image/gif;base64,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" style="width: 17px; height: 17px;"></div><div style="line-height: 2;"><span class="Home_betCard_playerName__57U-C" style="font-size:15px">Finding Player</span></div></div>
		    	     
		    	    @endif
		    	    @if($row->request_status == 2)
		    	       <!--//Joiner or request sender names-->
		    	       <?php $Joiner =  App\User::where('id',$row->joiner_id)->first(); ?>
		    	       <div class="d-flex ml-auto align-items-center mr-5 mt-1"><audio src="{{asset('/static/media/accept.9bcac551ddce2d65c3b7.mp3')}}" autoplay=""></audio><div class="text-center col"><div class="pl-2"><img src="{{asset('frontend/images/avatars/Avatar2.png')}}" alt="" width="40px" height="40px" style="border-radius: 50%; margin-top: 5px;"></div><div style="line-height: 1;"><span class="Home_betCard_playerName__57U-C" style="font-size:15px">{{ $Joiner->vplay_id }}</span></div></div></div>
		    	    @endif
		    	   
				
				    
				  @else
				     @if($row->request_status == 0)
				     <a href="{{ url('lobby/send-request/'.$row->id) }}" class="Home_bgSecondary__0O2kV Home_playButton__V95wM Home_cxy__fI4uz btn-sm" style=" color:white; font-size:0.7em; font-weight:700; text-decoration:none" >JOIN BATTLE</a><div class="d-flex ml-auto align-items-center mr-5 mt-1"><audio src="{{asset('/static/media/accept.9bcac551ddce2d65c3b7.mp3')}}" autoplay=""></audio>
				     @endif
				     
				  @endif
				
				
			</div>
		</div>
		@endforeach
		
	
<style>
	.btn-req{
			margin-left:54%; margin-top:1px; position: absolute; padding:5px; font-size:9px; color:white; background-color:gray ; font-weight:800
		}
	.btn-can{
		margin-left:80%; margin-top:1px; padding:4px; position: absolute; font-size:9px; color:white; font-weight:800 
	}
	@media screen and (min-width: 480px) {
		.btn-req{
			margin-left:68%; margin-top:1px; position: absolute; padding:4px; font-size:9px; color:white; background-color:grey ; font-weight:800
		}
	.btn-can{
		margin-left:83%; margin-top:1px; padding:4px; position: absolute; font-size:9px; color:white; font-weight:800 
	}
}
	</style>