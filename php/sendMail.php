<?php

$emailSubject="commentaire du client";
$webMaster="bachir25112511@gmail.com";


$email=$_POST["email"];
$name=$_POST["name"];
$comment=$_POST["comment"];
$phone=$_POST["phone"];

$body = '\n Email : '.$email.'\n Name :'.$name.'\n Phone :'.$phone.'\n comment :'.$comment;

  $headers = "From:".$email."\r\n";
  $headers .= "Content-type: text/html\r\n";
  $result = mail($webMaster,$emailSubject,$body,$headers);
  //echo 'sending sucsseful...';
if($result) {
      echo "OK";
} else {
  
      echo "NO"; 
}


?>