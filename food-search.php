<?php
include 'nav.php';
include 'functions.php';
if(isset($_POST['search'])){
$search=$_POST['search'];
?>
    <!-- Navbar Section Ends Here -->

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <h2>Foods on Your Search <a href="#" class="text-white">"<?php echo $search?>"</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
            <?php 
            // Get the search keyword
            
            // get food based of search
            $sql="SELECT * FROM tbl_food WHERE title LIKE '%$search%' OR description LIKE '%$search%'";
            DisplayFood($conn,$sql);
            ?>



            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php
}
    include 'footer.php';
    ?>