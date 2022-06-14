<?php 
include ("nav.php");
include( "../functions.php");
if(isset($_SESSION["id"])){
if(isset($_GET['update'])){
    $id=$_GET['update'];
    $sql="SELECT * FROM tbl_cartegory WHERE id=$id";

    $res=mysqli_query($conn,$sql);
    $count=mysqli_num_rows($res);
    if($count>0){
        // get data
        $row= mysqli_fetch_assoc($res);
        $title=$row['title'];
        $current_image=$row['image_name'];
        $featured=$row['featured'];
        $active=$row['active'];
    }
    else{
        // redirect session with a message
        $_SESSION['no-cartegory-found']='<div class="alert alert-danger" role "alert"> No cartegory found </div>';
        header("location: ./manage_cartegory.php?error=NoCartegoryFound");
    }
}
?>
<div class="container">
    <h2 class="pt-5">Update Cartegory</h2>
    <div class="row pt-5">
        <div class="col-md-2"></div>
        <div class="col-md-8">
        <form action="" name="" method="POST" enctype="multipart/form-data">
  <!-- 2 column grid layout with text inputs for the first and last names -->
  <div class="row mb-4">
    <div class="col">
        <label class="form-label" for="form3Example1">Title</label>
        <div class="form-outline">
          <input type="hidden" id="form3Example1" name="current_image" class="form-control" value="<?php echo $current_image?>" />
          <input type="hidden" id="form3Example1" name="id" class="form-control" value="<?php echo $id?>" />
          <input type="text" id="form3Example1" name="title" class="form-control" value="<?php echo $title?>" />
      </div>
      <label class="form-label" for="form3Example1">Current file</label>
      <div class="form-outline">
        <?php 
        if ($current_image != ""){
            // display image
            ?>
            <img src="../images/cartegory/<?php echo $current_image?>" alt="" srcset="" width="100px">
            <?php
        }
        else {
            echo '<div class="">Image not available</div>';
        }
        ?>
      </div>
      <label class="form-label" for="form3Example1">Select file</label>
      <div class="form-outline">
          <input type="file" id="form3Example1" name="image" class="form-control" value="" />
      </div>
    </div>
     </div>
  <div class="form-check form-check-inline">
      <label for="">Featured:</label> <br> <br>
  <input <?php if($featured == "Yes"){echo "checked";}?> class="form-check-input ms-1" type="radio" name="featured" id="inlineRadio1" value="Yes" />
  <label class="form-check-label" for="inlineRadio1">Yes</label>
</div>
<div class="form-check form-check-inline">
  <input <?php if($featured == "No"){echo "checked";}?> class="form-check-input" type="radio" name="featured" id="inlineRadio2" value="No" />
  <label class="form-check-label" for="inlineRadio2">No</label>
</div> 
  <div class="form-check form-check-inline ms-5">
      <label for="">Active:</label><br><br>
  <input <?php if($active == "Yes"){echo "checked";}?> class="form-check-input ms-1" type="radio" name="active" id="inlineRadio3" value="Yes" />
  <label class="form-check-label" for="inlineRadio3">Yes</label>
</div>
<div class="form-check form-check-inline">
  <input <?php if($active == "No"){echo "checked";}?> class="form-check-input" type="radio" name="active" id="inlineRadio4" value="No" />
  <label class="form-check-label" for="inlineRadio4">No</label>
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
    $title=$_POST['title'];
    $id=$_POST['id'];
    $current_image=$_POST['current_image'];
    $featured=$_POST['featured'];
    $active=$_POST['active'];
    
    // checks if button is clicked
    if(isset($_POST['featured'])){
        // get value from form
        $featured=$_POST['featured'];
    } 
    else $featured='No';
        if(isset($_POST['active'])){
        // get value from form
        $active=$_POST['active'];
    }
     else $active='No';
//    check if image is selected or not. 
if(isset($_FILES['image']['name'])){
    // upload Image
    // To upload one needs image name,source path and destionation path
    $image_name=$_FILES['image']['name'];
    if($image_name != ""){
        // image availavble
        // upload new image and delete the old image
        
        // auto renaming images       
        // Get the extension of our image(jpg,png,gif,etc)e.g. "special foods.png
         $temp = explode('.',$image_name);
         $ext= end($temp);
        // rename the image
        $image_name="Food_Cartegory".rand(000,999).'.'.$ext;
        $source_path=$_FILES['image']['tmp_name'];
        $destination_path="../images/cartegory/".$image_name;
        $upload =move_uploaded_file($source_path,$destination_path);
        // check if uploaded image or not
        if($upload == false){
            $_SESSION['upload']= 'Failed to upload image';
            header("location: ./manage_cartegory.php?error=FailedTOUpload");
            die(); 
        }
        // if current image is available

        if($current_image !=""){
            $remove_path="../images/cartegory/".$current_image;
            $remove=unlink($remove_path);
            if($remove == false){
                $_SESSION['failed-remove']= '<div class="alert alert-danger" role "alert"> Failed to Remove </div>';
                header("location: ./manage_cartegory.php?error=FailedDelete");
                die();
        }
        }
    }
    else{
        $image_name = $current_image;
    }
}
else{ $image_name="";}
    // print_r($_FILES['file']);
    // die();
    $sql2= "UPDATE tbl_cartegory set title='$title' ,featured='$featured',image_name='$image_name',active='$active' WHERE id='$id'";
    //execute querry to save to db
    $res2=mysqli_query($conn,$sql2);
    if($res){
        $_SESSION ['add']= '<div class="alert alert-success" role "alert"> successfully Added </div>';
       
            // header("Location: ./manage_cartegory.php?error=successfull");
             echo'<script type="text/javascript">window.location.href="./manage_cartegory.php?error=successfullyUpdated";</script>';
        
    }
    else{
        header("Location: ./manage_cartegory.php?error=error");
    }  
} 
}
include 'foot.php';
