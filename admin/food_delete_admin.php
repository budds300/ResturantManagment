<?php
include 'nav.php';
// check if id and image_name is set or not
if(isset($_GET['delete']) && isset($_GET['image_name'])){
$id=$_GET['delete'];
$image_name=$_GET['image_name'];
 
// remove image physically
if($image_name != ""){
    $path="../images/cartegory/".$image_name;
    // removin image
    echo $path;
    $remove= unlink($path);
    // if failed to remove, sotp process
    if($remove == false){
        // set session
        $_SESSION['remove']='<div class="alert alert-danger" role "alert"> Failed to remove image </div>';
        // redirect to manage cartegory
        header("location: ./manage_food.php?error=failedToRemoveImage");
        die();
    }

}
// remove from database
$sql = "DELETE FROM tbl_food WHERE id='$id'";
$res = mysqli_query($conn,$sql);
// check if deleted
if ($res){
    $_SESSION['deleted']='<div class="alert alert-success" role "alert"> Successfully deleted </div>';
    header("location: ./manage_food.php");
}
else{
    $_SESSION['deleted']='<div class="alert alert-danger" role "alert"> Failed to remove delete </div>';
    header("location: ./manage_food.php?error=NotDeleted");
}
}


else header("location: ./manage_cartegory.php?");