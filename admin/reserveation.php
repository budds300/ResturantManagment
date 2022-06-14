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

    <h1 class="py-4" style="padding: 0 0 40px 0;">Manage Reservations</h1>
    
    <?php
    $sql="Select * from tbl_reservation";
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
      echo "<th scope='col'> Order date</th>";
      echo "<th scope='col'> Status</th>";
      echo "<th scope='col'>Customer </th>";
      echo "<th scope='col'>Contact </th>";
      echo "<th scope='col'>Email</th>";
      echo "<th scope='col'>Reservation Date</th>";
      echo "<th scope='col'>Number of Guests </th>";
      echo "</tr>";
      echo "</thread>";

      foreach($datas as $data){

        echo "<tbody>";
        echo "<tr>";
        echo "<td class='space'>"; echo $sn++; echo "</td>";
        echo "<td class='space'>"; echo $data["order_date"]; echo "</td>";
        echo '<td>';
        
        if($data["status"] == "Reserved"){
            echo '<strong><p style="color:orange">'.$data["status"].'</p></strong>';
        }
       else if($data["status"] == "Vacant"){
            echo '<strong><p style="color:green">'.$data["status"].'</p></strong>';
        }
       else if($data["status"] == "Canceled"){
            echo '<strong><p style="color:red">'.$data["status"].'</p></strong>';
        }
        echo '</td>';
        
        echo "<td class='space'>"; echo $data["customer_name"]; echo "</td>";
        echo "<td class='space'>"; echo $data["customer_contact"]; echo "</td>";
        echo "<td class='space'>"; echo $data["customer_email"]; echo "</td>";
        echo "<td class='space'>"; echo $data["reservation_date"]; echo "</td>";
        echo "<td class='space'>"; echo $data["number_of_guests"]; echo "</td>";
        
        
          
          echo "<td> <a class='btn btn-info' href='./update_table.php?update=".$data['id']."'> Update</a> </td>";

          echo "</tr>"; 
          echo "</tbody>";
      }
      echo "</thread>";

    
      ?>
</div>



<?php
require 'foot.php'
?>

</div>



