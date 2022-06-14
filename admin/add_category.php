<?php 
include ("nav.php");
include( "../functions.php");
if(isset($_SESSION["id"])){
?>
<div class="container">
    <div class="row pt-5">
        <div class="col-md-2"></div>
        <div class="col-md-8">
        <form action="" name="" method="POST" enctype="multipart/form-data">
    <!-- 2 column grid layout with text inputs for the first and last names -->
    <div class="row mb-4">
        <div class="col">
            <label class="form-label" for="form3Example1">Title</label>
            <div class="form-outline">
            <input type="text" id="form3Example1" name="title" class="form-control" value="" />
        </div>
        <label class="form-label" for="form3Example1">Select file</label>
        <div class="form-outline">
            <input type="file" id="form3Example1" name="image" class="form-control" value="" />
        </div>
        </div>
        </div>
    <div class="form-check form-check-inline">
        <label for="">Featured:</label> <br> <br>
    <input class="form-check-input ms-1" type="radio" name="featured" id="inlineRadio1" value="Yes" />
    <label class="form-check-label" for="inlineRadio1">Yes</label>
    </div>
    <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="featured" id="inlineRadio2" value="No" />
    <label class="form-check-label" for="inlineRadio2">No</label>
    </div> 
    <div class="form-check form-check-inline ms-5">
        <label for="">Active:</label><br><br>
    <input class="form-check-input ms-1" type="radio" name="active" id="inlineRadio3" value="Yes" />
    <label class="form-check-label" for="inlineRadio3">Yes</label>
    </div>
    <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="active" id="inlineRadio4" value="No" />
    <label class="form-check-label" for="inlineRadio4">No</label>
    </div>
    <!-- Submit button -->
    <button type="submit" class="btn btn-primary btn-block mb-4" name="submit">Add</button>
    <!-- Register buttons -->
    </form>
    </div>
        <div class="col-md-2"></div>
    </div>
</div>
<?php
if(isset($_POST['submit'])){
    $title=$_POST['title'];
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
    // upload Image ony if selected
    $image_name=$_FILES['image']['name'];
    if($image_name !=""){
    
    // To upload one needs image name,source path and destionation path
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
            header("location: ./manage_cartegory.php?successfullyUpdated");
            die(); 
        }
}
}
else{ $image_name="";}
    // print_r($_FILES['file']);
    // die();
    $sql= "INSERT INTO tbl_cartegory set title='$title' ,featured='$featured',image_name='$image_name',active='$active'";
    //execute querry to save to db
    $res=mysqli_query($conn,$sql);
    if($res){
        $_SESSION ['add']= '<div class="alert alert-success" role "alert"> successfully Added </div>';
        if(headers_sent()){
            // header("Location: ./manage_cartegory.php?error=successfull");
             echo'<script type="text/javascript  ">window.location.href="./manage_cartegory.php?error=successfullyUpdated";</script>';
        }
    }
    else{
        header("Location: ./manage_cartegory.php?error=error");
    }  
} 
include 'foot.php';
}
