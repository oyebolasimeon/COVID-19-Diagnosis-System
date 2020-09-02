<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
      
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="all,follow">
    <title>COVID 19- Admin Page</title>
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/fontastic.css">
    <script src="findme.js"></script>
    <script src="https://maps.google.com/maps/api/js?sensor=true"></script>
	<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous">
  	
  </script>
  </head>
  <body>
    <div class="page">
      <!-- Main Navbar-->
      <header class="header">
        <nav class="navbar">
          <!-- Search Box-->
          <div class="search-box">
            <button class="dismiss"><i class="icon-close"></i></button>
            <form id="searchForm" action="#" role="search">
              <input type="search" placeholder="What are you looking for..." class="form-control">
            </form>
          </div>
          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              <!-- Navbar Header-->
              <div class="navbar-header">
                <!-- Navbar Brand --><a href="index.html" class="navbar-brand d-none d-sm-inline-block">
                  <div class="brand-text d-none d-lg-inline-block"><span>ADMIN Dashboard</span></div></a>
                <!-- Toggle Button--><a id="toggle-btn" href="#" class="menu-btn active"><span></span><span></span><span></span></a>
              </div>
              <!-- Navbar Menu -->
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
              
               
                <!-- Logout    -->
                <li class="nav-item"><a href="login.php" class="nav-link logout"> <span class="d-none d-sm-inline">Logout</span><i class="fa fa-sign-out"></i></a></li>
              </ul>
            </div>
          </div>
        </nav>
      </header>
      <div class="page-content d-flex align-items-stretch"> 
        <!-- Side Navbar -->
        <nav class="side-navbar">
          <!-- Sidebar Header-->
          <div class="sidebar-header d-flex align-items-center">
            <div class="avatar"><img src="img/avatar-1.jpg" alt="..." class="img-fluid rounded-circle"></div>
            <div class="title">
              <h1 class="h4">Admin</h1>
              <p>Oyebola Simeon</p>
            </div>
          </div>
          <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
          <ul class="list-unstyled">
            <li class="active"><a href="admin.html"> <i class="fa fa-bar-chart"></i>User Data</a></li>
            <li><a href="findme.php"> <i class="icon-grid"></i>Maps and Location</a></li>
              <!--You can put Your Pages you want to access here-->
           <li><a href=""> <i class="icon-interface-windows"></i>Others</a></li>
              <li><a href=""> <i class="icon-interface-windows"></i>Others</a></li>
          </ul>
        </nav>
        <div class="content-inner">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">ADMIN DATA ACCESS PAGE</h2>
            </div>
          </header>
          <!-- Breadcrumb-->
          <div class="breadcrumb-holder container-fluid">
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="admin.html">Home</a></li>
              <li class="breadcrumb-item active">User data</li>
            </ul>
          </div>
          <section class="tables">   
            <div class="container-fluid">
              <div class="row">
                  
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-header d-flex align-items-center">
                      <h3 class="h4">user data from covid-19 form</h3>
                    </div>
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <?php

include("connection.php");
{
$sql=mysqli_query($db_connect,"select * from gpsreport");
                                    echo "<table class='table table-striped table-hover'>";
                                        	

                                        echo "<thead class='bg-primary'>
                                          <tr class='text-white'>
                                                    <th scope='col'>S/N</th>
                                                    <th scope='col'>SURNAME</th>
                                                    <th scope='col'>OTHERNAME</th>
                                                    <th scope='col'>GENDER</th>
                                                    <th scope='col'>PHONE NUMBER</th>
                                                    <th scope='col'>DATE OF BIRTH</th>
                                                    <th scope='col'>ACTION</th>
                                                </tr>
                                        </thead>";
    while($result=mysqli_fetch_assoc($sql))
	{
$id=$result['id'];
                                        echo "<tbody>";
                                        echo "<tr>";
                                        echo "<td>".$result['id']. "</td>";
                                        echo "<td>".$result['surname']."</td>";
                                        echo "<td>".$result['othername']."</td>";
                                        echo "<td>".$result['gender']."</td>";
                                        echo "<td>".$result['phone_number']."</td>";
                                        echo "<td>".$result['dob']."</td>";
                                        echo "<td><a href='deleteuser.php?id=$id'><i class='fa fa-trash'> Delete</i></a> &nbsp; &nbsp;<a href='viewmore.php?id=$id'><i class='fa fa-gear'> View More</i></a></td>";
                                                
                                        echo "</tr>";
    }
                                        echo "</tbody>";
                                    echo "</table>";
}
                                    ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
              </div>
            </div>
          </section>
          <!-- Page Footer-->
          <footer class="main-footer">
            <div class="container-fluid">
              <div class="row">
                <div class="col-sm-6">
                  <p>SIWES &copy; 2019-2020</p>
                </div>
                
              </div>
            </div>
          </footer>
        </div>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
    <!-- Main File-->
    <script src="js/front.js"></script>
    </body>
</html>