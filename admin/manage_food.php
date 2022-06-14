<?php
require 'nav.php';

echo '<div class="container">';     
if (isset($_GET["error"])){

     if($_GET['error']=="ExistingAdmin"){
    echo '<div class="alert alert-danger" role "alert">Already Existing Admin </div>';
}
}
if (isset($_SESSION['update'])){
    echo $_SESSION['update'];
    unset($_SESSION['update']);
}
if (isset($_SESSION['add'])){
    echo $_SESSION['add'];
    unset($_SESSION['add']);
}
if (isset($_SESSION['deleted'])){
    echo $_SESSION['deleted'];
    unset($_SESSION['deleted']);
}
$sn=1;
?>

    <h1 class="py-4" style="padding: 0 0 40px 0;">Manage Food</h1>
    <a href="./food_admin_add.php" class="btn btn-secondary my-3">Add Food</a>
    <?php
    $sql="Select * from tbl_food";
      $result = mysqli_query($conn,$sql);
      $datas = array();
      if(mysqli_num_rows($result)>0){
          while($row=mysqli_fetch_assoc($result)){
              $datas[]=$row;
          }
      }
      ?>
      <table class='table table-hover py-5'style='margin-top:50px;'>
      <?php
      echo "<thread>";
      
      echo "<tr class='pt-5'>";
      echo "<th scope='col'> Sn</th>";
      echo "<th scope='col'> Title</th>";
      echo "<th scope='col'> Description</th>";
      echo "<th scope='col'> price</th>";
      echo "<th scope='col'>Image </th>";
      echo "<th scope='col'>Active</th>";
      echo "<th scope='col'>Featured</th>";
      echo "</tr>";
      echo "</thread>";

      foreach($datas as $data){

          echo "<tbody>";
          echo "<tr>";
          echo "<td>"; echo $sn++; echo "</td>";
          echo "<td>"; echo $data["title"]; echo "</td>";
          echo "<td>"; echo $data["description"]; echo "</td>";
          echo "<td>"; echo $data["price"]; echo "</td>";
          echo "<td>";
            $image_name=$data["image_name"];
            
            if( $image_name != ""){
               
            ?>
            <img src="../images/food/<?php echo $image_name?>" alt="Food image" srcset="" width="100px">
            <?php
           }
           else echo "Image Not found";
            echo "</td>";
          echo "<td>"; echo $data["active"]; echo "</td>";
          echo "<td>"; echo $data["featured"]; echo "</td>";
          
          echo "<td> <a class='btn btn-info' href='food_update_admin.php?update=".$data['id']."'> Update</a> </td>";
      echo "<td> <a class='btn btn-danger' href='food_delete_admin.php?delete=".$data['id']."&image_name=".$image_name." '>Delete</a>  </td>";
          echo "</tr>"; 
          echo "</tbody>";
      }
      echo "</thread>";

    
      ?>
</div>



<?php
require 'foot.php'
?>