<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>OTP</title>
	    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

</head>
<body>
<?php 
   include "dbconfig.php";

   if(isset($_POST['submit'])) {

   $email = $_GET['email'];
   $otp = $_POST['otp'];
    

    $sql=$db->query("SELECT * FROM  users  WHERE  email='{$email}' AND otp ='{$otp}'");
   
    if(mysqli_num_rows($sql) == 1) {

      $sql=$db->query(" UPDATE users SET status='1' WHERE email ='{$email}'");
  

           echo "Verified OTP";
           header('location:login.php');
           
           
    }else{

        echo "OTP Not Match";
    }

   }

?>


<main class="form-signin col-3 mt-5  m-auto  text-center">
<img class="mb-4" src="https://getbootstrap.com/docs/5.3/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal text-center">Verify OTP</h1>
 

<form class="border card p-4 shadow" method="POST">
    
    <div class="form-floating mb-3">
      <input type="number" class="form-control" name="otp" placeholder="name@example.com" fdprocessedid="zyn71">
      <label for="floatingInput">Enter OTP</label>
    </div>
    
    
    <button class="w-100 btn btn-lg btn-primary mt-4" name="submit" type="submit" fdprocessedid="ka7hfq">Submit</button>
   
  </form>
  <p class="mt-2 mb-3 text-body-secondary">© 2017–2023</p>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>