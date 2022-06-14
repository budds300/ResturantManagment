<?php
include '../functions.php';
include '../database/db.php';
if(isset($_POST['change-pass'])){
    //Get data from form
    $ID= $_POST['id'];
    $current_password=$_POST['old-pass'];
    $new_password=($_POST['new-pass']);
    $confirm_pass=($_POST['confirm-pass']);
    
    //check if userr with current id exists
    
    if(emptyInputSignAdminUp($current_password,$new_password,$confirm_pass) !== false){
        header("location: ./index.php?error=emptyinput");
        exit();
    }
    else if ($new_password == $confirm_pass){

        changeAdminPass($conn,$ID,$current_password,$new_password);
        header("Location: ./manage_admin.php?error=success");
    }
    else header("Location: ./password_admin.php?error=passwordDosen");
    
}
else  header("Location: ./password_admin.php?error=Usernotfound");
        
