<?php
include 'nav.php';
include 'functions.php';
?>
    <!-- Navbar Section Ends Here -->



    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>
            <a href="./categories.php?cartegory_id=<?php echo $id?>">
            <?php
            // display all cartegories from db
            $sql="SELECT * FROM tbl_cartegory WHERE active='Yes'";
            displayCategory($conn,$sql);?>
         <div class="clearfix"></div>
        </div>
    </section>
<?php
include 'footer.php';
?>

</body>
</html>