<?php
require 'head.php';
require 'nav.php';


?>
<div class="container pb-5"></div> 
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
        <div class="card pt-5">
            <div class="card-body">
                <?php ?>
                <div class="card-text">Admin has been Successfully deleted</div>
                <a href="./manage_admin.php" class="btn btn-info"> Back</a>
            
            </div>
        </div>
</div>
        </div>
        <div class="col-md-3"></div>
    </div>

<?php
if (isset($_GET['delete'])){
    
    $uid=$_GET['delete'];
    $sql = " DELETE from tbl_admin where id=?";
    $stmt= mysqli_stmt_init($conn);
      if (!mysqli_stmt_prepare($stmt,$sql)){
        header("Location: ./delete_admin.php?error=sqlerror");
        exit();
      }
      else{
        mysqli_stmt_bind_param($stmt,"s",$uid);
        mysqli_stmt_execute($stmt);
        $_SESSION['deletes']="Admin Successfully deleted";
        // header("Location: ./manage_admin.php?error=successfullydeleted");

}
}
?>