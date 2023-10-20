<!DOCTYPE html>
<html lang="en">
<!--
︵︵︵︵︵︵︵︵︵︵︵︵︵︵︵︵︵
( ------------------------------ )
( ┊                            ┊ )
( ┊         M2NS Home          ┊ )
( ┊         Welcome!!          ┊ )
( ┊                            ┊ )
( ------------------------------ )
︶︶︶︶︶︶︶︶︶︶︶︶︶︶︶︶︶　
-->
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="vendor/css/style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>M2NS mailer</title>
</head>
<script type="text/javascript">
function countFakes()
{
document.getElementById("count").innerHTML =
document.getElementById("email_list").value.split("\n").length;
}
</script>
<body>
<form action="" method="POST" enctype="multipart/form-data">
<div class="navmen">
<center>
<label>M2NS mailer v1.0</label> <br>
<label>Subject  : </label> <input type="text" size="20" name="subject" value="about what" placeholder=" - " required><br>
<label>Your Email : </label> <input type="text" size="20" name="email" value="your@mail.com"placeholder=" - " required><br>
<label>Your Name : </label> <input type="text" size="20" name="namemail" value="Name" placeholder=" - " required><br><br>
<input type="file" name="file" class="filec" />
</center>
<center><label class="email_text">Email List: </label></center><br>
<center>
<textarea name="email_list" id="email_list" onKeyDown="countFakes()" onChange="countFakes()"   required></textarea><br> <br>
</center>
</div><br>
<center>
<script src="ckeditor/ckeditor.js"></script>
<textarea id="editor" name="message" >

    </textarea>

<script>
CKEDITOR.replace('editor')
var deviceSystem = navigator.userAgent.toLowerCase();
if(deviceSystem.includes("android") ||  deviceSystem.includes("iphone")){
    CKEDITOR.config.width = 400;
}else{
    CKEDITOR.config.width = 800;
}
</script></center><br>

<center>
<input type="submit" name="submit" value=" Send To All Mails " class="send"><br><br><br>

</center>
</div>
</form>
</body>
</html>


<?php
require 'mail.php';
if(isset($_POST['submit'])){
    foreach(explode("\r\n", $_POST['email_list']) as $tomail){
        if(filter_var($tomail, FILTER_VALIDATE_EMAIL)){
            $mymail = $_POST['email'];
            $subject = $_POST['subject'];
            $message = $_POST['message'];
            $name = $_POST['namemail'];
            $mail->addAddress($tomail);
            $mail->setFrom($mymail,$name);
            $mail->Subject = $subject;
            $mail->Body = $message;
            $mail->addAttachment($_FILES['file']['tmp_name'] , $_FILES['file']['name']);
            $mail->send();
        }else{
            continue;
        }

    }



}


?>