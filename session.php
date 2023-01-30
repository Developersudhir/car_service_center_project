<?php
require("connection.php");
// if(!isset($_SESSION['umail'])){
//     header("location: index.php");
// }
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>M.O.D._ThankYou</title>
    <link rel="apple-touch-icon" sizes="180x180" href="./img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./img/favicon/favicon-16x16.png">
    <link rel="manifest" href="./img/favicon/site.webmanifest">
    <link rel="mask-icon" href="./img/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="./Css/session.css">
</head>
<body>
<?php 
// checking and Setting input's value from user

if(isset($_SESSION['umail'])){


    try{
        if(isset($_POST['sersubmit'])){
            $amt=0;
            $dltime=0;
            if(isset($_REQUEST['ser1'])){
                $amt=$amt+$_REQUEST['ser1'];
                $dltime=$dltime+1.00;
                $wash="300";
                }
            if(isset($_REQUEST['ser2'])){
                $amt=$amt+$_REQUEST['ser2'];
                $dltime=$dltime+1.30;
                $battery="2000";
                }
            if(isset($_REQUEST['ser3'])){
                $amt=$amt+$_REQUEST['ser3'];
                $dltime=$dltime+1.00;
                $engine="4000";
                }
            if(isset($_REQUEST['ser4'])){
                $amt=$amt+$_REQUEST['ser4'];
                $dltime=$dltime+0.30;
                $wheel="2000";
                }
            if(isset($_REQUEST['ser5'])){
                $amt=$amt+$_REQUEST['ser5'];
                $dltime=$dltime+3.00;
                $fullrepair="8000";
                }
            if(isset($_REQUEST['ser6'])){
                $amt=$amt+$_REQUEST['ser6'];
                $dltime=$dltime+3.30;
                $windsheild="5000";
                }
        if($amt==0){
                echo "<script>alert('Please Select Least One Service!');</script>";
        }
        }
        date_default_timezone_set('Asia/Kolkata');
            $date=date('d-m-Y g:i a');
            $_SESSION['date']=$date;
        $_SESSION['id']=rand(0,10000);

        // if input is not set for storing in datbase we assign that 0
        if(!isset($wash)){
            $wash=0;
            }
        if(!isset($battery)){
            $battery=0;
            }
        if(!isset($engine)){
            $engine=0;   
            }
        if(!isset($wheel)){
            $wheel=0;
            }
        if(!isset($fullrepair)){
            $fullrepair=0;
            }
        if(!isset($windsheild)){
            $windsheild=0;
            }
        if(!isset($amt)){
            $amt=0;
            }
        if(!isset($dltime)){
            $dltime=0;
            }
            $sessid=$_SESSION['id'];
            $sessname=$_SESSION['uname'];
            $sessmail=$_SESSION['umail'];
            // storing session and user activity In Database
        $sessionquery="INSERT INTO `session_tb` (`session_id`, `name`, `email`, `car_wash`, `car_battery`, `car_engine`, `car_wheel`, `fullrepair`,`windsheild`, `total_amt`,`delivery_time`) VALUES ('$sessid', '$sessname', '$sessmail', '$wash', '$battery', '$engine', '$wheel', '$fullrepair','$windsheild','$amt','$dltime')";

        $run_sessionquery=(mysqli_query($con,$sessionquery));
        if($run_sessionquery==true){
            session_unset();
            session_destroy();
            echo ("<div class='alert alert-success' role='alert'>
            <img src='./img/write_tick_img.webp' alt='logo' id='tick'>
            <h4 class='alert-heading'>Thank You!</h4>
            <p>Have Good Day! You Can Get Your Bill From Garage</p>
          </div>");
        //   <img src="../img/logo_img.jpg" alt="">
        }
            else{
                echo "Session Not Destroyed!";
            }
        }
    catch(Exception $e){
        echo "message:".$e->getMessage();
    }
}
else{
    header("location:index.php");
}
?>
</body>
</html>
