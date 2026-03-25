<?php
include 'dbaction.php';
date_default_timezone_set('Asia/Calcutta'); 

 @session_start();

 class activity
 {

     function __construct()
     {
      /*$this->con = mysqli_connect("localhost","root","","devilclub");*/
        
             $this->con = mysqli_connect("localhost", "root", "", "test");

        $this->Action = new dbaction();
        @$this->link = $_SESSION['url_link'];
     }

     public function userLogin($table,$username,$password)
     {
        $select = "select * from $table where username='$username' AND password='$password'";
        $run = mysqli_query($this->con,$select);
        $check = mysqli_num_rows($run);
        if($check == 1)
        {
          return array("status" => "success","remark" => "Login successfull..!!","data" => mysqli_fetch_array($run)); 
        }
        else{
          return array("status" => "failed","remark" => "Login details not match..!!","data" => ""); 

        }
     }


     public function insertData($table,$value)
     {
        $result = $this->Action->insert($table,$value);
        return $result;
     }


     public function updateData($table,$value,$condition)
     {
        $result = $this->Action->update($table,$value,$condition);
        return $result;
     }
     
     
      public function deleteData($table,$condition)
     {
        $result = $this->Action->delete($table,$condition);
        return $result;
     }


     public function fetch_multi($table,$condition)
     {
      $arrayarea = array();
      $select = "select * from $table ".$condition;
      $run = mysqli_query($this->con,$select);
      while ($rr = mysqli_fetch_array($run)) {
        $arraName = array($rr);
        $arrayarea[]=$arraName;
      }
      $data = json_encode($arrayarea);
      $data2 = str_replace(']', '', $data);
      $data3 = str_replace('[', '', $data2);
      $data4 = "[".$data3."]";
      return $result3 = json_decode($data4);
     }


     public function single($table,$condition)
     {
      $select = "select * from $table ".$condition;
      $run = mysqli_query($this->con,$select);
      return mysqli_fetch_array($run);
     }


     public function check($table,$condition)
     {
      $select = "select * from $table ".$condition;
      $run = mysqli_query($this->con,$select);
      $check = mysqli_num_rows($run);
      if($check >= 1)
      {
        return array("status" => "success","data" => mysqli_fetch_array($run));
      }
      else{
        return array("status" => "failed","data" => "null");
      }
     }



     public function getSum($table,$clm,$condition)
     {
      $select = "select SUM($clm) from $table ".$condition;
      $run = mysqli_query($this->con,$select);
      $check = mysqli_num_rows($run);
      if($check >= 1)
      {
        return array("status" => "success","data" => mysqli_fetch_array($run));
      }
      else{
        return array("status" => "failed","data" => "null");
      }
     }



     public function sendsms($mobile,$sms)
     {
        $result = $this->Action->sendsms($mobile,$sms);
        return true;
     }


}

?>