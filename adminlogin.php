<?php
    require("connection.php");?>
<?php
//  verifying admin name and password
  if(isset($_POST['login'])){
        $mail=$_POST['Amail'];
        $pass=$_POST['Apass'];
        $squery="SELECT * FROM `admin_tb` WHERE `adminmail`='$mail' AND `adminpassword`='$pass'";
        $rst=mysqli_query($con,$squery);
        if(mysqli_num_rows($rst)==1){
            session_start();
            $_SESSION['Amail']=$mail;
            $row=mysqli_fetch_assoc($rst);
            if($row){
                $_SESSION['Aname']=$row['adminname'];
                $_SESSION['Aphone']=$row['adminphone'];
            }
            header("location: adminpanel.php");
        }
        else{
          echo '<div class="alert alert-danger alert-dismissible fade show" role="alert"> You Have Entered 
          <strong>Wrong Password!</strong> 
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
      }?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>M.O.D._Adminlogin</title>
    <link rel="apple-touch-icon" sizes="180x180" href="./img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./img/favicon/favicon-16x16.png">
    <link rel="manifest" href="./img/favicon/site.webmanifest">
    <link rel="mask-icon" href="./img/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="./Css/adminlogin.css">
</head>

<body>
    <div class="loader"></div>
<nav>
    <div class="logo"><img src="./img/logo_img.jpg" alt=""></div>
    <a href="index.php">Home</a>
    <h2>Welcome Admin !</h2>
</nav>
 <!-- Log in box Admin  -->
<div class="loginbox">
      <img src="./img/logo_img.jpg" alt="" id="logimg">
      <form method="post" id="logform">
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Email address</label>
        <input type="email" class="form-control" name="Amail" placeholder="name@example.com" required>
      </div>
      <div class="mb-3">
        <label for="Password" class="form-label">Password</label>
        <input type="password" name="Apass" class="form-control"  required>
      </div>
      <button type="submit" name="login" class="btn btn-primary ">Submit</button>
    </form>
  </div>
<script>
    var loader=document.querySelector(".loader");
  window.addEventListener("load",()=>{
    loader.style.display="none";
  });
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
<script>
</body>
</html>