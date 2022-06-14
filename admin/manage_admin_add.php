<?php
require 'nav.php';
include_once '../functions.php';
?>
<div class="container">
    <div class="row pt-5">
        <div class="col-md-2"></div>
        
        <div class="col-md-8">
      
        <form action="" name="reg" method="post">
  <!-- 2 column grid layout with text inputs for the first and last names -->
  <div class="row mb-4">
    <div class="col">
      <div class="form-outline">
        <label class="form-label" for="form3Example1">Fullname</label> <br>
        <input type="text" id="form3Example1" name="full-name" class="form-control" />
      </div>
    </div>
     </div>

  <!-- Email input -->
  <div class="form-outline mb-4">
    <label class="form-label" for="form3Example3" >Username</label> <br>
    <input type="text" id="form3Example3" name="username" class="form-control" />
  </div>

  <!-- Password input -->
  <div class="form-outline mb-4">
    <label class="form-label" for="form3Example4" >Password</label> <br>
    <input type="password" id="form3Example4" name="password" class="form-control" />
  </div>

  <!-- Submit button -->
  <button type="submit" class="btn btn-primary btn-block mb-4" name="signup">Add</button>

  <!-- Register buttons -->

</form>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>



<?php
if(isset($_POST['signup'])){
    $fullname=$_POST['full-name'];
    $username=$_POST['username'];
    $password=$_POST['password'];

    if(emptyInputSignAdminUp($fullname,$username,$password) !== false){
      header("location: ./manage_admin_add.php?error=emptyinput");
      exit();
  }
  if( invaldUid($username) !== false){
      header("location: ./manage_admin_add.php?error=invaliduid");
      exit();
  }
  
  
  if(uidExistAdmin($conn,$username,) !== false){
      header("location: ./manage_admin_add.php?error=usernameistaken");
      exit();
  }
  createUseradmin($conn,$firstname,$username,$password);
}




include 'foot.php';
?>