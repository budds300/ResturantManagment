<?php
require 'nav.php';
if(isset($_SESSION["id"])){

echo '<div class="container">';     
if (isset($_GET["error"])){
    if($_GET["error"]=="SuccessfullyUpdated"){
        echo '<div class="alert alert-success" role "alert">Records successfully updated </div>';
    }
    else if($_GET['error']=="noupdate"){
        echo '<div class="alert alert-info" role "alert">No update </div>';
    }
    else if($_GET['error']=="noerrorsuccess"){
        echo '<div class="alert alert-success" role "alert"> New passenger successfully added </div>';
    }
    
    else if($_GET['error']=="successfullydeleted"){
    echo '<div class="alert alert-success" role "alert">Deleted successfully </div>';
}
    else if($_GET['error']=="ExistingAdmin"){
    echo '<div class="alert alert-danger" role "alert">Already Existing Admin </div>';
}
}
if (isset($_SESSION['update'])){
    echo $_SESSION['update'];
    unset($_SESSION['update']);
}
$sn=1;
?>
<style>

</style>
    <h1 class="py-4">Manage Admin</h1>
    <a href="./manage_admin_add.php" class="btn btn-secondary my-3">Add Admin</a>
    <?php
    $sql="Select * from tbl_admin";
    $result = mysqli_query($conn,$sql);
    $datas = array();
    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
            $datas[]=$row;
        }
    }
    echo "<table class='table table-hover py-5'>";
    echo "<thread>";
    
    echo "<tr class='pt-5'>";
    echo "<th scope='col'> Id</th>";
    echo "<th scope='col'>FullName</th>";
    echo "<th scope='col'>User Name</th>";
    echo "<th scope='col'>Password</th>";
    echo "</tr>";
    echo "</thread>";

    foreach($datas as $data){

        echo "<tbody>";
        echo "<tr>";
        echo "<td>"; echo $sn++; echo "</td>";
        echo "<td>"; echo $data["full_name"]; echo "</td>";
        echo "<td>"; echo $data["username"]; echo "</td>";
        echo "<td>"; echo $data["password"]; echo "</td>";
        echo "<td> <a class='btn btn-secondary' href='password_admin.php?id=".$data['id']."'>Change password</a> </td>";
        echo "<td> <a class='btn btn-info' href='update_admin.php?update=".$data['id']."'> Update</a> </td>";
    echo "<td> <a class='btn btn-danger' href='delete_admin.php?delete=".$data['id']."'>Delete</a>  </td>";
        echo "</tr>";
        echo "</tbody>";
    }
    echo "</thread>";


    ?>
</div>



<?php
require 'foot.php';} 
else echo'<div class="container">
<h1 class""> You are Logged out</h1>
</div>';

    ?>