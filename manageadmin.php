<?php
require('connection.php');?>
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
    <title>Manage_Admin</title>
    <link rel="apple-touch-icon" sizes="180x180" href="./img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./img/favicon/favicon-16x16.png">
    <link rel="manifest" href="./img/favicon/site.webmanifest">
    <link rel="mask-icon" href="./img/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="./Css/adminpanel.css">
    <link rel="stylesheet" href="./Css/manageadmin.css">
</head>
<body>
<div class="loader"></div>
    <nav>
        <div class="logo"><img src="./img/logo_img.jpg" alt=""></div>
        <a href="./adminpanel.php">Admin Panel</a>
    </nav>
    <h1>Manage Admin</h1>
    <div class="display">
        <img src="./img/admin_img.jpg" alt="">
    </div>
    <div class="btn-box">
        <button class="btn btn-outline-primary" onclick="openCreateAdmin()">Create Admin</button>
        <button class="btn btn-outline-primary" onclick="openUpdateAdmin()">Update Admin</button>
    </div>
     <!-- Creating  Admin Form  -->
    <div class="createadmin">
        <img src="./img/logo_img.jpg" alt="" id="logimg">
        <span id="cros">&cross;</span>
        <form method="post" class="adminform">
        <div class="mb-3">
          <label for="Admin Name" class="form-label">Admin Name</label>
          <input type="text" class="form-control" name="Aname" placeholder="Admin Name" required>
        </div>
        <div class="mb-3">
            <label for="Admin Mail" class="form-label">Admin Email </label>
            <input type="email" class="form-control" name="Amail" placeholder="admin@gmail.com" required>
          </div>
        <div class="mb-3">
          <label for="Password" class="form-label">Password</label>
          <input type="password" name="Apass" class="form-control"  required>
        </div>
        <div class="mb-3">
            <label for="Admin Phone" class="form-label">Admin Phone </label>
            <input type="text" class="form-control" name="Aphone" placeholder="9123XXXXXX" required>
          </div>
        <button type="submit" name="createadmin" class="btn btn-primary ">Submit</button>
      </form>
    </div>

     <!-- Creating admin And Storing In Database -->
     <?php
        if(isset($_POST['createadmin'])){
          $Aname=$_POST['Aname'];
          $Amail=$_POST['Amail'];
          $Apass=$_POST['Apass'];
          $Aphone=$_POST['Aphone'];
          $query2="INSERT INTO `admin_tb` (`adminname`,`adminmail`,`adminpassword`,`adminphone`) VALUES('$Aname','$Amail','$Apass','$Aphone')";
          $run_query2=mysqli_query($con,$query2);
           if($run_query2){
            echo "<script>alert('Admin Added Successfully!');
            window.location='manageadmin.php';</script>";
           }
           else{
            echo "<script>alert('Admin Not Added!');</script>";
           }
        } ?>
          <!-- Update Admin Form -->
    <div class="updateadmin">
        <img src="./img/logo_img.jpg" alt="" id="logimg">
        <span id="cros1">&cross;</span>
        <form method="post" class="adminform">
            <h4>Update Admin</h4>
        <div class="mb-3">
          <label for="Admin Id" class="form-label">Admin Id</label>
          <input type="number" class="form-control" name="Aid" placeholder="Enter Admin Id" required>
        </div>
        <div class="mb-3">
            <label for="Admin Name" class="form-label">Admin Name</label>
            <input type="text" class="form-control" name="Uaname" placeholder="Admin Name" required>
          </div>
        <div class="mb-3">
            <label for="Admin Mail" class="form-label">Admin Email </label>
            <input type="email" class="form-control" name="Uamail" placeholder="admin@gmail.com" required>
          </div>
        <div class="mb-3">
          <label for="Password" class="form-label">Password</label>
          <input type="password" name="Uapass" class="form-control"  required>
        </div>
        <div class="mb-3">
            <label for="Admin Phone" class="form-label">Admin Phone </label>
            <input type="text" class="form-control" name="Uaphone" placeholder="9123XXXXXX" required>
          </div>
        <button type="submit" name="updateadmin" class="btn btn-primary ">Submit</button>
      </form>
    </div>

     <!-- Upadating Admin Details -->
        <?php
        if(isset($_POST['updateadmin'])){
          $Aid=$_POST['Aid'];
          $uaname=$_POST['Uaname'];
          $uamail=$_POST['Uamail'];
          $uapass=$_POST['Uapass'];
          $uaphone=$_POST['Uaphone'];

          $updatequery="UPDATE `admin_tb` SET `adminname` = '$uaname', `adminmail` = '$uamail', `adminpassword` = '$uapass', `adminphone` = '$uaphone' WHERE `admin_tb`.`adminid` ='$Aid'";

          $run_updatequery=mysqli_query($con,$updatequery);
          if($run_updatequery){
            echo "<script>alert('Succesfully Updated Admin Details!'); window.location='manageadmin.php';</script>";
          }
          else{
            echo "<script>alert('Admin Not Updated!');</script>";
          }
        }
        ?>
    <div class="oparation">
        <form  method="post" class="d-flex">
            <input class="form-control me-2" name="id" type="number" placeholder="Search Or Delete Admin By Admin Id No.">
            <button class="btn btn-outline-primary" name="search" type="submit">Search</button>
            <button class="btn btn-outline-primary" name="delete" type="submit">Delete</button>
        </form>
    </div>
        <!-- Search Or Delete Admin By Id  -->
        <?php
        if(isset($_POST['search'])){
          $id=$_POST['id'];
          $srchquery="SELECT * FROM `admin_tb` Where `adminid`='$id'";

          $run_srchquery=mysqli_query($con,$srchquery);
          if(mysqli_num_rows($run_srchquery)==1){
            echo "Founded Record"."<br>";
            $foundrow=mysqli_fetch_assoc($run_srchquery);
            echo $foundrow['adminid']."-";
            echo $foundrow['adminname']."-";
            echo $foundrow['adminmail']."-";
            echo $foundrow['adminphone'];
          }
        }
        elseif(isset($_POST['delete'])){
          $id=$_POST['id'];

          $delquery="DELETE FROM `admin_tb` Where `adminid`='$id'";
          $run_delquery=mysqli_query($con,$delquery);
          if($run_delquery){
            echo "Admin Deleted Succefully!";
          }
        }
        else{
          echo "Here You See Actions !";
        }
        ?>

    <!-- Displaying Admin Details From Database  -->
    <?php
  $query="SELECT * FROM `admin_tb`";
  $run_query=mysqli_query($con,$query);
  if(mysqli_num_rows($run_query)>0){

  }
  else{
    echo "No Records Of Admin In Database!";
  }
    
    ?>
    <div class="admintable">
    <table border='1'>
    <tr>
        <th>Admin Id</th>
        <th>Admin Name</th>
        <th>Admin Email</th>
        <th>Admin Phone</th>
    </tr>
    <tr>
        <?php while($row=mysqli_fetch_assoc($run_query)){?>
        <td><?php echo $row['adminid'];?></td>
        <td><?php echo $row['adminname'];?></td>
        <td><?php echo $row['adminmail'];?></td>
        <td><?php echo $row['adminphone'];?></td>
    </tr>
    <?php }?>
    </table>
</div>

<script src="./Js/manageadmin.js">
</script>
</body>
</html>