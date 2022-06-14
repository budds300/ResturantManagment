<?php

function emptyInputSignAdminUp($fullname,$username,$password){
    $result=false;
    if(empty($fullname) ||empty($username) ||empty($password)){
        $result=true;
    }
    else {$result=false;}
    
    return $result;
}
function emptyInputlogin($username,$pwd){
    $result=false;
    if(empty($username) ||empty($pwd) ){
        $result=true;
    }
    else {$result=false;}
    
    return $result;
}
function emptyNewAdmin($current,$new,$confirm){
    $result=false;
    if(empty($current) ||empty($new)||empty($confirm) ){
        $result=true;
    }
    else {$result=false;}
    
    return $result;
}
function emptyOrder($food,$price,$qty,$total,$order_date,$status,$customer_name,$customer_contact,$customer_email,$customer_address){
    $result=false;
    if(empty($food) ||empty($price)||empty($qty)||empty($total)||empty($order_date)||empty($status)||empty($customer_name)||empty($customer_contact)||empty($customer_email)||empty($customer_address) ){
        $result=true;
    }
    else {$result=false;}
    
    return $result;
}
function reservations($customer_name,$customer_contact,$customer_email,$numberOfGuests,$reserve_date){
    $result=false;
    if(empty($customer_name)||empty($customer_contact)||empty($customer_email)|| empty($numberOfGuests)|| empty($reserve_date)){
        $result=true;
    }
    else {$result=false;}
    
    return $result;
}
function invaldUid($username){
    $result=null;
    if(!preg_match("/^[a-zA-Z0-9]*$/",$username)){
        $result=true;
    }
    else 
    $result=false; 
    
    return $result;
}
function invalidEmail($email){
    $result=null;
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $result=true;
    }
    else $result=false;
    
    return $result;
}
function pwdMatch($pwd,$pwdRepeat){
    $result=null;
    if($pwd !== $pwdRepeat){
        $result=true;
    }
    else 
    $result=false;
    
    return $result;
}
function uidExist($conn,$username){
    //? is a placeholder, due to prepared statements,statements are sent to db 1st then placeholder are filled user provides data 
   $sql= "SELECT * FROM tbl_admin WHERE username=?"; //scopes to check db for userid and userEmail
   // prepared statement to submit data in a proper way
   $stmt= mysqli_stmt_init($conn); // initialising new prepared statement
   // checking to see if mistakes might happen
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ./Login_admin.php?error=stmtfailed"); // sends back to sign up form if error happens
        exit(); 
    }
// if true we want to pass data from user
    mysqli_stmt_bind_param($stmt,"s",$username); //ss means its 2 strings
    // executing data from the database
    mysqli_stmt_execute($stmt);
    // Grabbing the data 
    $resultData = mysqli_stmt_get_result($stmt);
    // fetching the data in a form of an assoctive array
    if($row = mysqli_fetch_assoc($resultData)){ // checking if data by user is true
        return $row; 
    }
    else 
    $result= false;
    return $result;

    mysqli_stmt_close($stmt);
}
function SuperAdminExist($conn,$username){
    //? is a placeholder, due to prepared statements,statements are sent to db 1st then placeholder are filled user provides data 
   $sql= "SELECT * FROM tbl_super WHERE username=?"; //scopes to check db for userid and userEmail
   // prepared statement to submit data in a proper way
   $stmt= mysqli_stmt_init($conn); // initialising new prepared statement
   // checking to see if mistakes might happen
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ./Login_admin.php?error=stmtfailed"); // sends back to sign up form if error happens
        exit(); 
    }
// if true we want to pass data from user
    mysqli_stmt_bind_param($stmt,"s",$username); //ss means its 2 strings
    // executing data from the database
    mysqli_stmt_execute($stmt);
    // Grabbing the data 
    $resultData = mysqli_stmt_get_result($stmt);
    // fetching the data in a form of an assoctive array
    if($row = mysqli_fetch_assoc($resultData)){ // checking if data by user is true
        return $row; 
    }
    else 
    $result= false;
    return $result;

    mysqli_stmt_close($stmt);
}
function idExist($conn,$id){
    //? is a placeholder, due to prepared statements,statements are sent to db 1st then placeholder are filled user provides data 
   $sql= "SELECT * FROM tbl_admin WHERE id=?"; //scopes to check db for userid and userEmail
   // prepared statement to submit data in a proper way
   $stmt= mysqli_stmt_init($conn); // initialising new prepared statement
   // checking to see if mistakes might happen
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ./Login_admin.php?error=stmtfailed"); // sends back to sign up form if error happens
        exit(); 
    }
