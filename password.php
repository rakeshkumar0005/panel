<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Set Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body class="bg-light">



<?php 
   include "dbconfig.php";


    if(isset($_POST['updatepassword'])){
 
      $email= $_GET['email'];
      $newpassword= md5($_POST['password']);
      $confirmpassword= md5($_POST['cpassword']);


      if($newpassword != $confirmpassword){
        echo"password not match";

      }else{
      

      
      $db->query(" UPDATE users SET password='{$newpassword}' WHERE email ='{$email}'");

      echo "password changed";
      header('location:login.php');
      
      }
    }
    
  
?>

<main class="form-signin col-3 mt-5  m-auto  text-center">
<img class="mb-4" src="https://getbootstrap.com/docs/5.3/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal text-center">Set Password</h1>
 

<form class="border card p-4 shadow" method="POST">
    
    <div class="form-floating mb-3">
      <input type="text" class="form-control" name="password"  placeholder="name@example.com"  fdprocessedid="zyn71" required>
      <label for="floatingInput">New password</label>
    </div>

    <div class="form-floating mb-3">
    <input type="text" class="form-control" name="cpassword"  placeholder="name@example.com"  fdprocessedid="zyn71" required>
      <label for="floatingInput">Confirm password</label>
    </div>



    
    <button class="w-100 btn btn-lg btn-primary mt-4" name="updatepassword" type="submit" fdprocessedid="ka7hfq">Submit</button>
   
  </form>
  <p class="mt-2 mb-3 text-body-secondary">© 2017–2023</p>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>