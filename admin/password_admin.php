<?php   
include_once 'nav.php';
include '../database/db.php';
include_once '../functions.php';

if(isset($_SESSION["update"])){
  echo $_SESSION["update"];
  unset($_SESSION['update']);
}
if(isset($_SESSION["failed"])){
  echo $_SESSION["failed"];
  unset($_SESSION['failed']);
}

echo '<div class="container">';
?>

        <div class="row pt-5">
            <div class="col-md-2"></div>
            
            <div class="col-md-8">
        
    <form action="" name="" method="post">
  <!-- 2 column grid layout with text inputs for the first and last names -->
  <div class="row mb-4">
    <div class="col">
      <div class="form-outline">
        <label class="form-label" for="form3Example1">Old Password</label> <br>
        <input type="password" id="form3Example1" name="old-pass" class="form-control" />
      </div>
    </div>
     </div>

  <!-- Password input -->
  <div class="form-outline mb-4">
    <label class="form-label" for="form3Example3" >New Password</label> <br>
    <input type="password" id="form3Example3" name="new-pass" class="form-control" />
  </div>
  <!-- password input -->
  <div class="form-outline mb-4">
    <label class="form-label" for="form3Example3" >Confirm Password</label> <br>
    <input type="password" id="form3Example3" name="confirm-pass" class="form-control" />
  </div>

  <!-- Submit button -->
  <button type="submit" class="btn btn-primary btn-block mb-4" name="change-pass">Update Password</button>

  <!-- Register buttons -->

</form>

        </div>
        <div class="col-md-2"></div>
    </div>
</div>
<?php
if(isset($_SESSION['id'])){


if(isset($_POST['change-pass'])){
    //Get data from form
    // if($_GET['id'] != "") {
    $ID= $_SESSION['id'];
    $current_password=$_POST['old-pass'];
    $new_password=($_POST['new-pass']);
    $confirm_pass=($_POST['confirm-pass']);
    
    //check if userr with current id exists
    
    if(emptyInputSignAdminUp($current_password,$new_password,$confirm_pass) !== false){
      $_SESSION['failed']= '<div class="alert alert-danger" role "alert"> Fill in all fields </div>';
        header("location: ./password_admin.php?error=emptyinput");
        exit();
    }
    else if ($new_password === $confirm_pass){
        changeAdminPass($conn,$ID,$current_password,$new_password);
        
        }
        else header("Location: ./password_admin.php?error=passwordDosent");
    }
    }

        
// check weather button is clicked

    include 'foot.php';
