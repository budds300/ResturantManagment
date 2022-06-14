<?php
include_once 'nav.php';
include_once '../functions.php';

//Get Id from selected admin

$id=$_GET['update'];

//Create ql query to get the details
$sql= "SELECT * FROM tbl_admin where id=$id";
// execute the query
$res= mysqli_query($conn,$sql);
if($res == true){
    $count = mysqli_num_rows($res);
    if($count ==1 ){    
        //Get details
        $row = mysqli_fetch_assoc($res);
        $fullname= $row['full_name'];
        $username = $row['username'];
        
    }
    else header('Location: /manage_admin.php ');
}

?>
<div class="container">
    <div class="row pt-5">
        <div class="col-md-2"></div>
        
        <div class="col-md-8">
      
        <form action="" name="" method="post">
  <!-- 2 column grid layout with text inputs for the first and last names -->
  <div class="row mb-4">
    <div class="col">
      <div class="form-outline">
        <input type="hidden" id="form3Example1" name="id" class="form-control" value="<?php echo $id?>" />
        <input type="text" id="form3Example1" name="full-names" class="form-control" value="<?php echo $fullname?>" />
        <label class="form-label" for="form3Example1">Fullname</label>
        
      </div>
    </div>
     </div>

  <!-- Email input -->
  <div class="form-outline mb-4">
    <input type="text" id="form3Example3" name="usernames" class="form-control"value="<?php echo $username?>" />
    <label class="form-label" for="form3Example3" >Username</label>
  </div>

  <!-- Submit button -->
  <button type="submit" class="btn btn-primary btn-block mb-4" name="signups">Add</button>

  <!-- Register buttons -->

</form>

        </div>
        <div class="col-md-2"></div>
    </div>
</div>

<?php
  if(isset($_POST['signups'])){
      $ID =$_POST['id'];
      $fullnames=$_POST["full-names"];
      $usernames=$_POST['usernames'];
      UpdateAdmin($conn,$ID,$fullnames,$usernames);
}

include 'foot.php';