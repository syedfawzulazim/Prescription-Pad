<?php

  if (isset($_POST['submit'])) {

    if (mail($_POST['email'],$_POST['subject'],$_POST['msg'])){
      echo "mail sent";
    }else {
      echo "failed";
    }


        $mail->Host='smtp.gamil.com';
        $mail->Port=587;
        $mail->SMTPAuth=true;
        $mail->SMTPSecure='tls';
        $mail->Username='adnansyed27@gmail.com';
        $mail->Password='adnansparrrow27';

        $mail->setFrom($_POST['email'],$POST['name']);
        $mail->addAddress('adnansparrow27@gmail.com');

        $mail->isHTML(true);
        $mail->Subject='Form Submission: '.$_POST['subject'];
        $mail->Body='<h1 align=center>Name: '.$_POST['name'].'<br>Email: '.$_POST['email'].'<br>Message: '.$_POST['msg'].'</h1>';

        if (!$mail->send()) {
          $result="Something went wrong, please try again.";
        }
        else {
          $result="Thanks ".$_POST['name']."for contacting us, we'll get back to you soon";
        }

      }





 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="email.css">
  </head>
  <body>
    <div class="email">

      <img class="img" src="img/email1.jpg" alt=""><br>
      <label class="label" for="name">Your Name</label><br>
      <input type="text" name="name" value=""><br>
      <label class="label" for="email">Your Email Address</label><br>
      <input type="text" name="email" value=""><br>
      <label for="email">Subject</label><br>
      <input type="text" name="subject" placeholder="" value=""><br>
      <label for="email">Message</label><br>
      <textarea id="msg" name="msg" placeholder="write your message..." style="height:80px"></textarea><br>
      <button type="submit" name="submit"> Send Email</button>

    </div>



  </body>
</html>
