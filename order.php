<?php
include 'nav.php';
include 'functions.php';
// if order is clicked
if (isset($_GET['id'])){
    // get the particular id
    $id=$_GET['id'];
    // get food details
    $sql="SELECT * FROM tbl_food WHERE id=$id";
    $res=mysqli_query($conn,$sql);
    $count =mysqli_num_rows($res);
    if($count>0){
        $row=mysqli_fetch_assoc($res);
            $id=$row['id'];
            $title=$row['title'];
            $price=$row['price'];
            $image_name=$row['image_name'];
             
        }
        }

// if not correctly clicked
else header("location: ./index.php");
?>
    <!-- Navbar Section Ends Here -->

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search" style="background-image:linear-gradient(rgba(0,0,0,0.6),rgba(0, 0, 0, 0.6)),url('./images/ivan-stern-LOLSb7m6XkU-unsplash.jpg');height:120vh;background-size:cover;background-position:center;background-repeat:no-repeat;">
        <div class="container text-white">
            
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form action="" method="post" class="order">
                <fieldset>
                    <legend>Selected Food</legend>
                    
                    <?php
                    // checks if image is not
                     if($image_name == ""){
                        echo '<div>Image Not Available</div>';
                    }
                    // checks if image is available 
                    else{?>
                    <div class="food-menu-img">
                        <img src="images/menu-pizza.jpg" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                    </div>
                        <?php } ?>
                    <div class="food-menu-desc">
                        <h3><?php echo $title;?></h3>
                        
                        <p class="food-price">KES <?php echo $price;?></p>

                        <input type="hidden" name="title" class="input-responsive" value="<?php echo $title?>" required>
                        <input type="hidden" name="price" class="input-responsive" value="<?php echo $price?>" required>
                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="E.g.Caleb" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g. 9843xxxxxx" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="E.g. caleb@gmail.com" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <?php
    include 'footer.php';
    if(isset($_POST['submit'])){
        $food=$_POST['title'];
        $price=$_POST['price'];
        $qty=$_POST['qty'];
        $total = $price * $qty; //total quantity
        $order_date=date('Y-m-d h:m:sa'); //date format
        $status = "Ordered";
        $customer_name=$_POST['full-name'];
        $customer_contact=$_POST['contact'];
        $customer_email=$_POST['email'];
        $customer_address=$_POST['address'];
        if(emptyOrder($food,$price,$qty,$total,$order_date,$status,$customer_name,$customer_contact,$customer_email,$customer_address)!== false){
            header("Location: ./order.php?error=FillAllFields");
        }
        // if(filter_var($customer_email,FILTER_VALIDATE_EMAIL)){

            // $subject="Order Successful";
            // $mailFrom="From: tammingagivondo@yahoo.com";
            // $headers=" Drive-by Resturant";
            // $txt = "Thank-you for ordering from Drive-By Resturant. \n\n Your Order of ".$food." of price Kes ".$price." will arive in 40-50 minutes";
            // if(mail($customer_email,$subject,$txt,$mailFrom)){
            //     echo "mail sent";
            // }
            // else{
            //     echo "mail not sent";
            // }
            
            //
        // }
        addCustomer($conn ,$food,$price,$qty,$total,$order_date,$status,$customer_name,$customer_contact,$customer_email,$customer_address);
        
    }
    ?>