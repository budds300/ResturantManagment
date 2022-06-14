<?php
if(isset($_POST['submit'])){
    $username=$_POST['name'];
    $pwd=$_POST['pwd'];

    require '../database/db.php';
    require '../functions.php';
    if(emptyInputlogin($username,$pwd) !== false){
        header("location: ./index.php?error=emptyinput");
        exit();
    }
    loginUserAdmin($conn,$username,$pwd);

}
else{
    header('location: ./login_admin.php');
}