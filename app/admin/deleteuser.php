<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	
</head>
<body>
    <?php
include ("connection.php");
$id=$_GET['id'];
$sql=mysqli_query($db_connect, "delete from gpsreport where id='$id'");
 echo "<script> location.href='admin.php'; </script>";
        exit;

?>
</body>
</html>