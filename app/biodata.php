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

    $surname = $_POST['surname'];
    $othername = $_POST['othername'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $nin = $_POST['nin'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $foption = $_POST['foption'];
    $coption = $_POST['coption'];
    $ncoption = $_POST['ncoption'];
    $sbreath = $_POST['sbreath'];
    $dbreath = $_POST['dbreath'];
    $frest = $_POST['frest'];
    $doption = $_POST['doption'];
    $voption = $_POST['voption'];
    $pvisit = $_POST['pvisit'];
    $sduration = $_POST['sduration'];
   
 
   

   

     

     $result = "INSERT INTO gpsreport(surname, othername, state, city, home_address, phone_number, nin, email_address, dob, gender, fever_option, cough_option, nasal_option, short_breath, difficult_breath, full_resttiredness, drug_option, visit_option, places_visited, sick_duration) VALUES ('$surname','$othername','$state','$city','$address','$phone','$nin','$email','$dob','$gender','$foption','$coption','$ncoption','$sbreath','$dbreath','$frest','$doption','$voption','$pvisit','$sduration')";

        if (mysqli_query($conn,$result)) {
       echo "<p>few moments</p> ";
       echo "<script> location.href='https://teamcovid.dcig.com.ng'; </script>";
        exit;
    }
    else{
        echo "It doesnt work";
    }
    
  }
  
    

     



   


    ?>