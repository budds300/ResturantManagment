<?php
require 'head.php';
include '../database/db.php';

?>

<!-- <section id="sidebar"> 
  <div class="white-label">
  </div> 
  <div id="sidebar-nav">   
    <ul>
      <li class=""><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="manage_cartegory.php"><i class="fa fa-desktop"></i> Cartegory</a></li>
      <li><a href="manage_food.php"><i class="fa fa-usd"></i> Food</a></li>
      <li><a href="manage_order.php"><i class="fa fa-pencil-square-o"></i>Order</a></li>
      <li><a href="logout_admin.php"><i class="fa fa-sitemap"></i>Logout</a></li>

    </ul>
  </div>
</section> -->
<section class="navbar">
        <div class="container">
            <div class="logo">
                <a href="admin.php" title="">
                    <strong>
                      <p>Drive By Resturant</p>
                    </strong>
                </a>
            </div>

            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="manage_cartegory.php">Category</a>
                    </li>
                    <li>
                        <a href="manage_food.php">Food</a>
                    </li>
                    <li>
                        <a href="manage_order.php">Order</a>
                    </li>
                    <li>
                        <a href="manage_admin.php">Manage Admin</a>
                    </li>
                    <li>
                      <a href="reserveation.php">Reservations</a>
                    </li>
                    <li>
                        <a href="logout_admin.php">Logout</a>
                    </li>
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>
