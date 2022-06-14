<?php 
include ("nav.php");
include( "../functions.php");
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
        <label class="form-label" for="form3Example1">Description</label>
        <div class="form-outline">
          <textarea type="text" id="form3Example1" name="description" class="form-control" value=""></textarea>
      </div>
        <label class="form-label" for="form3Example1">Price</label>
        <div class="form-outline">
          <input type="number" id="form3Example1" name="price" class="form-control" value="" />
        </div>
       
        <label class="form-label" for="form3Example1">Cartegory</label>
        <div class="form-outline">
          <select name="cartegory" id="">
              
              <?php
            //   create code to display cartegories
            // create wql query to get all active categories
            $sql= "SELECT * FROM tbl_cartegory WHERE active='Yes'";
            // executing querries
            $res=mysqli_query($conn,$sql);
            // count rows to check if there are cartegories or not
             $count = mysqli_num_rows($res);
             if($count>0){
                //  cartegories present
                while ($row=mysqli_fetch_assoc($res)){
                    $id=$row["id"];
                    $title=$row['title'];
                    ?>
                    <option value="<?php echo $id;?>"><?php echo $title?></option>
                    
                    <?php
                }
             }
             else {
                 ?>
                    <option value="0">No Category</option>
                    <?php
             }
            ?>
              
              <option value="2">Snacks</option> 
          </select>
      </div>
      <label class="form-label" for="form3Example1">Select file</label>
      <div class="form-outline">
          <input type="file" id="form3Example1" name="image" class="form-control border" value="" />
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
    $description=$_POST['description'];
    $cartegory=$_POST['cartegory'];
    $price=$_POST['price'];
    
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
    
    
    // To upload one needs image name,source path and destionation path
    $image_name=$_FILES['image']['name'];
    if($image_name !=""){
    // auto renaming images       
    // Get the extension of our image(jpg,png,gif,etc)e.g. "special foods.png
     $temp = explode('.',$image_name);
     $ext= end($temp);
    // rename the image
    $image_name="Food_Name".rand(000,999).'.'.$ext;
    $source_path=$_FILES['image']['tmp_name'];
    $destination_path="../images/food/".$image_name;
    $upload =move_uploaded_file($source_path,$destination_path);
    // check if uploaded image or not
        if($upload == false){
            $_SESSION['upload']= 'Failed to upload image';
            header("location: ./manage_food.php?failedToUpload");
            die(); 
        }
}
}
else{ $image_name="";}
    // print_r($_FILES['file']);
    // die();
    $sql2= "INSERT INTO tbl_food set title='$title', description='$description',price='$price',cartegoty_id='$cartegory', featured='$featured',image_name='$image_name',active='$active'";
    //execute querry to save to db
    $res=mysqli_query($conn,$sql2);
    if($res){
        $_SESSION ['add']= '<div class="alert alert-success" role "alert"> successfully Added </div>';
        if(headers_sent()){
            // header("Location: ./manage_food.php?error=successfull");
             echo'<script type="text/javascript  ">window.location.href="./manage_food.php?error=successfullyUpdated";</script>';
        }
    }
    else{
        header("Location: ./manage_cartegory.php?error=error");
    }  
} 
include 'foot.php';
