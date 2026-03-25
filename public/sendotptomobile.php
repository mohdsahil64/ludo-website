<?php
   include "control/activity.php";
   $dd = new activity();
   $mob = $_REQUEST['mobile'];

   $check = $dd->check("users"," where mobile='$mob'");
   if($check['status'] == "success")
   {
        $otp = $check['data']['otp'];
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://apihome.in/panel/api/bulksms/?key=597e63dbd37bb7866a3828f415f51ae626892&mobile=$mob&otp=$otp",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'GET',
          CURLOPT_HTTPHEADER => array(
            'Cookie: PHPSESSID=f238583d42e0fd32a0fb8cc59f0bcc7c'
          ),
        ));
        
        $response = curl_exec($curl);
        curl_close($curl);
   }else{
       $otp = rand(000000,999999);
       $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://apihome.in/panel/api/bulksms/?key=597e63dbd37bb7866a3828f415f51ae626892&mobile=$mob&otp=$otp",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'GET',
          CURLOPT_HTTPHEADER => array(
            'Cookie: PHPSESSID=f238583d42e0fd32a0fb8cc59f0bcc7c'
          ),
        ));
        
        $response = curl_exec($curl);
        curl_close($curl);
   }
?>