<?php 
include ("nav.php");
include( "../functions.php");
if(isset($_SESSION["id"])){
if(isset($_GET['update'])){
    $id=$_GET['update'];
    $sql="SELECT * FROM tbl_reservation WHERE id=$id";

    $res=mysqli_query($conn,$sql);
    $count=mysqli_num_rows($res);
    if($count>0){
        // get data
        $row= mysqli_fetch_assoc($res);
        $reservation_date=$row['reservation_date']; 
        $number_of_guests=$row['number_of_guests'];
        $order_date=$row['order_date'];
        $status=$row['status'];
        $customer_name=$row['customer_name'];
        $customer_contact=$row['customer_contact'];
        $customer_email=$row['customer_email'];

    }
    else{
        // redirect session with a message
        $_SESSION['no-cartegory-found']='<div class="alert alert-danger" role "alert"> No cartegory found </div>';
        header("location: ./manage_cartegory.php?error=NoCartegoryFound");
    }
}
?>
<div class="container">
    <h2 class="pt-5">Update Order</h2>
    <div class="row pt-5">
        <div class="col-md-2"></div>
        <div class="col-md-8">
        <form action="" name="" method="POST" enctype="multipart/form-data">
  <!-- 2 column grid layout with text inputs for the first and last names -->
  <div class="row mb-4">
    <div class="col">
        <label class="form-label" for="form3Example1">Number of Guests</label>
        <div class="form-outline">
          <input type="hidden" id="form3Example1" name="id" class="form-control" value="<?php echo $id?>" />
          <input type="text" id="form3Example1" name="numOfGuests" class="form-control" value="<?php echo $number_of_guests?>" /> <br>
          <label class="form-label" for="form3Example1">Reservation Date</label> <br>
          <input type="date" id="form3Example1" name="res" required min="new Date().toISOString().split('T')[0]" class="form-control" value="<?php echo $reservation_date?>" /> <br>
          <label class="form-label" for="form3Example1">Status</label> <br>
          <select name="status" id="">
            <option <?php if($status == "Reserved"){echo "selected";} ?> value="Reserved">Reserved</option>
            <option <?php if($status == "Vacant"){echo "selected";} ?> value="Vacant">Vacant</option>
            <option <?php if($status == "Canceled"){echo "selected";} ?> value="Canceled">Canceled</option>
          </select> <br>
          <label class="form-label" for="form3Example1">Customer Name</label> <br>
          <input type="text" id="form3Example1" name="customer_name" class="form-control" value="<?php echo $customer_name?>" /> <br>
          <label class="form-label" for="form3Example1">Customer Contact</label> <br>
          <input type="text" id="form3Example1" name="customer_contact" class="form-control" value="<?php echo $customer_contact?>" /><br>
          <label class="form-label" for="form3Example1">Customer Email</label> <br>
          <input type="text" id="form3Example1" name="customer_email" class="form-control" value="<?php echo $customer_email?>" />
      </div>

  <!-- Submit button -->
  <button type="submit" class="btn btn-primary btn-block mb-4" name="submit">Update</button>
  <!-- Register buttons -->
</form>
    </div>
        <div class="col-md-2"></div>
    </div>
</div>
<?php

if(isset($_POST['submit'])){
    $number_of_guests=$_POST['numOfGuests'];
    $id=$_POST['id'];
    $reservation_date=$_POST['res'];
    $customer_email=$_POST['customer_email'];
    $customer_contact=$_POST['customer_contact'];
    $customer_name=$_POST['customer_name'];
    $status=$_POST['status'];
    
    
    

    // print_r($_FILES['file']);
    // die();
    $sql2= "UPDATE tbl_reservation set number_of_guests='$number_of_guests' ,customer_email='$customer_email',customer_name='$customer_name' ,status='$status', reservation_date='$reservation_date' WHERE id='$id'";
    //execute querry to save to db
    $res2=mysqli_query($conn,$sql2);
    if($res){
        $_SESSION ['update']= '<div class="alert alert-success" role "alert"> successfully Updated </div>';
       
            // header("Location: ./manage_cartegory.php?error=successfull");
             echo'<script type="text/javascript">window.location.href="./reserveation.php?error=successfullyUpdated";</script>';
        
    }
    else{
        header("Location: ./manage_cartegory.php?error=error");
    }  
} 
}
include 'foot.php';
