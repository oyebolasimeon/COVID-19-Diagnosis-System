<?php
include ("connection.php");
$id=$_GET['id'];
$m=mysqli_query($db_connect,"select * from location where id='$id'");


//$data = array();
while ($mes=mysqli_fetch_assoc($m))
{
    array_push($m, $mes);
}

echo json_encode($m);
exit();
?>