// if true we want to pass data from user
    mysqli_stmt_bind_param($stmt,"s",$id); //ss means its 2 strings
    // executing data from the database
    mysqli_stmt_execute($stmt);
    // Grabbing the data 
    $resultData = mysqli_stmt_get_result($stmt);
    // fetching the data in a form of an assoctive array
    if($row = mysqli_fetch_assoc($resultData)){ // checking if data by user is true
        return $row; 
    }
    else 
    $result= false;
    return $result;

    mysqli_stmt_close($stmt);
}
function uidExistAdmin($conn,$username){
    //? is a placeholder, due to prepared statements,statements are sent to db 1st then placeholder are filled user provides data 
   $sql= "SELECT * FROM tbl_admin WHERE  username=?;"; //scopes to check db for userid and userEmail
   // prepared statement to submit data in a proper way
   $stmt= mysqli_stmt_init($conn); // initialising new prepared statement
   // checking to see if mistakes might happen
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ./manage_admin_add.php?error=stmtfailed"); // sends back to sign up form if error happens
        exit(); 
    }
// if true we want to pass data from user
    mysqli_stmt_bind_param($stmt,"s",$username); //ss means its 2 strings
    // executing data from the database
    mysqli_stmt_execute($stmt);
    // Grabbing the data 
    $resultData = mysqli_stmt_get_result($stmt);
    // fetching the data in a form of an assoctive array
    if($row = mysqli_fetch_assoc($resultData)){ // checking if data by user is true
        return $row; 
    }
    else 
    $result= false;
    return $result;

    mysqli_stmt_close($stmt);
}

