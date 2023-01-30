<?php
  require("connection.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>M.O.D._SignIn</title>
    <link rel="apple-touch-icon" sizes="180x180" href="./img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./img/favicon/favicon-16x16.png">
    <link rel="manifest" href="./img/favicon/site.webmanifest">
    <link rel="mask-icon" href="./img/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="./Css/index.css">
    <style>
       nav{
        background-color: #83c2f0;
        display:flex;
        padding:1%;
      } 
    
      nav img{
        width:40px;
        border-radius:50%;

      }
    nav h2{
        margin-left:27%;
    }
    h5{
        text-align: center;
    }
    select{
      width:10rem;
      border-radius:7px;
      padding:0.5rem;
      margin-left:5%;

    }
      </style>
</head>
<body>
    <nav>
        <div class="logo"><img src="./img/logo_img.jpg" alt=""></div>
        <h2>Welcome In Mechanic On Duty [M.O.D.]!</h2>
    </nav>
        <form id="signform" method="post" >
        <div class="mb-3">
          <label for="UserName" class="form-label">Your Name</label>
          <input type="text" name="Uname" class="form-control" placeholder="John Doe" required>
        </div>
        <div class="mb-3">
          <label for="Userphone"  class="form-label">Your Phone No.</label>
          <input type="text" name="Uphone" class="form-control" placeholder="12XXXXXXXX"required>
        </div>
        <div class="mb-3">
          <label for="UserEmail"  class="form-label">Your Email Address</label>
          <input type="email" name="Uemail" class="form-control" placeholder="name@gmail.com" required>
        </div>
        <div class="mb-3">
          <label for="Password" class="form-label">Password</label>
          <input type="password" name="Upass" class="form-control"  required>
          <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <h5>Car Information</h5>
        <div class="mb-3">
            <label for="comapnyname" class="form-label">Car Company Name</label>
            <select name="compname" id="">
            <option value="Audi">Audi</option>
            <option value="BMW">BMW</option>
            <option value="Chevrolet">Chevrolet</option>
            <option value="Mahindra">Mahindra</option>
            <option value="TATA">TATA</option>
            <option value="Maruti Suzuki">Maruti Suzuki</option>
            <option value="Honda">Honda</option>
            <option value="Hundai">Hundai</option>
            <option value="Toyota">Toyota</option>
            <option value="Volkswagen">Volkswagen</option>
            <option value="Renault">Renault</option>
            <option value=">Kia">Kia</option>
            <option value="Ford India">Ford India</option>
            <option value="Force Motors">Force Motors</option>
          </select>
          </div>
          <div class="mb-3">
            <label for="modelname" class="form-label">Car Model Name</label>
            <input type="text" name="modelname" class="form-control"placeholder="BMW X1,TATA Safari"  required>
          </div>
          <div class="mb-3">
            <label for="rtono" class="form-label">Car R.T.O. No.</label>
            <input type="text" name="rtono" class="form-control" placeholder="MH-XX-FW-XXXX"  required>
          </div>
        <div class="mb-3 form-check">
          <input type="checkbox" class="form-check-input"  checked>
          <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <button type="submit" name="Signup" class="btn btn-primary">Submit</button>
      </form> 
      <?php 
      // taking input from user and saving in database
      $name=$phone=$email=$pass=$compname=$modelname=$rto=" ";
      if(isset($_POST['Signup'])){
        $name=test_input($_POST['Uname']);
        $phone=test_input($_POST['Uphone']);
        $email=test_input($_POST['Uemail']);
        $pass=test_input($_POST['Upass']);
        $compname=$_POST['compname'];
        $modelname=test_input($_POST['modelname']);
        $rto=test_input($_POST['rtono']);
        date_default_timezone_set('Asia/Kolkata');
        $date=date('d-m-Y');
        if(empty($name&&$phone&&$email&&$pass&&$compname&&$modelname&&$rto)){
            echo "<script>alert('Please Fill All Input Feild!');</script>";
        }
        else{
            try{  $query="INSERT INTO `user_tb` (`date`, `name`, `phone`, `email`, `password`, `carcompany`, `carmodelname`, `rtono`) VALUES ('$date', '$name', '$phone', '$email', '$pass', '$compname', '$modelname', '$rto')";
                $res=mysqli_query($con,$query);
              if($res){
                echo "<script>alert('record Saved Sucessfully!');
                window.location='index.php';</script>";
              }
              else{
                  echo "<script>alert('record Not Saved !');</script>";
                }
              }
              catch(Exception $e){
                echo "Message : ".$e->getMessage();
              }
        }
      }
      function test_input($data) {
        $data = stripslashes($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
      ?>

</body>
</html>