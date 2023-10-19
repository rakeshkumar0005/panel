<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body class="bg-light">


            <?php 
   include "dbconfig.php";

   if(isset($_POST['forgot'])) {

    $email= $_POST['email'];
    

    $sql=$db->query("SELECT * FROM users  WHERE email ='{$email}' ");
   
   
    echo " Password change link sent on your valid email";

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp-relay.sendinblue.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'rakeshkumar9782020@gmail.com';                     //SMTP username
    $mail->Password   = 'hBKzCvqIGsVWa290';                               //SMTP password
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('from@example.com', 'Mailer');
    $mail->addAddress($email, 'Joe User');     //Add a recipient
   
    //Content
    $mail->isHTML(true);                           //Set email format to HTML
    $mail->Subject = 'Change Password';
    $mail->Body    = 'click this link to change password <a href="http://localhost/panel/password.php?email='.$email.'"><b>Set password</b></a>';

    $mail->send();
    echo '';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
   
          $_SESSION['uemail']= $email;
          header('location:login.php');
          
   }else{

       echo "User not found";
   }



?>


<main class="form-signin col-3 mt-5  m-auto  text-center">
<img class="mb-4" src="https://getbootstrap.com/docs/5.3/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal text-center">Forgot Password</h1>
 

<form class="border card p-4 shadow" method="POST">
    
    <div class="form-floating mb-3">
      <input type="email" class="form-control" name="email" placeholder="name@example.com" fdprocessedid="zyn71">
      <label for="floatingInput">Email address</label>
    </div>
    

    <button class="w-100 btn btn-lg btn-danger mt-4" name="forgot" type="submit" fdprocessedid="ka7hfq">Forgot Password</button>

    
   
  </form>
  <p class="mt-2 mb-3 text-body-secondary">© 2017–2023</p>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>





