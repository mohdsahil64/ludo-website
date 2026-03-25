<?php

class dbaction
{
	
	function __construct()
	{
        // $this->con = mysqli_connect("localhost","root","","777game");
             $this->con = mysqli_connect("localhost", "root", "", "IcJhzWpsmfivLyzzzMMvgickDnFzmDXU");

	}


    //insert into database
    public function insert($table,$value)
    {

   	    $insert = "INSERT INTO ".$table." ".$value;
    	$run = mysqli_query($this->con,$insert);
    	if($run)
    	{
    		$result = true;
    	}return $result;
    }

    public function update($table,$value,$condition)
    {
        $update = "UPDATE ".$table." SET"." $value"." WHERE ".$condition;
        $run = mysqli_query($this->con,$update);
        if($run)
        {
            $result = true;
        }return $result;
    }
    
    
    
      public function delete($table,$condition)
    {
        $update = "DELETE FROM $table WHERE $condition";
        $run = mysqli_query($this->con,$update);
        if($run)
        {
            $result = true;
        }return $result;
    }


    public function sendsms($mobile,$sms)
    {

        $message = urlencode($sms);
         $ch = curl_init();
         $timeout = 0; // set to zero for no timeout
         $myHITurl = "http://sms.hspsms.com/sendSMS?username=saddam&message=$message&sendername=CHOTAD&smstype=TRANS&numbers=$mobile&apikey=80d6bd48-abc3-4b8f6107af";
       curl_setopt ($ch, CURLOPT_URL, $myHITurl);
       curl_setopt ($ch, CURLOPT_HEADER, 0);
       curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
       curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
       $file_contents2 = curl_exec($ch);
       $curl_error = curl_errno($ch);
       $arrayresponce = json_decode($file_contents2);
       $alldata = $arrayresponce[0]; 
       return true;
    }

}

?>