function createUser($conn,$email,$username,$pwd){
    //? is a placeholder, due to prepared statements,statements are sent to db 1st then placeholder are filled user provides data 
   $sql= "INSERT INTO admin (usersName,usersEmail,userPwd) VALUES (?,?,?)"; //scopes to check db for userid and userEmail
   // prepared statement to submit data in a proper way
   $stmt= mysqli_stmt_init($conn); // initialising new prepared statement
   // checking to see if mistakes might happen
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ./signup.php?error=stmtfailed"); // sends back to sign up form if error happens
        exit(); 
}
    $hashedPwd=password_hash($pwd,PASSWORD_DEFAULT);
    // if true we want to pass data from user
    mysqli_stmt_bind_param($stmt,"sss",$username,$email,$hashedPwd); //ss means its 2 strings
    // executing data from the database
    mysqli_stmt_execute($stmt);
    // close stmt function
    mysqli_stmt_close($stmt);
    header("location: ./signup.php?error=none");
    exit();
}
function addCustomer($conn,$food,$price,$qty,$total,$order_date,$status,$customer_name,$customer_contact,$customer_email,$customer_address){
    //? is a placeholder, due to prepared statements,statements are sent to db 1st then placeholder are filled user provides data 
   $sql= "INSERT INTO tbl_order (food,price,quantity,total,order_date,status,customer_name,customer_contact,customer_email,customer_address) VALUES (?,?,?,?,?,?,?,?,?,?)"; //scopes to check db for userid and userEmail
   // prepared statement to submit data in a proper way
   $stmt= mysqli_stmt_init($conn); // initialising new prepared statement
   // checking to see if mistakes might happen
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ./order.php?error=stmtfailed"); // sends back to sign up form if error happens
        exit(); 
}
    
    // if true we want to pass data from user
    mysqli_stmt_bind_param($stmt,"ssssssssss",$food,$price,$qty,$total,$order_date,$status,$customer_name,$customer_contact,$customer_email,$customer_address); //ss means its 2 strings
    // executing data from the database
    mysqli_stmt_execute($stmt);
    // close stmt function
    // session_start();
        session_start();
        $_SESSION ['order']= '<div class="alert alert-success text-center " role "alert"> Order Successful </div>';
        
     
    mysqli_stmt_close($stmt);
    echo'<script type="text/javascript  ">window.location.href="./index.php?error=successfullyUpdated";</script>';
   
    exit();
}
function reserveTable($conn,$order_date,$status,$customer_name,$customer_contact,$customer_email,$numberOfGuests,$reserve_date){
    //? is a placeholder, due to prepared statements,statements are sent to db 1st then placeholder are filled user provides data 
   $sql= "INSERT INTO tbl_reservation (order_date,status,customer_name,customer_contact,customer_email,reservation_date,number_of_guests) VALUES (?,?,?,?,?,?,?)"; //scopes to check db for userid and userEmail
   // prepared statement to submit data in a proper way
   $stmt= mysqli_stmt_init($conn); // initialising new prepared statement
   // checking to see if mistakes might happen
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ./order.php?error=stmtfailed"); // sends back to sign up form if error happens
        exit(); 
}
    
    // if true we want to pass data from user
    mysqli_stmt_bind_param($stmt,"sssssss",$order_date,$status,$customer_name,$customer_contact,$customer_email,$reserve_date,$numberOfGuests); //ss means its 2 strings
    // executing data from the database
    mysqli_stmt_execute($stmt);
    // close stmt function
    
        session_start();
        $_SESSION['reservation']= '<div class="alert alert-success  " role "alert"> Reservation Successful </div>';
        
     
    mysqli_stmt_close($stmt);
    header("location: ./index.php?error=reserved");
   
    exit();
}
function createUseradmin($conn,$fullname,$username,$pwd){
    //? is a placeholder, due to prepared statements,statements are sent to db 1st then placeholder are filled user provides data 
   $sql= "INSERT INTO tbl_admin (full_name,username,password) VALUES (?,?,?)"; //scopes to check db for userid and userEmail
   // prepared statement to submit data in a proper way
   $stmt= mysqli_stmt_init($conn); // initialising new prepared statement
   // checking to see if mistakes might happen
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ./manage_admin_add.php?error=stmtfailed"); // sends back to sign up form if error happens
        exit(); 
}
    $hashedPwd=password_hash($pwd,PASSWORD_DEFAULT);
    // if true we want to pass data from user
    mysqli_stmt_bind_param($stmt,"sss",$fullname,$username,$hashedPwd); //ss means its 2 strings
    // executing data from the database
    mysqli_stmt_execute($stmt);
    // close stmt function
    mysqli_stmt_close($stmt);
    $_SESSION['add']="Successfully added";
    header("location: ./manage_admin.php?error=none");
    exit();
}
function superAdmin($conn,$username,$pwd){
    //? is a placeholder, due to prepared statements,statements are sent to db 1st then placeholder are filled user provides data 
   $sql= "INSERT INTO tbl_super (username,password) VALUES (?,?)"; //scopes to check db for userid and userEmail
   // prepared statement to submit data in a proper way
   $stmt= mysqli_stmt_init($conn); // initialising new prepared statement
   // checking to see if mistakes might happen
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ./manage_admin_add.php?error=stmtfailed"); // sends back to sign up form if error happens
        exit(); 
}
    $hashedPwd=password_hash($pwd,PASSWORD_DEFAULT);
    // if true we want to pass data from user
    mysqli_stmt_bind_param($stmt,"ss",$username,$hashedPwd); //ss means its 2 strings
    // executing data from the database
    mysqli_stmt_execute($stmt);
    // close stmt function
    mysqli_stmt_close($stmt);
    $_SESSION['add']="Successfully added";
    header("location: ./manage_admin.php?error=none");
    exit();
}
function loginUser($conn,$username,$pwd){
    $uidExists= uidExist($conn,$username,$username);
    if($uidExists == false){
        header("location ./index.php?error=wronglogin");
        exit();
    }
    $pwdhashed = $uidExists["password"];
    $checkPwd=password_verify($pwd,$pwdhashed);

    if($checkPwd === false){
        header("location ./index.php?error=wrongpwd");
        exit();
    }
    else if ($checkPwd === true){
        session_start();
        $_SESSION["userid"]= $uidExists["id"];
        $_SESSION["username"] = $uidExists["username"];
        header("Location: ./dashboard.php?login=success");
    }
}   
function loginUserAdmin($conn,$username,$pwd){
    $uidExists= uidExist($conn,$username);
    if($uidExists == false){
        header("location: ./login_admin.php?error=wronglogin");
        exit();
    }
    $pwdhashed = $uidExists["password"];
    $checkPwd=password_verify($pwd,$pwdhashed);

    if($checkPwd == false){
        
        header("location: ./login_admin.php?error=wrongpwdOrUsername");
        exit();
    }
    else if ($checkPwd === true){
        session_start();
        $_SESSION["id"]= $uidExists["id"];
        $_SESSION["username"] = $uidExists["username"];
        $_SESSION['successfull']= '<div class="alert alert-success" role "alert"> successfully logged in </div>';
        header("Location: ./admin.php?login=success");
    }
} 
function loginSuperAdmin($conn,$username,$pwd){
    $uidExists= SuperAdminExist($conn,$username);
    if($uidExists == false){
        header("location: ./login_admin.php?error=wronglogin");
        exit();
    }
    $pwdhashed = $uidExists["password"];
    $checkPwd=password_verify($pwd,$pwdhashed);

    if($checkPwd == false){
        
        header("location: ./login_admin.php?error=wrongpwdOrUsername");
        exit();
    }
    else if ($checkPwd === true){
        session_start();
        $_SESSION["id"]= $uidExists["id"];
        $_SESSION["username"] = $uidExists["username"];
        $_SESSION['successfull']= '<div class="alert alert-success" role "alert"> successfully logged in </div>';
        header("Location: ./supadmin.php?login=success");
    }
} 
    function changeAdminPass($conn,$id,$pwd,$newPass){
        $uidExists=idExist($conn,$id);   
        $pwdhashed = $uidExists["password"];
        $checkPwd=password_verify($pwd,$pwdhashed);
        if($checkPwd === false){
            echo "Sometin wong";
            $_SESSION['wrong-pass']= '<div class="alert alert-danger" role "alert"> Wrong password </div>';
             header("location: ./password_admin.php?error=wrongpwd");
            exit();
        }
        else if ($checkPwd === true){
            $sql1 = "UPDATE tbl_admin SET password =? WHERE id= ?";
            $stmt= mysqli_stmt_init($conn); // initialising new prepared statement
            // checking to see if mistakes might happen
            if(!mysqli_stmt_prepare($stmt,$sql1)){
                header("location: ./manage_admin_add.php?error=stmtfailed"); // sends back to sign up form if error happens
                exit(); 
        }
            $passwordHash=password_hash($newPass, PASSWORD_DEFAULT);       
            mysqli_stmt_bind_param($stmt,"ss",$passwordHash,$id); //ss means its 2 strings
            // executing data from the database
            mysqli_stmt_execute($stmt);
            header("location: ./admin.php?error=SuccessfullyUpdated");
            
            
            
            if($stmt){
                $_SESSION['update']= '<div class="alert alert-success" role "alert"> successfully updated </div>';
                
            }
            else{
                $_SESSION['update']= '<div class="alert alert-danger" role "alert">Did not cpmplete update </div>';
                
            }
            // close stmt function
            mysqli_stmt_close($stmt);// initialising new prepared statement

        
    }
} 
function UpdateAdmin($conn,$id,$fullname,$username){
    if(uidExistAdmin($conn,$username)!==false){
        header("location: ./manage_admin.php?error=ExistingAdmin");
    }
    else{
        $sql1 = "UPDATE tbl_admin SET username='".$username."',full_name='".$fullname."' WHERE id='".$id."'";
        $res=mysqli_query($conn,$sql1);
        
    if($res){
        
        
        header("location: ./manage_admin.php?error=successfulupdate");
    }
    else{
        $_SESSION['update']= '<div class="alert alert-danger" role "alert">Did not complete update </div>';
        }
   
    }
}
function DisplayFood($conn,$sql1){
    
    
    $res1=mysqli_query($conn,$sql1);
    $count1 =mysqli_num_rows($res1);
    if($count1>0){
        while($row=mysqli_fetch_assoc($res1)){
            $id=$row['id'];
            $title=$row['title'];
            $price=$row['price'];
            $description=$row['description'];
            $image_name=$row['image_name'];?>

<div class="food-menu-box">
    <div class="food-menu-img">
        <!-- if image is available or not -->
         <?php if($image_name == ""){
            echo '<div class="error">Image not available</div>';
        } else{?>
        <img src="images/food/<?php echo $image_name?>" alt="Food" class="img-responsive img-curve">
    </div>
        <?php
    }?>
    <!-- display details from db -->
    <div class="food-menu-desc">
        <h4><?php echo $title?></h4>
        <p class="food-price">KES<?php echo $price?></p>
        <p class="food-detail">
        <?php echo $description?>
        </p>
        <br>
        <a href="order.php?id=<?php echo $id?>" class="btn btn-primary">Order Now</a>
        </div>
        </div>
        <?php
            
        }
    }
    else{
        echo '<div class="text-center">Food are not added</div>';
    }
    ?>
<?php
}
function displayCategory($conn,$sql){
    $res=mysqli_query($conn,$sql);
                // count rows to check if category is available
                $count =mysqli_num_rows($res);
                if($count>0){
                    while($row=mysqli_fetch_assoc($res)){
                        $id=$row['id'];
                        $title=$row['title'];
                        $image_name=$row['image_name'];
                        ?>
                            <a href="./category-foods.php?cartegory_id=<?php echo $id?>">
                                <div class="box-3 float-container">
                                    <?php
                                    // if image not available
                                    if($image_name == ""){
                                        echo '<div class="error">Image not available</div>';
                                    }
                                    // image available
                                    else{
                                        ?>
                                        <img src="images/cartegory/<?php echo $image_name;?>" alt="Pizza" class="img-responsive img-curve">
                                        <?php 
                                    }
                                    ?>
                                    <h3 class="float-text text-white"><?php echo $title?></h3>
                                </div>
                            </a>
                        <?php
                    
                }
                }
                else{
                    echo '<div>Cartegories are not added</div>';
                }
                
}

