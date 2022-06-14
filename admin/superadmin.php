<?php
require "head.php";
?>
<style>
.alert-success{
background-color: rgb(160, 214, 160);
color: rgb(25, 89, 25);
border-radius: 2px solid rgb(102, 181, 102);
box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
padding: 10px;
text-align: center;
}
.alert-danger{
background-color: rgb(215, 160, 160);
color: rgb(126, 39, 39);
border-radius: 2px solid rgb(165, 64, 64);
box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
padding: 10px;
text-align: center;
}

.yellow{
    width: 50%;
    margin: auto;
}
.col-md-7{
    margin: auto;
    width: 70%;
}
@media only screen and (min-width:1000px){
    form{
        padding:0 0 0 30vh ;
    }
    
}
@media only screen and (max-width:700px){
    form{
    padding:0 0 0 5vh ;
    }
    
}
    

</style>
<?php

if (isset($_GET["error"])){

    if($_GET['error']=="wrongpwdOrUsername"){
   echo '<div class="alert alert-danger" styl role "alert">Wrong username or password </div>';
}
    if($_GET['error']=="wronglogin"){
   echo '<div class="alert alert-danger" role "alert">Wrong username or password </div>';
}
}
?>
<section class="vh-100">
    <div class="container py-5 h-100">
        <h1 class="text-center"> <strong>WELCOME TO RESTURANT MANAGMENT</strong></h1>
        <div class="row d-flex align-items-center justify-content-center h-100" >
        <div class="yellow">
            
            <img src="../images/grapes-2032838_960_720.jpg"  id="login" width="500" alt="Phone image">
        </div>
        <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
            <h3 class="text-center" style="text-align: center;"> <strong>LOG IN AS SUPER ADMIN</strong> </h3>
            <form action="" method = "post" >
            <!-- Email input / Username -->
            <div class="form-outline mb-4">
                <label class="form-label" for="form1Example13">Username</label> <br>
                <input type="text" id="form1Example14" name="name" class="form-control form-control-lg" />
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="form1Example23">Password</label> <br>
                <input type="password" id="form1Example23" name="pwd" class="form-control form-control-lg" />
                <label class="form-label" for="form1Example23"></label>
            </div>

            <div class="d-flex justify-content-around align-items-center mb-4">
            
                <!-- <a href="#!">Forgot password?</a> -->
            </div>

            <!-- Submit button -->
            <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>
            <div class="divider d-flex align-items-center my-4">
                
            </div>
            </form>
        </div>
        </div>
    </div>
</section>

<?php
require "foot.php";

if(isset($_POST['submit'])){
    $username=$_POST['name'];
    $pwd=$_POST['pwd'];

    require '../database/db.php';
    require '../functions.php';
    if(emptyInputlogin($username,$pwd) !== false){
        header("location: ./index.php?error=emptyinput");
        exit();
    }
    loginSuperAdmin($conn,$username,$pwd);

}
else{
    header('location: ./login_admin.php');
}
?>