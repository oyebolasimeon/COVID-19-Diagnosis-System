 <?php
     $db_connect = new mysqli("localhost", "root", "", "dcigcomn_covid");
      if ($db_connect->connect_error) {
        die("Could not connect to the databse: ". $conn->connect_error);
        }


         $user = $_POST['loginUsername'];
   		$pass = $_POST['loginPassword'];

   		

   		
   			if ($user == "techSmartans'2020" && $pass == "adminaccess2020") {
   			 echo "<script> location.href='admin.php'; </script>";
        exit;
           
   		}
   		else{
   		   
   			 echo "<script> location.href='login.php'; </script>";
        exit;
   		}
   		
// $row['username']
// $row['password']
   		
?>


