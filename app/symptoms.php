<?php
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "dcigcomn_covid";

    $conn = mysqli_connect($servername,$username,$password,$dbname);

    
    if(!$conn){
        die("Sorry i cannot access database currently".mysqli_connect_error());
    }

    if (!mysqli_select_db($conn,'dcigcomn_covid')) {
        echo "database not selected";
    }

    $val = 1;

     if(isset($val)){
    $cough = $_POST['phpcoughval'];
    $nasal = $_POST['phpnasalval'];
    $fever = $_POST['phpfeverval'];
    $shortbreath = $_POST['phpshortbreathval'];
    $difficultbreath = $_POST['phpdifficultbreathval'];
    $total = $cough + $nasal + $fever + $shortbreath + $difficultbreath;
    
    if ($total == 5) {
        $status = "COVID-19 (+)";
    } elseif ($total == 0) {
        $status = "No Traces of COVID-19";
    
    }
    else{
        $status = "Little Traces of COVID-19";
    }
    
   

     $result = "INSERT INTO symptoms(cough, nasal_congestion, fever, short_breath, difficult_breath, total_chances, status) VALUES ('$cough','$nasal','$fever','$shortbreath','$difficultbreath','$total','$status')";
    

     if (mysqli_query($conn,$result)) {

        header("refresh:1; url = https://ncdc.gov.ng");
    }
}

    

    

    

    

    // Do whatever you want with the $uid


?>