<?php
include 'nav.php';
include 'functions.php'
?>
    <!-- Navbar Section Ends Here -->

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center" style="background-image:linear-gradient(rgba(0,0,0,0.6),rgba(0, 0, 0, 0.6)),url('./images/ivan-stern-LOLSb7m6XkU-unsplash.jpg');height:50vh;background-size:cover;background-position:center;background-repeat:no-repeat;">
        <div class="container">
            
            <form action="food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
            <?php
            // Get food from db that are active and featured
            $sql1="SELECT * FROM tbl_food WHERE active='Yes' ";
             DisplayFood($conn,$sql1);
             ?>
            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php
    include 'footer.php';
    ?>