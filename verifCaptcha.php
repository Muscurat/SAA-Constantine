        
<?php

session_start();

if(isset($_POST['captcha'])){
    if($_POST['captcha']==$_SESSION['code']){
        echo 1;
    } else {
        echo 0;
    }
}
?>