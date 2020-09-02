<?php
	
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "dcigcomn_covid";

	$conn = mysqli_connect($servername,$username,$password,$dbname);

	
    if(!$conn){
		die("Sorry i cannot access database currently".mysqli_connect_error());
	}

	if (!mysqli_select_db($conn, 'dcigcomn_covid')) {
		echo "database not selected";
	}
          $val = 0;
	 if(isset($val)){
	$userlatitude = $_POST['phpuserlat'];
	$userlongitude = $_POST['phpuserlng'];
	

	 $result = "INSERT INTO location(personlat, person_long) VALUES ('$userlatitude','$userlongitude')"; 
	 if (mysqli_query($conn,$result)) {
        echo "<b> Stay Safe</b><br><br>just a moment";
    }
    else{
    
        echo "It doesnt work";
    }
    
}

	header("refresh:2; url = https://siwescovid19.dcig.com.ng");

	

	

	

    // Do whatever you want with the $uid


?>