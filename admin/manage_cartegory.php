<?php
require 'nav.php';
if(isset($_SESSION['add'])){
    echo $_SESSION['add'];
    unset($_SESSION['add']);
}
if(isset($_SESSION['upload'])){
    echo $_SESSION['upload'];
    unset($_SESSION['upload']);
}
if(isset($_SESSION['remove'])){
    echo $_SESSION['remove'];
    unset($_SESSION['remove']);
}
if(isset($_SESSION['deleted'])){
    echo $_SESSION['deleted'];
    unset($_SESSION['deleted']);
}
if(isset($_SESSION['no-cartegory-found'])){
    echo $_SESSION['no-cartegory-found'];
    unset($_SESSION['no-cartegory-found']);
}
if(isset($_SESSION['failed-remove'])){
    echo $_SESSION['failed-remove'];
    unset($_SESSION['failed-remove']);
}
?>
  
<div class="container">
    <h1 class="py-4">Manage Cartegory</h1>
    <a href="./add_category.php" class="btn btn-secondary my-3">Add Cartegory</a>
    <?php
    // assign serial no
    $sn=1;
    $sql="Select * from tbl_cartegory";
      $result = mysqli_query($conn,$sql);
      $datas = array();
      if(mysqli_num_rows($result)>0){
          while($row=mysqli_fetch_assoc($result)){
              $datas[]=$row;
             
          }
      }
      echo "<table class='table table-hover py-5'>";
      echo "<thread>";
      
      echo "<tr class='pt-5'>";
      echo "<th scope='col'> Sn</th>";
      echo "<th scope='col'> Title</th>";
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
          echo "<td>";
            $image_name=$data["image_name"];
            
            if( $image_name != ""){
               
            ?>
            <img src="../images/cartegory/<?php echo $image_name?>" alt="cartegory image" srcset="" width="100px">
            <?php
           }
           else echo "Image Not found";
            echo "</td>";
          echo "<td>"; echo $data["active"]; echo "</td>";
          echo "<td>"; echo $data["featured"]; echo "</td>";
          
          echo "<td> <a class='btn btn-info' href='cartegory_update_admin.php?update=".$data['id']."'> Update</a> </td>";
      echo "<td> <a class='btn btn-danger' href='cartegory_delete_admin.php?delete=".$data['id']."&image_name=".$image_name." '>Delete</a>  </td>";
          echo "</tr>"; 
          echo "</tbody>";
      }
      echo "</thread>";

    
      ?>
</div>


    
</div>




<?php
require 'foot.php'
?>