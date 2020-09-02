<?php
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>COVID 19- Admin Page</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/fontastic.css">
    <style>
		#map {
			width: 400px;
			height: 400px;
		}
	</style>
    <script src="https://maps.google.com/maps/api/js?sensor=true"></script>
	<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous">
  	
  </script>
    <script>
       
         //$(document).ready(function() {
       // $('#find').click(function (){
        if (navigator.geolocation) {
    // supported
}



function successCallback (position) {
    
    var userlati = position.coords.latitude;
	var userlongi = position.coords.longitude;
	
	var userlat = $('input[name = "lat"]').val();
	var userlong = $('input[name = "long"]').val();

    console.log("current latitude ", userlati); 
    console.log("current longitude", userlongi);

    //ajax code to parse to php
    
    

    //google api
    var coords = new google.maps.LatLng(userlati,
userlongi); 

    var mapoptions = {
    	zoom: 16,
    	center: coords,
    	mapTypeId: google.maps.MapTypeId.HYBRID
    }

    var map = new google.maps.Map(document.getElementById("map"), mapoptions);

    var marker = new google.maps.Marker({map: map, position: coords});

}

navigator.geolocation.getCurrentPosition(successCallback);

function errorCallback (error) {
    console.log(error.message);
}

navigator.geolocation.getCurrentPosition(successCallback, errorCallback);
var watchId = navigator.geolocation.watchPosition(successCallback);
navigator.geolocation.clearWatch(watchId);
        //});
    //}); 
        
    </script>
    
  </head>
  <body>
      <?php
