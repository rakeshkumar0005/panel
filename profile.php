<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body class="">

<?php 
   include "dbconfig.php";

    $sql=$db->query("SELECT * FROM users  WHERE email ='{$_SESSION['uemail']}'");
   
    $user= $sql->fetch_array();


    if(isset($_POST['updateprofile'])){
      $fname= $_POST['fname'];
      $lname= $_POST['lname'];
      $address= $_POST['address'];
      $postcode= $_POST['postcode'];
      $state= $_POST['state'];
      $education= $_POST['education'];
      $country= $_POST['country'];
      $email= $_POST['email'];
      $mobile= $_POST['mobile'];
      

     

      $db->query(" UPDATE users SET firstname='{$fname}',lastname='{$lname}',address='{$address}',postcode='{$postcode}',state='{$state}',education='{$education}',country='{$country}',email='{$email}',mobile='{$mobile}' WHERE email ='{$_SESSION['uemail']}'");

    }
  
?>
<header class="py-3 mb-3 border-bottom mx-5">
 
      

        <div class="flex-shrink-0 dropdown">
          <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
          </a>
          <ul class="dropdown-menu text-small shadow">
            <li><a class="dropdown-item" href="#">New project...</a></li>
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="logout.php">Log out</a></li>
          </ul>
        </div>
      </div> 
    </div>
  </header>
<h2 class="text-success text-center"> Your Profile</h2>

  <div class="container-fluid  p-3 px-5">
    <div class="row gap-5   ">
      <div class="col-3 border rounded-3">
      <div class="col-md-3 border-right m-auto">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
              <img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
              <span class="text-danger fw-bold"><?= $user['firstname'],$user['lastname'] ?></span>            
              <span class="fw-bold"><?= $user['address'] ?></span>
              <span class="fw-bold"><?= $user['postcode'] ?></span>
              <span class="fw-bold"><?= $user['state'] ?></span>
              <span class="fw-bold"><?= $user['education'] ?></span>
              <span class="fw-bold"><?= $user['email'] ?></span>
              <span class="fw-bold"><?= $user['mobile'] ?></span>
              <span class="fw-bold"><?= $user['country'] ?></span>
              
            
            </div></div>
             
        </div>
      
      <div class="col-8 ">
      <div class="p-5 text-center bg-body-tertiary rounded-3">
      <div class="container rounded bg-white mt-2 mb-5">
    <div class="row">
      
        <div class="col-md-8 border-right">
            <form method="post" class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>  
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">First Name</label><input type="text" name="fname" class="form-control" placeholder="first name" value="<?= $user['firstname'] ?>"></div>
                    <div class="col-md-6"><label class="labels">Last Name</label><input type="text" name="lname" class="form-control" value="<?= $user['lastname'] ?>" placeholder="last name"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Mobile Number</label><input type="text" name="mobile" class="form-control" placeholder="enter phone number" value="<?= $user['mobile'] ?>"></div>
                    <div class="col-md-12"><label class="labels">Address</label><input type="text" name="address" class="form-control" placeholder="enter address " value="<?= $user['address'] ?>"></div>
                    <div class="col-md-12"><label class="labels">Postcode</label><input type="text" name="postcode" class="form-control" placeholder="enter postcode" value="<?= $user['postcode'] ?>"></div>
                    <div class="col-md-12"><label class="labels">State</label><input type="text" name="state" class="form-control" placeholder="enter state" value="<?= $user['state'] ?>"></div>
                    <div class="col-md-12"><label class="labels">Email ID</label><input type="text" name="email" class="form-control" placeholder="enter email id" value="<?= $user['email'] ?>"></div>
                    <div class="col-md-12"><label class="labels">Education</label><input type="text" name="education" class="form-control" placeholder="education" value="<?= $user['education'] ?>"></div>
                    <div class="col-md-12"><label class="labels">Country</label><input type="text"name="country" class="form-control" placeholder="country" value="<?= $user['country'] ?>"></div>

                </div>
                
                </div>
                <div class="mt-2 text-center"><button class="btn btn-primary profile-button" name="updateprofile" type="submit">Save Profile</button></div>
</form>
        </div>
        
        </div>
    </div>
</div>
</div>
</div>


  </div>
      </div>
    </div>
  </div>
  </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>