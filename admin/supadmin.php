<?php

    include 'navigation.php';

    if(isset($_SESSION["successfull"])){
        echo $_SESSION["successfull"];
        unset($_SESSION['successfull']);
    }
    if(isset($_SESSION["update"])){
        echo $_SESSION["update"];
        unset($_SESSION['update']);
      }         

    if(isset($_SESSION["id"])){
        $id=$_SESSION["id"];
        $sql ="select * from tbl_cartegory";
        $res=mysqli_query($conn,$sql);
        $count=mysqli_num_rows($res);
        $sql1 ="select * from tbl_food";
        $res1=mysqli_query($conn,$sql1);
        $count1=mysqli_num_rows($res1);
        $sql2 ="select * from tbl_order";
        $res2=mysqli_query($conn,$sql2);
        $count2=mysqli_num_rows($res2);
        $sql3 ="select * from tbl_admin";
        $res3=mysqli_query($conn,$sql2);
        $count3=mysqli_num_rows($res2);

?>
<style>
* {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}
.alert-success{
    background-color: rgb(160, 214, 160);
    color: rgb(25, 89, 25);
    border-radius: 2px solid rgb(102, 181, 102);
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    padding: 10px;
    text-align: center;
}
 .alert-danger{
    background-color: rgb(215, 160, 160);
    color: rgb(126, 39, 39);
    border-radius: 2px solid rgb(165, 64, 64);
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    padding: 10px;
    text-align: center;
}

/* Float four columns side by side */
.column {
  float: left;
  width: 25%;
  padding: 0 11px;
}

/* Remove extra left and right margins, due to padding */
.row {margin: 0 -10px;}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive columns */
@media screen and (max-width: 600px) {
  .column {
    width: 100%;
    display: block;
    margin-bottom: 20px;
  }
}

/* Style the counter cards */
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  padding: 30px;
  text-align: center;
  background-color: #f1f1f1;
}
</style>
<div class="container">

<div class="row" style="padding-top: 50px;">
  <div class="column">
    <div class="card">
      <h3>Category</h3>
      <h4 style="padding-top: 15px;"><?php echo $count?></h4>
      
    </div>
  </div>

  <div class="column">
    <div class="card">
    <h3>Food</h3>
      <h4 style="padding-top: 15px;"><?php echo $count1?></h4>
    </div>
  </div>
  
  <div class="column">
    <div class="card">
    <h3>Orders</h3>
      <h4 style="padding-top: 15px;"><?php echo $count2?></h4>
    </div>
  </div>
  <div class="column">
    <div class="card">
    <h3>Managers</h3>
      <h4 style="padding-top: 15px;"><?php echo $count3?></h4>
    </div>
  </div>
  
 

    </div>

        




<?php
}
else echo'<div class="container">
<h1 class""> You are Logged out</h1>
</div>';
require 'foot.php';
?>