include("connection.php");
extract($_REQUEST);
$id=$_GET['id'];
$q=mysqli_query($db_connect,"select * from gpsreport where id='$id'");
$m=mysqli_query($db_connect,"select * from location where id='$id'");
$c=mysqli_query($db_connect,"select * from symptoms where id='$id'");
$res=mysqli_fetch_assoc($q);
$mes=mysqli_fetch_assoc($m);
$ces=mysqli_fetch_assoc($c);
      ?>

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
              <p>Team Covid</p>
            </div>
          </div>
          <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
          <ul class="list-unstyled">
            <li class="active"><a href="admin.html"> <i class="fa fa-bar-chart"></i>User Data</a></li>
            <li><a href=""> <i class="icon-grid"></i>Maps and Location</a></li>
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
          <section class="forms">   
            <div class="container-fluid">
              <div class="row">
                  
                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-close">
                      <div class="dropdown">
                        <button type="button" id="closeCard2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                        <div class="dropdown-menu dropdown-menu-right has-shadow"><a href="admin.php" class="dropdown-item"> <i class="fa fa-times"></i>Close</a></div>
                      </div>
                    </div>
                    <div class="card-header d-flex align-items-center">
                      <h3 class="h4"><?php echo $res['surname']; ?></h3>&nbsp;&nbsp;<h3 class="h4"><?php echo $res['othername']; ?></h3>
                    </div>
                    <div class="card-body">
                      <p><b>PERSONAL INFORMATION</b></p>
                        <div class="form-group row">
                          <div class="col-sm-3 form-control-label"><b>PHONE NUMBER: </b><p></p></div>
                          <div class="col-sm-3">   
                      <p><?php echo $res['phone_number']; ?></p>
                          </div>
                          <div class="col-sm-3 form-control-label"><b>NIN NUMBER: </b><p></p></div>
                          <div class="col-sm-3">   
                      <p><?php echo $res['nin']; ?></p>
                          </div>
                            <div class="col-sm-2 form-control-label"><b>Email: </b></div>
                          <div class="col-sm-4">   
                      <p><?php echo $res['email_address']; ?></p>
                          </div>
                        </div>
                     <div class="form-group row">
                          <div class="col-sm-3 form-control-label"><b>gender: </b><p></p></div>
                          <div class="col-sm-3">   
                      <p><?php echo $res['gender']; ?></p>
                          </div>
                            <div class="col-sm-2 form-control-label"><b>Address: </b></div>
                          <div class="col-sm-4">   
                      <p><?php echo $res['home_address']; ?></p>
                          </div>
                        </div>
                         <div class="form-group row">
                          <div class="col-sm-2 form-control-label"><b>state: </b><p></p></div>
                          <div class="col-sm-2">   
                      <p><?php echo $res['state']; ?></p>
                          </div>
                            <div class="col-sm-2 form-control-label"><b>city: </b></div>
                          <div class="col-sm-2">   
                      <p><?php echo $res['city']; ?></p>
                          </div>
                             <div class="col-sm-2 form-control-label"><b>age: </b></div>
                          <div class="col-sm-2">   
                      <p><?php echo $res['dob']; ?></p>
                          </div>
                        </div>
                    </div>
                      
                    <div class="card-body">
                      <p><b>DISEASE OR INFECTION INFORMATION</b></p>
                        <div class="form-group row">
                          <div class="col-sm-3 form-control-label"><b>Having Fever: </b><p></p></div>
                          <div class="col-sm-1">   
                      <p><?php echo $res['fever_option']; ?></p>
                          </div>
                            <div class="col-sm-3 form-control-label"><b>having cough: </b></div>
                          <div class="col-sm-">   
                      <p><?php echo $res['cough_option']; ?></p>
                          </div>
                             <div class="col-sm-3 form-control-label"><b>having nasal: </b></div>
                          <div class="col-sm-">   
                      <p><?php echo $res['nasal_option']; ?></p>
                          </div>
                        </div>
                        
                         
                     <div class="form-group row">
                          <div class="col-sm-3 form-control-label"><b>Having short breath: </b><p></p></div>
                          <div class="col-sm-1">   
                      <p><?php echo $res['short_breath']; ?></p>
                          </div>
                            <div class="col-sm-3 form-control-label"><b>difficult breath: </b></div>
                          <div class="col-sm-">   
                      <p><?php echo $res['difficult_breath']; ?></p>
                          </div>
                             <div class="col-sm-3 form-control-label"><b>full ritteredness: </b></div>
                          <div class="col-sm-">   
                      <p><?php echo $res['full_resttiredness']; ?></p>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-3 form-control-label"><b>Taken Any drugs: </b><p></p></div>
                          <div class="col-sm-1">   
                      <p><?php echo $res['drug_option']; ?></p>
                          </div>
                            <div class="col-sm-3 form-control-label"><b>Sick Duration: </b></div>
                          <div class="col-sm-">   
                      <p><?php echo $res['sick_duration']; ?></p>
                          </div>
                             <div class="col-sm-2 form-control-label"><b>Visited Places: </b></div>
                          <div class="col-sm-2">   
                      <p><?php echo $res['places_visited']; ?></p>
                          </div>
                        </div>
                        
                    </div>
                    <div class="card-body">
                      <p><b>HEALTH STATUS</b></p>
                       <div class="form-group row">
                           <div class="col-sm-3 form-control-label"><b>Current Status: </b><p></p></div>
                           <div class="col-sm-1">   
                      <p><?php echo $ces['status']; ?></p>
                          </div>
                           </div>
                        </div>
                    
                    <!--map script-->
                    <script></script>
                    
                    
                    
                    <!--map modal
                    <div class="modal fade" id="view"> 
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <img src="img/logo.png">
                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                </div>
                                <div class="modal-body">
                                    <div id="map">
                                        
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="genric-btn primary-border small" data-dismiss="modal">verify me <img src="img/icon/left_1.svg" alt=""></button>
                                </div>
                            </div>
                        </div>
                    </div>-->
                    
                    <div class="card-body">
                        <p><b>USER CURRENT LOCATION</b></p>
                        <div class="form-group row">
                            <div class="col-sm-3 form-control-label"><b>LATITUDE: </b><p></p></div>
                          <div class="col-sm-1">   
                      <p><?php echo $mes['personlat']; ?></p>
                          </div>
                          <div class="col-sm-3 form-control-label"><b>LONGITUDE: </b></div>
                          <div class="col-sm-">   
                      <p><?php echo $mes['person_long']; ?></p>
                          </div>
                          <div class="col-sm-3 form-control-label">
                          <form  method="post">
                              
                              <input type="text" class="form-control" id="lat" name="lat" placeholder="paste longitude">
                              <input type="text" class="form-control" id="long" name="long" placeholder="paste longitude">
                              <button id="find" >check map</button>
                          </form>
                         <!-- <div>
                          data-toggle="modal" data-target="#view"
                              <iframe src="https://teamcovid.dcig.com.ng/admin/findme.html" style="height:200px;width:300px;" style="border:none;"></iframe>
		                   </div> -->
                          </div>
                          <div class="col-sm-3 form-control-label"><b>Map view:
                          <div id="map">
                              
                          </div></b><p></p></div>
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
                  <p>teamcovid &copy; 2020</p>
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