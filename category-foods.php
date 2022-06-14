<?php
include 'nav.php';
include 'functions.php';
// check if id is passed
if (isset($_GET['cartegory_id'])){
    $category_id=$_GET['cartegory_id'];
    // Get Catogory title based on id
    $sql="SELECT title from tbl_cartegory where id=$category_id";
    $res=mysqli_query($conn,$sql);
    if($count=mysqli_num_rows($res)>0){
        while($row=mysqli_fetch_assoc($res)){
            $category_title=$row['title'];
            
        }
    }
}
else{
    header("Location: ./index.php");
}
?>
    <!-- Navbar Section Ends Here -->

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center" style="background-image:linear-gradient(rgba(0,0,0,0.6),rgba(0, 0, 0, 0.6)),url('./images/ivan-stern-LOLSb7m6XkU-unsplash.jpg');height:50vh;background-size:cover;background-position:center;background-repeat:no-repeat;">
        <div class="container">
            
            <h2 class="pt-5 text-white">Foods on  <a href="#" class="">"<?php echo $category_title?>"</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
            <?php
                $sql1="SELECT * from tbl_food where cartegoty_id=$category_id";
               DisplayFood($conn,$sql1)
                    ?>
        
         


            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <!-- social Section Starts Here -->
    <?php
    include 'footer.php';
    ?> 