<?php 
include ("nav.php");
include( "../functions.php");
if(isset($_SESSION["id"])){
if(isset($_GET['update'])){
    $id=$_GET['update'];
    $sql="SELECT * FROM tbl_order WHERE id=$id";

    $res=mysqli_query($conn,$sql);
    $count=mysqli_num_rows($res);
    if($count>0){
        // get data
        $row= mysqli_fetch_assoc($res);
        $food=$row['food']; 
        $price=$row['price'];
        $quantity=$row['quantity'];
        $order_date=$row['order_date'];
        $total=$row['total'];
        $status=$row['status'];
        $customer_name=$row['customer_name'];
        $customer_contact=$row['customer_contact'];
        $customer_address=$row['customer_address'];
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
        <label class="form-label" for="form3Example1">Title</label>
        <div class="form-outline">
          <input type="hidden" id="form3Example1" name="id" class="form-control" value="<?php echo $id?>" />
          <input type="text" id="form3Example1" name="food" class="form-control" value="<?php echo $food?>" />
          <input type="hidden" id="form3Example1" name="price" class="form-control" value="<?php echo $price?>" />
          <input type="number" id="form3Example1" name="quantity" class="form-control" value="<?php echo $quantity?>" />
          <select name="status" id="">
            <option <?php if($status == "Ordered"){echo "selected";} ?> value="Ordered">Ordered</option>
            <option <?php if($status == "On Delivery"){echo "selected";} ?> value="On Delivery">On Delivery</option>
            <option <?php if($status == "Delivered"){echo "selected";} ?> value="Delivered">Delivered</option>
            <option <?php if($status == "Canceled"){echo "selected";} ?> value="Canceled">Canceled</option>
          </select>
          <input type="text" id="form3Example1" name="customer_name" class="form-control" value="<?php echo $customer_name?>" />
          <input type="text" id="form3Example1" name="customer_address" class="form-control" value="<?php echo $customer_address?>" />
          <input type="text" id="form3Example1" name="customer_contact" class="form-control" value="<?php echo $customer_contact?>" />
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
    $food=$_POST['food'];
    $id=$_POST['id'];
    $price=$_POST['price'];
    $customer_email=$_POST['customer_email'];
    $customer_contact=$_POST['customer_contact'];
    $customer_address=$_POST['customer_address'];
    $customer_name=$_POST['customer_name'];
    $status=$_POST['status'];
    $quantity=$_POST['quantity'];
    $totalP=$price*$quantity;
    
    

    // print_r($_FILES['file']);
    // die();
    $sql2= "UPDATE tbl_order set food='$food',quantity='$quantity',total='$totalP' ,customer_email='$customer_email',customer_name='$customer_name',customer_address='$customer_address' ,status='$status' WHERE id='$id'";
    //execute querry to save to db
    $res2=mysqli_query($conn,$sql2);
    if($res){
        $_SESSION ['update']= '<div class="alert alert-success" role "alert"> successfully Updated </div>';
       
            // header("Location: ./manage_cartegory.php?error=successfull");
             echo'<script type="text/javascript">window.location.href="./manage_order.php?error=successfullyUpdated";</script>';
        
    }
    else{
        header("Location: ./manage_cartegory.php?error=error");
    }  
} 
}
include 'foot.php';
