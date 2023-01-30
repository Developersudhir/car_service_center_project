<?php
    session_start();
    if(!isset($_SESSION['umail'])){
        header("location: index.php");
    }
?>
<!DOCTYPE html>
<!-- /* Code By SUDHIR */ -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>M.O.D._Services</title>
    <link rel="apple-touch-icon" sizes="180x180" href="./img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./img/favicon/favicon-16x16.png">
    <link rel="manifest" href="./img/favicon/site.webmanifest">
    <link rel="mask-icon" href="./img/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="./Css/index.css">
    <link rel="stylesheet" href="./Css/secondpage.css">
</head><body>
<div class="loader"></div>
<nav class="navbar sticky-top" style="background-color: #83c2f0;">
        <div class="container-fluid">
          <a class="navbar-brand" href="#"><img src="./img/logo_img.jpg" alt="LOGO" id="logo"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <form class="d-flex" role="search" id="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-primary" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>
      <div class="cont">
<div class="main">
  <!-- Displaying User Info -->
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Welcome <?php echo strtoupper($_SESSION['uname']);?></h5>
      <h6 class="card-text"><?php echo $_SESSION['umail'];?></h6>
      <h6 class="card-text"><?php echo $_SESSION['uphone'];?></h6>
      <!-- <form method="post"><Button class="btn btn-primary" name="logout">Log Out</Button></form> -->
    </div>
    <!-- //
    Log Out Button for User 
    if(isset($_POST['logout'])){
      session_destroy();
      header("location: index.php");
    }// -->
  </div>
  <div class="disimg">
    <img src="./img/car1_img.png" alt="">
  </div>
  <div class="welcometxt">
    <h3>WelCome In M.O.D. </h3>
    <h6>Please Select Service For Your Car</h6>
  </div>
</div>
<div class="services">
  <form action="session.php" method="post">
    <h2>Services!</h2>
  <label for="service1"><img src="./img/carwash_img.png" alt=""> Car Wash</label>
  <span class="time">1Hr</span><input type="checkbox" name="ser1" value="300"><span class="price">300</span>

  <label for="service1"><img src="./img/battery_img.png" alt=""> Battery Problems</label>
  <span class="time">1.5Hr</span><input type="checkbox" name="ser2" value="2000"><span class="price">2000</span>

  <label for="service1"><img src="./img/engine_img.png" alt=""> Engine Problems</label>
  <span class="time">1Hr</span><input type="checkbox" name="ser3" value="4000"><span class="price">4000</span>

  <label for="service1"><img src="./img/wheel-icon.svg" alt=""> Wheel Replace</label>
  <span class="time">30Min</span><input type="checkbox" name="ser4"  value="2000"><span class="price">2000</span>

  <label for="service1"><img src="./img/repair_img.png" alt=""> Car Reparing & Servicing</label>
  <span class="time">3Hr</span><input type="checkbox" name="ser5"  value="8000"><span class="price">8000</span>

  <label for="service1"><img src="./img/windsheild_img.png" alt=""> Windsheild Replace</label>
  <span class="time">3.5Hr</span><input type="checkbox" name="ser6" value="5000"><span class="price">5000</span>

  <div class="btnbox">
  <button name="sersubmit" class="btn btn-primary">Submit</Button></div></form>
</div>
</div>
<!-- footer -->
<footer id="about">
      <h3 class="ink">Mechanic On Duty !</h3>
      <img src="./img/mechanic_img.png" alt="Mechanic Logo" id="mechanic">
      <div class="social">
        <a href="#"><img src="./img/facebook.png" alt="instagram"></a>
        <a href="#"><img src="./img/instagram.png" alt="facebook"></a>
        <h5 id="follow">Follow Us On !</h5>
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
    </footer>
    <!-- Code For Preloader -->
<script>var loader=document.querySelector(".loader");
  window.addEventListener("load",()=>{
    loader.style.display="none";
  });
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</body></html>