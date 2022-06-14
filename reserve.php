
   <?php
   include 'nav.php';
   include 'functions.php';
   ?>
   <section class="food-search" style="background-image:linear-gradient(rgba(0,0,0,0.6),rgba(0, 0, 0, 0.6)),url('./images/ivan-stern-LOLSb7m6XkU-unsplash.jpg');height:100vh;background-size:cover;background-position:center;background-repeat:no-repeat;">
        <div class="container text-white">
            
            <h2 class="text-center text-white">Fill this form to confirm your Reservation.</h2>

            <form action="" method="post" class="order">               
                <fieldset>
                    <legend>Table Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="E.g.Caleb" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g. 9843xxxxxx" class="input-responsive" required>

                    <div class="order-label">Number of guests</div>
                    <input type="number" name="guests" placeholder="E.g. 1,2,3,4" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="E.g. caleb@gmail.com" class="input-responsive" required>
                    
                    <div class="order-label">Date of Reservation</div>
                    <input type="date" name="txtDate" placeholder="E.g. 04/06/2022" class="input-responsive" required min="new Date().toISOString().split('T')[0]">

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>

        </div>
    </section>
    <?php
    include 'footer.php';
    if(isset($_POST['submit'])){    
        $order_date=date('Y-m-d h:m:sa'); //date format
        $status = "Reserved";
        $customer_name=$_POST['full-name'];
        $customer_contact=$_POST['contact'];
        $customer_email=$_POST['email'];
        $numberOfGuests=$_POST['guests'];
        $reserve_date=$_POST['txtDate'];
        if(reservations($customer_name,$customer_contact,$customer_email,$numberOfGuests,$reserve_date)!== false){
            header("Location: ./reserve.php?error=FillAllFields");
        }
        // if(filter_var($customer_email,FILTER_VALIDATE_EMAIL)){

        //     $subject="Order Successful";
        //     $mailFrom="From: tammingagivondo@yahoo.com";
        //     $headers=" Drive-by Resturant";
        //     $txt = "Thank-you Your table has been reserved for . ";
        //     if(mail($customer_email,$subject,$txt,$mailFrom)){
        //         echo "mail sent";
        //     }
        //     else{
        //         echo "mail not sent";
        //     }
            reserveTable($conn,$order_date,$status,$customer_name,$customer_contact,$customer_email,$numberOfGuests,$reserve_date);
               
            //
        }
    // }
    ?>