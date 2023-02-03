<?php 
require("connection.php");
    session_start();
    if(!isset($_SESSION['Aname'])){
    header("location: adminlogin.php");
    }
?>
<!-- /* Code By SUDHIR */ -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>M.O.D._Bill</title>
    <link rel="apple-touch-icon" sizes="180x180" href="./img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./img/favicon/favicon-16x16.png">
    <link rel="manifest" href="./img/favicon/site.webmanifest">
    <link rel="mask-icon" href="./img/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="./Css/bill.css">
    <link rel="stylesheet" href="./Css/index.css">
</head>
<body>
<div class="loader">

</div>
<nav>
    <div class="logo"><img src="./img/logo_img.jpg" alt=""></div>
    <h2>Welcome <?php echo strtoupper($_SESSION['Aname']);?></h2>
</nav>
<!-- <button id="back"> -->
    <a id="back" href="adminpanel.php">Back</a>
<!-- </button> -->

<form method="post" class="billform">
    <input class="form-control" type="email"  name="umail" placeholder="Enter Custmor Mail" required>
    <button class="btn btn-outline-primary" type="submit" name="bill">Generate Bill</button>
 </form>

 <?php
 if(isset($_POST['bill'])){
     $mail=$_POST['umail'];
     $_SESSION['urmail']=$mail;
     $billquery="SELECT * FROM `session_tb` WHERE `email`='$mail'";
     $run_billquery=mysqli_query($con,$billquery);
     // if(mysqli_num_rows($run_billquery)==1){
         $row=mysqli_fetch_assoc($run_billquery);
         if($row){
             $Uname=$row['name'];
             $ser1=$row['car_wash'];
             $ser2=$row['car_battery'];
             $ser3=$row['car_engine'];
             $ser4=$row['car_wheel'];
             $ser5=$row['fullrepair'];
             $ser6=$row['windsheild'];
             $amt=$row['total_amt'];
             $deltime=$row['delivery_time'];
            }
            // fetching date,bill no & Car Rto Number from database
        $dquery="SELECT * FROM `user_tb` WHERE `email` ='$mail'";
        $run_query3=mysqli_query($con,$dquery);
        if(mysqli_num_rows($run_query3)>0){
            
            if($col=mysqli_fetch_assoc($run_query3)){
                $billno=$col['billno'];
                $date=$col['date'];
                $rtono=$col['rtono'];
            }
    
        }
        }
        //  }
        ?>
<form  method="post" class="billform">
    <input class="form-control" name="box" type="text" placeholder="Delete By Name" required>
    <button class="btn btn-outline-primary" name="delete" type="submit">Delete</button>
</form>
<?php
if(isset($_POST['delete'])){
$box=$_POST['box'];
$dlquery="DELETE FROM `session_tb` WHERE `name`='$box'";
    $dlrst=mysqli_query($con,$dlquery);}
    // header("location: bill.php");
    ?>
<?php $squery="SELECT * FROM `session_tb`";
    $run_squery=mysqli_query($con,$squery);
    if(mysqli_num_rows($run_squery)>0){

    }
    else{
        $msg="No Record Found!";
    }
    ?>
<div class="loggeduser">
    <h3 id="head">Requested Bills Are</h3>
    <table border='1' id='logusertb'>
    <tr>
        <th>Name</th>
        <th>Mail Address</th>
        <th>Total Amount</th>
        <th>Delivery Time</th>
    </tr>
    <tr>
        <?php while($row2=mysqli_fetch_assoc($run_squery)){?>
        <td><?php echo $row2['name'];?></td>
        <td><?php echo $row2['email'];?></td>
        <td><?php echo $row2['total_amt'];?></td>
        <td><?php echo $row2['delivery_time'];?>Hrs</td>
    </tr>
    <?php } ?>
        </table>
</div>
<div class="bill">
    <!-- Generating Bill -->
        <h1 class="ink">Mechanic On Duty!</h1>
        <h4 class="wavy">Your Bill</h4>
        <table border="1" id="billtb">
            <tr>  <th>Car R.T.O. NO. :- <?php if(isset($rtono)){echo $rtono;}else{echo "R.T.O. No";}?></th>
                <th colspan="2" id="billno">Bill No.:- <?php if(isset($billno)){echo $billno;}else{echo "Bill";}?></th>
            </tr>
            <tr>
                <td colspan="2"><h4><?php if(isset($Uname)){echo $Uname;}else{ echo "User Name";} ?></h4></td>
                <td><h6>Date:- <?php if(isset($date)){echo $date;}else{echo "date";}?></h6></td>
            </tr>
            <tr>
                <th>Service Name</th>
                <th>Service Cost</th>
                <th>Delivery Time</th>
            </tr>
            <tr>
                <td>Car Wash</td>
                <td><?php if(isset($ser1)){echo $ser1;}else{ echo "0";} ?> &#8377;</td>
                <th rowspan="7">
                <?php if(isset($deltime)){echo $deltime;}else{ echo "Delivery Time";}?> Hrs</th>
            </tr>
            <tr>
                <td>Battery Problems</td>
                <td><?php if(isset($ser2)){echo $ser2;}else{ echo "0";} ?>&#8377;</td>
            </tr>
            <tr>
                <td>Engine Problems</td>
                <td><?php if(isset($ser3)){echo $ser3;}else{ echo "0";} ?>&#8377;</td>
            </tr>
            <tr>
                <td>Wheel Replace</td>
                <td><?php if(isset($ser4)){echo $ser4;}else{ echo "0";} ?>&#8377;</td>
            </tr>
            <tr>
                <td>Car Reparing & Servicing</td>
                <td><?php if(isset($ser5)){echo $ser5;}else{ echo "0";} ?>&#8377;</td>
            </tr>
            <tr>
                <td>Windsheild Replace</td>
                <td><?php if(isset($ser6)){echo $ser6;}else{ echo "0";} ?>&#8377;</td>
            </tr>
            <tr>
                <th>Total Amount</th>
                <th><?php if(isset($amt)){echo $amt;}else{ echo "0";} ?>&#8377;</th>
            </tr>
    </table>
        <button class="btn btn-primary" onclick="window.print()">Print</button>
</div>
<!-- footer -->
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
      <h5 id="copyrg">&copy; Are Reserved 2023 Mechanic On Duty</h5
    </footer>
<script>
    var loader=document.querySelector(".loader");
    window.addEventListener("load",()=>{
    loader.style.display="none";
  });
  generateBill=()=>{
    let bill=document.getElementById("bill");
    bill.classList.add("visible");
    }
  closeBill=()=>{
    document.getElementById("bill").classList.remove("visible");
    }
  </script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</body>
</html>