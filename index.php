<?php
  require("connection.php");
 // Code by SUDHIR  // 
?>
<?php
  if(isset($_POST['login'])){
        $mail=$_POST['mail'];
        $pass=$_POST['pass'];
        $squery="SELECT * FROM `user_tb` WHERE `email`='$mail' AND `password`='$pass'";
        $rst=mysqli_query($con,$squery);
        if(mysqli_num_rows($rst)==1){
            session_start();
            // $_SESSION['id']=session_id();
            $_SESSION['umail']=$mail;
            $row=mysqli_fetch_assoc($rst);
            if($row){
                $_SESSION['uname']=$row['name'];
                $_SESSION['uphone']=$row['phone'];
            }
            header('location: secondpage.php');
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert"> You Have
            <strong>Succesfully</strong> Log In !
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
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
    <title>Mechanic_On_Duty</title>
    <link rel="apple-touch-icon" sizes="180x180" href="./img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./img/favicon/favicon-16x16.png">
    <link rel="manifest" href="./img/favicon/site.webmanifest">
    <link rel="mask-icon" href="./img/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="/Css/index.css"> -->
    <link rel="stylesheet" href="./Css/index.css">
</head>
<body>
  <div class="loader"></div>
    <nav class="navbar sticky-top" style="background-color: #83c2f0;">
        <div class="container-fluid">
          <a class="navbar-brand" href="#"><img src="./img/logo_img.jpg" alt="LOGO"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item bold">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item bold">
                <a class="nav-link" href="adminlogin.php">Admin Panel</a>
              </li>
              <li class="nav-item bold dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Dropdown
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item s-bold" href="#services">Services</a></li>
                  <li><a class="dropdown-item s-bold" href="#about">About Us</a></li>
                  <li><a class="dropdown-item s-bold" href="#contact">Contact Us</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <section id="sec1">
        <h1 class="ink">Welcome In Mechanic On Duty!</h1>
        <div class="bt-box">
        <button type="button" class="btn btn-primary" onclick="openLogIn()">Log In</button>
        <button type="button" class="btn btn-primary"><a href="signform.php">Sign In</a></button>
        </div>
      </div>
      </div>
      <!-- </section> -->
      <!-- services section -->
      <div id="services">
        <h2 class="ink">Services</h2>
          <div class="row">
          <div class="card ">
            <img src="./img/carwash_img.png" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title wavy">Car Washing</h5>
              <p class="card-text">Car Wash by Skillful Worker's With Latest Equipment! Every Part Of Car Clean Either it is Outside or Innerside.</p>
            </div>
          </div>
          <div class="card">
            <img src="./img/battery_img.png" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title wavy">Car Battery Problem</h5>
              <p class="card-text">We Service Your Battery, We Can Replace Old Battery With New One. Also Can Charge Your Old Battery  </p>
            </div>
          </div>
          <div class="card">
            <img src="./img/engine_img.png" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title wavy">Car Engine Problem</h5>
              <p class="card-text">We Have Engine Service Also Available, Oil Leak, Heat Problem, Starter Problem. We Service Your Car Engine like New One </p>
            </div>
          </div>
          </div>
          <div class="row">
            <div class="card">
              <img src="./img/windsheild_img.png" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title wavy">Car Windsheild Replace</h5>
                <p class="card-text">Windsheild Replace, Window Coating, We Use  Dust Resist Glasses, Improving Your Visibility Through Car!</p>
              </div>
            </div>
            <div class="card">
              <img src="./img/wheel-icon.svg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title wavy">Wheel Replace</h5>
                <p class="card-text">We Have R-16,R-17,R-18,R-19. Tyres Available for Different different Car Models.</p>
              </div>
            </div>
            <div class="card">
              <img src="./img/repair_img.png" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title wavy">Car Reparing & Servicing</h5>
                <p class="card-text">Full Car Reparing And Servicing Is Also One Option for Your Car.!</p>
              </div>
            </div>
          </div>
    </div>
    </section>
    <!-- loginbox  -->
    <div class="loginbox">
      <img src="./img/logo_img.jpg" alt="" id="logimg">
      <span id="cross">&cross;</span>
      <form method="post" id="logform">
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Email address</label>
        <input type="email" class="form-control" name="mail" placeholder="name@example.com" required>
      </div>
      <div class="mb-3">
        <label for="Password" class="form-label">Password</label>
        <input type="password" name="pass" class="form-control"  required>
      </div>
      <button type="submit" name="login"class="btn btn-primary ">Submit</button>
    </form>
  </div>
  <!-- contact form -->
<section id="contact">
      <h2>Contact US</h2>
      <form id="ct" method="post">
        <div class="mb-3">
          <label for="User Name" class="form-label ctlabel">Your Name</label>
          <input type="text" name="ctname" class="form-control w-10 ctinput" required>
        </div>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label ctlabel">Email address</label>
          <input type="email" name="ctmail" class="form-control w-10 ctinput"  aria-describedby="emailHelp" required>
        </div>
        <div class="mb-3">
          <label for="exampleFormControlTextarea1" class="form-label ctlabel">Your Queries ?</label>
          <textarea class="form-control ctinput"name="cttextarea" rows="6"></textarea>
        </div>
        <div class="mb-3 form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1" checked>
          <label class="form-check-label ctlabel" for="exampleCheck1">Check me out</label>
        </div>
        <button type="submit" name="ctsubmit" class="btn btn-primary ct">Submit</button>
      </form>
    </section>
    <?php
    // taking Input From contact form and saving database
    if(isset($_POST['ctsubmit'])){
        $ctname=$_POST['ctname'];
        $ctmail=$_POST['ctmail'];
        $cttextarea=$_POST['cttextarea'];
        if(empty($ctname)&& empty($ctmail)){
            echo "<script>alert('Please Fill All Details!');</script>";
        }
        else{
        $ctquery="INSERT INTO `contact_tb` (`name`, `email`, `query`) VALUES ('$ctname', '$ctmail', '$cttextarea')";
        $rst=mysqli_query($con,$ctquery);
            if($rst){
            echo "<script>alert('Contact Form Submited!');</script>";
            }
            else{
            echo "<script>alert('Something Went Wrong!');</script>";
            }
     }}?>
     <!-- footer  -->
    <footer id="about">
      <h3 class="ink">Mechanic On Duty !</h3>
      <img src="./img/mechanic_img.png" alt="Mechanic Logo" id="mechanic">
      <div class="social">
        <a href="#"><img src="./img/facebook.png" alt="instagram"></a>
        <a href="#"><img src="./img/instagram.png" alt="facebook"></a>
        <h5>Follow Us On !</h5>
      </div>
      <div class="timing">
      <h5 class="ink">Monday &rightarrow; 10 Am to 8 Pm.</h5>
      <h5 class="ink">Tuesday &rightarrow; 10 Am to 8 Pm.</h5>
      <h5 class="ink">Wednesday &rightarrow; 10 Am to 8 Pm.</h5>
      <h5 class="ink">Thursday &rightarrow; 10 Am to 8 Pm.</h5>
      <h5 class="ink">Friday &rightarrow; 10 Am to 8 Pm.</h5>
      <h5 class="ink">Saturday &rightarrow; 10 Am to 8 Pm.</h5>
      <h5 class="ink">Garage Closes At Sunday.</h5>
      </div>
      <div class="info">
        <p><strong>About Us?</strong> We Have Trained And Professional Worker's For Your Car</p>
        <p> Car Delivery <strong>Is ON TIME !</strong></p>
        <p>Great Feedback From <strong>Satisfied Custmer's</strong></p>
        <p>Contact Us On <strong>-1234567890</strong></p>
        <p>Our Mail id <strong>mechaniconduty333@gmail.com</strong></p>
      </div>
      <h5 id="copyrg">&copy; Are Reserved 2023 Mechanic On Duty</h5>
      <img src="./img/scroll_img.png" alt="" id="rocket">
    </footer>
    <script src="./Js/index.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</body>
</html>