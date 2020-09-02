
<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>COVID-19 contact tracing</title>
	<script src="findme.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC4uNHxopo2PNYQpW6XHkRrldBVadbfLOc&callback=loadMap"
    async defer ></script>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous">
  	
  </script>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<style>
		#map, #alldata {
			width: 1500px;
			height: 1500px;
		}
		#aldata {
      display: none;
    }
		table {
  border-collapse: separate;
  border-spacing: 0;
}
th,
td {
  padding: 10px 15px;
}
thead {
  background: #395870;
  color: #fff;
}
tbody tr:nth-child(even) {
  background: #f0f0f2;
}
td {
  border-bottom: 1px solid #cecfd5;
  border-right: 1px solid #cecfd5;
}
td:first-child {
  border-left: 1px solid #cecfd5;
}

	</style>
</head>
<body>
	
      


<div id="lat"></div>
    <!--ajax query script not in use-->
   <!-- <script>
    var ajax = new XMLHttpRequest();
    ajax.open("GET", "data.php", true);
    ajax.send();

    ajax.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var data = JSON.parse(this.responseText);
            console.log(data);

            var html = "";
            for(var a = 0; a < data.length; a++) {
                var id = data[a].id;
                var longitude = data[a].longitude;
                var latitude = data[a].latitude;

                html += "<tr>";
                    html += "<td>" + id + "</td>";
                    html += "<td>" + longitude + "</td>";
                    html += "<td>" + latitude + "</td>";
                html += "</tr>";
            }
            document.getElementById("data").innerHTML += html;
        }
    };
</script>-->
    
    <!--php code to display long and lat table-->
    
    <?php 
$mysqli = new mysqli("localhost", "root", "", "dcigcomn_covid"); 
$query = "SELECT * FROM location";
 
 
echo '<table border="0" cellspacing="2" cellpadding="2"> 
      <tr> 
          <td> <font face="Arial">id</font> </td> 
          <td> <font face="Arial">Latitude</font> </td> 
          <td> <font face="Arial">Longitude</font> </td> 
           
      </tr>';
 
if ($result = $mysqli->query($query)) {
  
  class App{

  }
  $app = new App;
    while ($row = $result->fetch_assoc()) {
        $field1name = $row["id"];
        $field2name = $row["personlat"];
        $field3name = $row["person_long"];
         
         $app->lat = $field2name;
          $app->long = $field3name;

          $data = json_encode($app, true);//json file
         echo '<div style="display: none;" >' . $data ."</div>";//you can't view the output on the page because i've hidden it from the css code sir. 
         //to view the json output use this
         //echo $data; and comment out this ==> in line 123 sir echo '<div style="display: none;" >' . $data ."</div>";
 
        echo '<tr> 
                  <td>    '.$field1name.'    </td> 
                  <td id="lat">    '.$field2name.'    </td> 
                  <td id="long">    '.$field3name.'    </td> 
                  
              </tr>';
    }
    $result->free();
} 
?>
<div id="map"></div>


	


<div id="alldata"></div>
</body>

</html>