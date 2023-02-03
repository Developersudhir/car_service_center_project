<?php require('connection.php');?>
<!-- /* Code By SUDHIR */ -->
<?php
    session_start();
    if(!isset($_SESSION['Aname']))
{
    header("location: adminlogin.php");
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>M.O.D._Adminpanel</title>
    <link rel="apple-touch-icon" sizes="180x180" href="./img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./img/favicon/favicon-16x16.png">
    <link rel="manifest" href="./img/favicon/site.webmanifest">
    <link rel="mask-icon" href="./img/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="./Css/adminpanel.css">
</head>
<body>
<div class="loader"></div>
<nav>
    <div class="logo"><img src="./img/logo_img.jpg" alt=""></div>
    <a href="./manageadmin.php">Manage Admin</a>
    <h2>Welcome <?php echo strtoupper($_SESSION['Aname']);?></h2>
</nav>
<div class="main">
<div class="card">
    <div class="card-body">
      <h5 class="card-title">Welcome <?php echo $_SESSION['Aname']?></h5>
      <h6 class="card-text"><?php echo $_SESSION['Amail']?></h6>
      <h6 class="card-text"><?php echo $_SESSION['Aphone']?></h6>
      <form method="post"><Button class="btn btn-primary" name="logt">Log Out</Button></form>
</div>
<?php
    if(isset($_POST['logt'])){
        session_unset();
        session_destroy();
        header("location: adminlogin.php");
    }
    ?>
</div>
<a href="bill.php" id="genbill"><img src="./img/pay_img.gif" alt="Bills" id="bills">Generate Bill</a>
<div class="oparation">
<form  method="post" class="d-flex">
    <input class="form-control me-2" name="box" type="number" placeholder="Search Or Delete By Bill No.">
    <button class="btn btn-outline-primary" name="search">Search</button>
    <button class="btn btn-outline-primary" name="delete" type="submit">Delete</button>
</form>
</div>
<!-- Performing Operations On Database By Bill No. -->
<?php 
    
    if(isset($_POST['box']))
    {
        $box=$_POST['box'];
    }




 if(isset($_POST['search'])){
    $srchqury="SELECT * FROM `user_tb` WHERE billno='$box'";
    $rst=mysqli_query($con,$srchqury);
    if(mysqli_num_rows($rst)==1){
        echo "Founded Record"."<br>";
        $foundrow=mysqli_fetch_assoc($rst);
        foreach($foundrow as $fd){
            echo $fd." - ";
        }
    }
    else{
        echo "No Record Found";
    }
    
}
elseif(isset($_POST['delete'])){
    $dlquery="DELETE FROM `user_tb` WHERE billno='$box'";
    $dlrst=mysqli_query($con,$dlquery);
    header("location: adminpanel.php");
}
else{
    echo "Here You See Actions";
 }
?>
<!-- printing User Info from databse  -->
<h3>Custmer's List </h3>
<?php $squery="SELECT * FROM `user_tb`";
    $run_squery=mysqli_query($con,$squery);
    if(mysqli_num_rows($run_squery)>0){
       // echo "Sudhir";
    }
    else{
        $msg="No Record Found!";
    }
    ?>
<div class="usertable">
    <table border='1'>
    <tr>
        <th>Bill No.</th>
        <th>Date</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Car Company Name</th>
        <th>Model Name</th>
        <th>R.T.O. Number</th>
    </tr>
    <tr>
        <?php while($row=mysqli_fetch_assoc($run_squery)){?>
        <td><?php echo $row['billno'];?></td>
        <td><?php echo $row['date'];?></td>
        <td><?php echo $row['name'];?></td>
        <td><?php echo $row['email'];?></td>
        <td><?php echo $row['phone'];?></td>
        <td><?php echo $row['carcompany'];?></td>
        <td><?php echo $row['carmodelname'];?></td>
        <td><?php echo $row['rtono'];?></td>
    </tr>
    <?php }?>
    </table>
</div>
<?php 
    // Destroying Session On Log Out
    if(isset($_POST['logout'])){
        session_destroy();
        header("location: adminlogin.php");}?>
<script>
    var loader=document.querySelector(".loader");
    window.addEventListener("load",()=>{
    loader.style.display="none";
  });
</script>
</body>
</html>
