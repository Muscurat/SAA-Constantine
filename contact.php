<html>
<head>
</head>
<body>




<!-- page contact.php -->
<form action="contact.php" method="post">
    <input type="text" name="captcha"/>
   
    <img src="image.php" onclick="this.src='image.php?' + Math.random();" alt="captcha" style="cursor:pointer;">
</form>

<?php
session_start();
if(isset($_POST['captcha'])){
    if($_POST['captcha']==$_SESSION['code']){
        echo "Code correct";
    } else {
        echo "Code incorrect";
    }
}
?>
</body>
</html>